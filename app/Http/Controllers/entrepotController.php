<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\entrepot;

use View;
use Redirect;
use Input;
use Auth;

class entrepotController extends Controller
{
 /**
     * Envoie la liste des matières premières à la vue index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $user = Auth::user();
            $role = $user->role;
            $entrepot = entrepot::all()->sortby('nom');
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('entrepot.index', compact('entrepot', 'role'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle matière première.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->role;
        return View::make('entrepot.create', compact('role'));
    }

    /**
     * Enregistre dans la base de donnée l'entrepot créer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try 
        {
            $input = Input::all();
            
            $entrepot = new entrepot;
            $entrepot->nom =               $input['nom'];
            $entrepot->type =                $input['type'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        
        if($entrepot->save()) 
        {
            return Redirect::action('entrepotController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($entrepot->validationMessages());
        }
    }

    /**
     * Affiche une matière première.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try 
        {
            $user = Auth::user();
            $role = $user->role;
            $entrepot = entrepot::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('entrepot.show', compact('entrepot','role'));
    }

    /**
     * Affiche le formulaire pour modifier la matière première.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try 
        {
            $user = Auth::user();
            $role = $user->role;
            $entrepot = entrepot::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('entrepot.edit', compact('entrepot','role'));
    }

    /**
     * Mise à jour de la matière première.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try 
        {
            $input = Input::all();
            $entrepot = entrepot::findOrFail($id);
            
            $entrepot->nom =               $input['nom'];
            $entrepot->type =                $input['type'];

        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }

        
        if($entrepot->save()) 
        {
            return Redirect::action('entrepotController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($entrepot->validationMessages());
        }
    }

    /**
     * Suppression de la matière première dans la base de donnée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
            $entrepot = entrepot::findOrFail($id);
            $entrepot->delete();
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('entrepotController@index');
    }
}
