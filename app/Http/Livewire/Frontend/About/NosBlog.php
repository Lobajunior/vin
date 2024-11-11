<?php

namespace App\Http\Livewire\Frontend\About;

use App\Models\Blog;
use Livewire\Component;

class NosBlog extends Component
{
    public function render()
    {
        return view('livewire.frontend.about.nos-blog',[
            'listBlog' => Blog::OrderBy('created_at','desc')->get()
        ]);
    }
}
