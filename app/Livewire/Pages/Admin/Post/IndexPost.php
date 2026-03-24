<?php

namespace App\Livewire\Pages\Admin\Post;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexPost extends Component
{
    public $post;

    #[Computed()]
    public function posts()
    {
        return Post::query()
            ->select('id', 'title', 'content', 'animal_id', 'user_id', 'image')
            ->with('animal:id,name,species_id,age,weight,height,habitat_id,category_id,need_id,description', 'animal.species:id,species_name,species_desc', 'animal.habitat:id,hab_name,hab_desc,hab_temp', 'animal.category:id,cat_name,cat_desc', 'animal.need:id,food_name,animal_needs', 'user:id,name,email')
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
