<?php

namespace App\Http\Livewire\Frontend\Blog;

use App\Models\Blog;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class LiveBlog extends Component
{
    use WithPagination;

    public $search ;

    protected $queryString =[
        'search' => ['except'=> '']
    ];

    public function render()
    {
        return view('livewire.frontend.blog.live-blog',[
            'blogList' => Blog::Where('titre','LIKE','%'.$this->search.'%')->OrderBy('created_at','DESC')->get(),
            'compte_entreprise' => User::where('role','Entreprise')->first()
        ]);
    }
}
