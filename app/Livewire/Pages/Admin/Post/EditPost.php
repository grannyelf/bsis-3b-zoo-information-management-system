<?php

namespace App\Livewire\Pages\Admin\Post;

use App\Models\Category;
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
    public $slug;
    public $content;
    public $image;
    public $is_published;
    public $category_id;
    public $postId;

    #[Computed()]
    public function categories()
    {
        return Category::query()->select('id', 'cat_name')
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
        $this->slug = $post->slug;
        $this->image = $post->image_path;
        $this->is_published = (bool) $post->is_published;
        $this->category_id = $post->category_id;
    }
    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:50',
            'content' => 'required|string|min:3|max:5000',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'boolean',
            'category_id' => 'required|exists:categories,id',
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
            'category_id.required' => 'SELECT A CATEGORY',
            'category_id.exists' => 'SELECT A VALID CATEGORY',
            // custom validation messages
        ];
    }

    public function save()
    {
        $this->validate(); // this will validate the data

        $title = Str::of($this->title)->trim()->title();
        $content = Str::of($this->content)->trim();
        $slug = Str::slug($title) . '-' . uniqid();

        $category_id = $this->category_id;
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
            'slug' => $slug,
            'image' => $imagePath,
            'is_published' => $is_published,
            'category_id' => $category_id
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
