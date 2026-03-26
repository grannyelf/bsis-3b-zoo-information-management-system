<?php

namespace App\Livewire\Pages\Zookeeper\Post;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ZookeeperIndexPost extends Component
{
     public $post;
    public $animal;
    public $species;
    public $post_id;

    #[Computed()]
    public function posts()
    {
        return Post::query()
            ->select('id', 'title', 'content', 'animal_id', 'image')
            ->with('animal:id,name,species_id', 'animal.species:id,species_name') // eager load the animal relationship to get the animal name and species name
            ->orderBy('created_at', 'desc')
            ->get();
        // this should show all the post with the help of eloquent query builder, 
        // we are selecting the title, slg and content fields from the posts table, 
        // and we are returning all the posts in the database, so we can display them in the view.
    }
    
    #[Layout('components.layouts.zookeeper')]
    public function render()
    {
        return view('livewire.pages.zookeeper.post.zookeeper-index-post');
    }
}
