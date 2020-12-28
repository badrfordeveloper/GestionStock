<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Acce;


Route::group(
    ['middleware' => ['auth']],
    function () {
        /*Route::get(Config::get('constants.ADMIN_PATH'), 'AdminController@index');*/
        Route::get(Config::get('constants.ADMIN_PATH'), 'Admin\\CommandesController@index');
        Route::get(Config::get('constants.ADMIN_PATH').'projets', 'AdminController@index');
		/*Route::resource(Config::get('constants.ADMIN_PATH').'categories', 'Admin\\CategoriesController');*/
		/*=== Route Employeur ===*/
		/*Route::get(Config::get('constants.ADMIN_PATH').'users/{role}', 'Admin\\UsersController@index');
		Route::get(Config::get('constants.ADMIN_PATH').'users/{role}/create', 'Admin\\UsersController@create');
		Route::post(Config::get('constants.ADMIN_PATH').'users/{role}', 'Admin\\UsersController@store');*/
		//Route::put(Config::get('constants.ADMIN_PATH').'users/{role}', 'Admin\\UsersController@store');
		/*======================*/
     }
);
Auth::routes();

/*Route::get('/', 'HomeController@index')->name('home');
Route::get('/categorie-liste/{id}', 'HomeController@byCategorie');
Route::get('/detail-produit/{id}/{name}', 'HomeController@detailProduct');
Route::get('/panier', 'HomeController@panier');
Route::get('/addtocart/{id}', 'HomeController@addToCart');
Route::get('/getCountCart', 'HomeController@getCountCart');
Route::patch('update-cart', 'HomeController@updateCart');
Route::delete('remove-from-cart', 'HomeController@removeCart');
Route::get('/commander/{id}', 'HomeController@commanderNow');
Route::post('envoyerdemmande', 'HomeController@placeorder');
Route::post('envoyerdemmandenow', 'HomeController@placeorderNow');
Route::get('/merci', 'HomeController@thanks');


Route::get('/landing-page-1', 'HomeController@landingPage1');
Route::get('/landing-page-2', 'HomeController@landingPage2');
Route::get('/landing-page-4', 'HomeController@landingPage4');
Route::get('/landing-page-5', 'HomeController@landingPage5');
Route::get('/landing-page-6', 'HomeController@landingPage6');
Route::get('/landing-page-7', 'HomeController@landingPage7');*/
Route::get('/', 'HomeController@index');


Route::get('TraitementCommande/{idcommande}/{etape}','Admin\\TraitementController@traitement_commande');

Route::get('/parapluie', 'HomeController@landingPage3');
Route::get('/machine-a-laver', 'HomeController@landingPage6');
Route::get('/cutting-board', 'HomeController@landingPage9');
Route::get('/landing-page-10', 'HomeController@landingPage10');
/*Route::get('/landing-page-8', 'HomeController@landingPage8');
Route::get('/thank-you', 'HomeController@thank_you');*/
Route::get('/thank-you/{pr}', 'HomeController@thank_you');
Route::post('/check-out/{id}', 'HomeController@checkout');

Route::resource('admin/users', 'Admin\\UsersController');
Route::resource('admin/categories', 'Admin\\CategoriesController');
Route::resource('admin/achats', 'Admin\\AchatsController');
Route::resource('admin/commandes', 'Admin\\CommandesController');
Route::resource('admin/ligneachats', 'Admin\\LigneachatsController');
Route::resource('admin/lignecommandes', 'Admin\\LignecommandesController');
Route::resource('admin/produits', 'Admin\\ProduitsController');
Route::resource('admin/retours', 'Admin\\RetoursController');
Route::resource('admin/types', 'Admin\\TypesController');
Route::resource('admin/ventes', 'Admin\\VentesController');

Route::resource('admin/users', 'Admin\\UsersController');
Route::resource('admin/produits', 'Admin\\ProduitsController');

Route::get('admin/delete-image/{id}', 'Admin\\ProduitsController@delete_image');
Route::get('admin/delete-main-image/{produitId}', 'Admin\\ProduitsController@delete_main_image');


Route::post('getProducts', 'Admin\\ProduitsController@getProducts');
Route::post('getProductsForAchats', 'Admin\\ProduitsController@getProductsForAchats');

Route::get('admin/toVente/{commande}', 'Admin\\VentesController@addVenteFromCommande');
Route::get('admin/toRetour/{vente}', 'Admin\\RetoursController@addRetourFromVente');


Route::resource('admin/roles', 'Admin\\RolesController');


Route::get('myrole',function(){

    /*  $tables = array("societes","banques","abonnements","agencebancaires","comptesbancaires","conditionfinancieres","credocs","demandereglements","detailslivraisonexports","dossierexports","dossierimports","droitconstates","echances","factorings","fluxexploitations","lignesbancaires","loiabonnements","matricefluxerps","naturedefluxs","transporteurs","users");*/
      $acces = array("validation");
     // $acces = array("liste","ajouter","modifier","supprimer","afficher","files");
  
//$tables =array("demandereglements","detailslivraisonexports","transporteurs","armateurs","incoterms","regimes"," typedemandes","dossierexports","dossierimports");
    /* $tables =array("fluxexploitations","echeances","droitconstates","credocs","factorings","modepaiments","categories");*/
    /* */
    $tables =array("Demandereglements");
  
        foreach ($tables as $table) 
        {
            foreach ($acces as $obj) 
            {
                $acce =Acce::firstOrNew(['table' => $table,"action" =>$obj ]);
                $acce->table = $table;
                $acce->action = $obj;
                $acce->save();
            }
        }
        echo "succes !";
});
