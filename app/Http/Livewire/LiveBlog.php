<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\CategorieBlog;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;

class LiveBlog extends Component
{
    public $List_of_blog ;

    protected $listeners = ['SupprimerBlog'];

    function mount() : void {
        $this->List_of_blog = Blog::OrderBy('created_at','DESC')->get() ;
    }

    function GetBlog_selon_categorie($id_catBlog) : void {

        $categorie_exist = CategorieBlog::find($id_catBlog);
        if($categorie_exist){
            $this->List_of_blog = Blog::where('blog_cat_id',$id_catBlog)->get();
        }
    }

    function resetFilter() : void {
        $this->List_of_blog = Blog::OrderBy('created_at','DESC')->get() ;
    }


    function deleteBlog($blog_id) : void {
        $blog = Blog::find($blog_id);
        if($blog){
            $this->dispatchBrowserEvent('swal:modalDeleteBlog', [
                'type' => 'warning',  
                'text' => "Etes vous sur de vouloir suprimer le Blog ( ". Str::words($blog->titre,2,'...') . " ) ?",
                'title' => "Attention !",
                'id' => $blog->id
            ]);
        }
    }

    function SupprimerBlog($blog_id) : void {
        $blog = Blog::find($blog_id);
        if($blog){

            $doc_path = "Backend/images/Blog/$blog->photo";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $doc_path2 = $blog->image_secondaire;
            if(is_array($doc_path2) || is_object($doc_path2)){
                foreach ($doc_path2 as $photo) {
                    $doc_path2 = "Backend/images/Blog/$photo";
                        if (File::exists($doc_path2)) {
                            File::delete($doc_path2);
                        }
                }
            }

            $blog->delete();
            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',  
                'text' => "Blog Supprimer avec Succes",
                'title' => "Success",
            ]);

            $this->reset();
        }
    }

    public function render()
    {
        return view('livewire.live-blog',[
            'categorie_of_blog' => CategorieBlog::all()
        ]);
    }
}
