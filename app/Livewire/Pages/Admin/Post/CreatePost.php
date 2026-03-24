<?php

namespace App\Livewire\Pages\Admin\Post;

use App\Models\Animal;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public $post;
    public $title;
    public $content;
    public $image;
    public $animal_id;
    public $postId;

    #[Computed()]
    public function animals()
    {
        return Animal::query()
            ->select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:50',
            'content' => 'required|string|min:3|max:5000',
            'image' => 'required|image|max:2048',
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
            'image.required' => 'YOU NEED TO UPLOAD AN IMAGE',
            'image.max' => 'IMAGE SIZE MUST BE LESS THAN 2MB',
            'animal_id.required' => 'SELECT A ANIMAL',
            'animal_id.exists' => 'SELECT A VALID ANIMAL',
            // custom validation messages
        ];
    }

    public function save()
    {
        $this->validate();

        $title = Str::of($this->title)->trim()->title();
        $content = Str::of($this->content)->trim();

        $imagePath = $this->image->store('posts', 'public');

        $animal_id = $this->animal_id;


        Post::create([
            'title' => $title,
            'content' => $content,
            'image' => $imagePath,
            'animal_id' => $animal_id
        ]);

        $this->reset('title', 'content', 'image', 'animal_id');
        session()->flash('success', 'Post created successfully!');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.post.create-post');
    }
}
