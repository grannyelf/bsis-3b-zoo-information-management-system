<?php

namespace App\Livewire\Pages\Admin\Post;

use App\Models\Animal;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $content;
    public $image;
    public $is_published;
    public $animal_id;
    public $postId;
    public $animals;

    #[Computed()]
    public function animals()
    {
        return Animal::query()
            ->select('id', 'name', 'species_id', 'age', 'weight', 'height', 'habitat_id', 'category_id', 'description')
            ->with('species:id,species_name,species_desc', 'habitat:id,hab_name,hab_desc,hab_temp', 'category:id,cat_name,cat_desc', 'need:id,food_name,animal_needs')
            ->orderBy('cat_name', 'asc')
            ->get();
    }

    public function mount($id)
    {
        $this->postId = $id;
        $this->loadPostData(); //this method will load user data
    }

    #[Computed()]
    public function loadPostData()
    {
        $post = Post::findOrFail($this->postId);
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->image = $post->image_path;
        $this->is_published = (bool) $post->is_published;
        $this->animal_id = $post->animal_id;
    }
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:50',
            'content' => 'required|string|min:3|max:5000',
            'image' => 'required|image|max:2048',
            'is_published' => 'boolean',
            'animal_id' => 'required|exists:animals,id',
            // validating these fields
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'HEY! YOU NEED TO PUT A TITLE HERE SMH',
            'title.min' => 'TITLE NEEDs TO BE AT LEAST 3 LETTERS',
            'title.max' => 'TITLE NEEDS TO BE AT MOST 50 LETTERS',
            'content.required' => 'NEED TO PUT CONTENT HERE',
            'content.min' => 'CONTENT NEEDS TO BE AT LEAST 3 LETTERS',
            'content.max' => 'CONTENT NEEDS TO BE AT MOST 5000 LETTERS',
            'image.max' => 'IMAGE SIZE MUST BE LESS THAN 2MB',
            'is_published.boolean' => 'PUBLISH STATUS MUST BE TRUE OR FALSE',
            'animal_id.required' => 'SELECT AN ANIMAL',
            'animal_id.exists' => 'SELECT A VALID ANIMAL',
            // custom validation messages
        ];
    }

    public function save()
    {
        $this->validate(); // this will validate the data

        $title = Str::of($this->title)->trim()->title();
        $content = Str::of($this->content)->trim();

        $animal_id = $this->animal_id;
        // sanitization of the data

        $post = Post::findOrFail($this->postId);

        $is_published = $this->is_published ? 1 : 0;

        $imagePath = $post->image;
        if ($this->image instanceof TemporaryUploadedFile) {
            $imagePath = $this->image->store('posts', 'public');
        }

        $post->update([
            'title' => $title,
            'content' => $content,
            'image' => $imagePath,
            'is_published' => $is_published,
            'animal_id' => $animal_id
            // after sanitization, we are creating a new post in the database with the sanitized data
        ]);

        return redirect()->route('admin.post.index');
        // after creating the post, we are redirecting the user to the post index page where they can see all the posts including the newly created one
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.post.edit-post');
    }
}
