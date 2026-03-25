<?php

namespace App\Livewire\Pages\Public;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Blog extends Component
{
    
    
    public $post;

    #[Computed]
    public function Posts()
    {
        return Post::query()
            ->select('id', 'title', 'content', 'animal_id', 'image')
            ->with('animal:id,name,species_id', 'animal.species:id,species_name')
            ->get();
    }


    public function render()
    {
        return view('livewire.pages.public.blog');
    }
}
