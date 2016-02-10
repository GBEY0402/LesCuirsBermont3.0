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
	Route::resource('production.produit','ProduitsFinisController');
	Route::resource('client', 'ClientsController');
	Route::resource('usager', 'UserController');
	Route::resource('materiaux', 'MatieresPremieresController');
	Route::resource('type', 'TypesController');
	Route::resource('production', 'CommandesController');
	Route::resource('entrepot', 'entrepotController');

	Route::resource('production.commande', 'CommandesController');
	Route::resource('production.recette', 'RecettesController');
	Route::resource('production.code', 'CodesProduitsController');

	Route::resource('entrepot.ProduitFini', 'entrepotController');

});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/404', function()
    {
        return View::make('404');
    });




