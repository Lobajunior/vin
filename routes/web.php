<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\GetDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/ind', function () {
    return view('/Frontend/pages/index');
});

Route::view('/', 'welcome');
Route::view('/achetez', '/Frontend/pages/achat')->name('achetez_index');
Route::view('/produits', '/Frontend/pages/produit')->name('produits_index');
Route::get('/produit_details/{slug}', [GetDataController::class,'detailsProduits'])->name('produit_details_index');
Route::view('/blogs', '/Frontend/pages/blog')->name('blog_index');
Route::view('/blog_details/nomblog', '/Frontend/pages/details_blog')->name('blog_details_index');
Route::view('/a_propos', '/Frontend/pages/about')->name('a_propos_index');
Route::view('/panier', '/Frontend/pages/panier')->name('panier_index');
Route::view('/mes_favoris', '/Frontend/pages/favoris')->name('favoris_index')->middleware(['auth']);
Route::view('/comparer', '/Frontend/pages/comparer')->name('comparer_index');
Route::get('/category_details/{slug}', [GetDataController::class,'detailsCategorie'])->name('category_details_index');
Route::get('/filtre_details/{slug}', [GetDataController::class,'filtreDetails'])->name('filtre_details_index');
Route::get('/details_produit_promotion_or_djassa/{slug}', [GetDataController::class,'detailsProdPromoOrIsdjassa'])->name('produitPromo_details_index');
Route::view('/finalisez/checkout', '/Frontend/pages/checkout')->name('checkout')->middleware(['auth']);


//Supprimer un produit du  Panier
Route::get('/DeleteProd/{rowId}', [GetDataController::class, 'DeleteProd'])->name('DeleteProd'); 




Route::group(['prefix' => '/dashboard' , 'middleware' => 'auth'], function(){

    Route::group(['middleware' => 'livreurs'], function () {
        Route::get('/home',[GetDataController::class,'index_home'])->name('home');
        Route::view('/Profile_Utilisateur', 'Backend/pages/ProfileUser');
        Route::view('/commandes_livreurs', 'Backend/pages/CommandeLivreur');
    });


    Route::group(['middleware' => 'superAdmin'], function () {

        Route::view('/categorie', 'Backend/pages/IndexCategorie');
        Route::view('/sous_categorie', 'Backend/pages/IndexSousCategorie');
        Route::view('/Utilisateurs', 'Backend/pages/IndexUser');
        Route::view('/Profile_Entreprise', 'Backend/pages/ProfileEntreprise');
        Route::get('/produits', [GetDataController::class, 'index_produits']);
        Route::view('/partenaire', 'Backend/pages/Partenaire');
        Route::view('/notre_equipe', 'Backend/pages/Team');
        Route::view('/a_propos', 'Backend/pages/About');
        Route::view('/commandes', 'Backend/pages/Commande');
        Route::view('/livreurs', 'Backend/pages/Mes_livreurs');
        Route::view('/slide', 'Backend/pages/Slider');
        Route::view('/edit_about', 'Backend/pages/About/Edit_description');
        Route::view('/blog', 'Backend/pages/Blog/index');
        Route::view('/charts_produits', 'Backend/pages/Charts/index_produit');


        Route::get('/ajout_produit',[GetDataController::class,'ajout_produit_modal'])->name('ajout_produits');
        Route::get('/ajout_blog',[GetDataController::class,'ajout_blog_page'])->name('ajout_blogs');
        Route::get('/edit_blog/{id}',[GetDataController::class,'edit_blog_page'])->name('edit_blogs');
        Route::get('/get_modal_modify_description/{id}',[GetDataController::class,'GetModalDescription'])->name('get_modal_modify_descriptions');
        Route::post('/ajoutProduit',[CreateController::class,'submit_produit'])->name('ajoutProduits');
        Route::post('/ajoutBlog',[CreateController::class,'submit_Blog'])->name('ajoutBlog');
        Route::put('/modifyBlog/{id}',[CreateController::class,'change_Blog'])->name('modifyBlog');
        Route::post('/change_description_atproduct/{slug}',[CreateController::class,'changeDescription'])->name('change_description_at_product');


        Route::post('/modif_descriptionAbout',[CreateController::class,'modif_descriptionAbout'])->name('modif_descriptionAbouts');
        Route::get('/details_commande/{slug}',[GetDataController::class,'details_commande'])->name('details_commandes');
        Route::get('/checked_order/{slug}',[GetDataController::class,'checked_order'])->name('checked_orders');
    });


    //Tableau de bord utilisateur
    Route::view('/user_dashboard', '/Frontend/pages/Dashboard/index')->name('user_dashboard_index');

});


Route::get('/logout', function () {
    auth()->logout();

    return redirect('/');
});
