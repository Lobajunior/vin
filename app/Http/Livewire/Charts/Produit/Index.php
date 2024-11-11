<?php

namespace App\Http\Livewire\Charts\Produit;

use App\Models\Produit;
use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\ProduitCommander;

class Index extends Component
{

    public $juin, $juin_precendent,
     $juillet, $juillet_precendent,
     $aout, $aout_precendent,
     $septembre, $septembre_precendent,
     $octobre , $octobre_precendent,
     $novembre , $novembre_precendent,
     $decembre, $decembre_precendent;

    function mount() : void {
        $this->juin = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate(date('Y'),6)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->juillet = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate(date('Y'),7)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->aout = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate(date('Y'),8)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->septembre = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate(date('Y'),9)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->octobre = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate(date('Y'),10)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->novembre = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate(date('Y'),11)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->decembre = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate(date('Y'),12)->format('Y-m'))->distinct('produit_id')->count() ;
        
        $this->juin_precendent = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate( (date('Y')-1) , 6)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->juillet_precendent = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate( (date('Y')-1) , 7)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->aout_precendent = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate( (date('Y')-1) , 8)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->septembre_precendent = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate( (date('Y')-1) , 9)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->octobre_precendent = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate( (date('Y')-1) , 10)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->novembre_precendent = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate( (date('Y')-1) , 11)->format('Y-m'))->distinct('produit_id')->count() ;
        $this->decembre_precendent = ProduitCommander::whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Carbon::createFromDate( (date('Y')-1) , 12)->format('Y-m'))->distinct('produit_id')->count() ;
       
    }
    public function render()
    {
        return view('livewire.charts.produit.index');
    }
}
