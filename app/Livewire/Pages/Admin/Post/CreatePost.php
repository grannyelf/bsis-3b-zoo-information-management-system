<?php

namespace App\Livewire\Pages\Admin\Post;

use App\Models\Category;
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
    public $slug;
    public $content;
    public $image;
    public $is_published = false;
    public $category_id;
    public $postId;

    #[Computed()]
    public function categories()
    {
        return Category::query()
            ->select('id', 'cat_name')
            ->orderBy('cat_name', 'asc')
            ->get();
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:50',
            'content' => 'required|string|min:3|max:5000',
            'image' => 'required|image|max:2048',
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
            'image.required' => 'YOU NEED TO UPLOAD AN IMAGE',
            'image.max' => 'IMAGE SIZE MUST BE LESS THAN 2MB',
            'is_published.boolean' => 'PUBLISH STATUS MUST BE TRUE OR FALSE',
            'category_id.required' => 'SELECT A CATEGORY',
            'category_id.exists' => 'SELECT A VALID CATEGORY',
            // custom validation messages
        ];
    }

    public function save()
    {
        $this->validate();

        $title = Str::of($this->title)->trim()->title();
        $content = Str::of($this->content)->trim();
        $slug = Str::slug($title) . '-' . uniqid();

        $is_published = $this->is_published ? 1 : 0;

        $imagePath = $this->image->store('posts', 'public');

        $category_id = $this->category_id;


        $post = Post::create([
            'title' => $title,
            'content' => $content,
            'slug' => $slug,
            'image' => $imagePath,
            'is_published' => $is_published,
            'category_id' => $category_id
        ]);

        $this->reset('title', 'content', 'image', 'is_published', 'category_id');
        session()->flash('success', 'Post created successfully!');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.post.create-post');
    }
}
