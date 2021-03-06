<?php
use App\Http\Controllers\Auth\AuthController;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Route::group(['middleware'=>'auth'], function() {
	
	Route::resource('/home','HomeController');
	Route::resource('produit','ProduitsFinisController');
	Route::resource('client', 'ClientsController');
	Route::resource('usager', 'UserController');
	Route::resource('materiaux', 'MatieresPremieresController');
	Route::resource('type', 'TypesController');
	Route::resource('production', 'CommandesController');
	Route::resource('entrepot', 'entrepotController');
	Route::resource('grille', 'GrilleController');
	Route::resource('commande', 'CommandesController');
	Route::resource('code', 'CodesProduitsController');

	Route::resource('entrepot.ProduitFini', 'entrepotProduitFiniController');

	Route::get('entrepot/{id}/ProduitFiniMultiEdit', 'entrepotProduitFiniController@MultiEdit');
	Route::put('entrepot/{id}/ProduitFiniMultiUpdate', 'entrepotProduitFiniController@MultiUpdate');
	Route::put('entrepot/{entrepotId}/ProduitFini/{ProduitFiniId}/pointure/{pointure}', 'entrepotProduitFiniController@transfert_entrepot');


});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/404', function()
    {
        return View::make('404');
    });




