<?php

namespace App\Livewire\Pages\Admin\Post;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexPost extends Component
{
    public $post;
    public $animal;
    public $species;

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

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        // this will delete the post from the database
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.pages.admin.post.index-post');
    }
}
