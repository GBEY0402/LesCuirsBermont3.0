<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CodeProduit;
use View;
use Redirect;
use Input;
use Auth;

class CodesProduitsController extends Controller
{
    /**
     * Affiche la liste des codes de produits existants.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $user = Auth::user();
            $role = $user->role;
            $codes = CodeProduit::all()->sortby('code');
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('codesProduits.index', compact('codes', 'role'));
    }

    /**
     * Affiche le formulaire de création d'un code de produit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->role;
        return View::make('codesProduits.create', compact('role'));
    }

    /**
     * Enregistre le nouveau code de produit dans la base de données.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try 
        {
            $input = Input::all();
            $code = new CodeProduit;
            $code->code = $input['code'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        
        if($code->save()) 
        {
            return Redirect::action('CodesProduitsController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($code->validationMessages());
        }
    }

    /**
     * Affiche les spécification d'un code de produit.
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
            $code = CodeProduit::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('codesProduits.show', compact('code', 'role'));
    }

    /**
     * Affiche le formulaire de modification d'un code de produit.
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
            $code = CodeProduit::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('codesProduits.edit', compact('code', 'role'));
    }

    /**
     * Met à jour les modifications d'un code de produit après l'avoir modifier.
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
            $code = CodeProduit::findOrFail($id);
            
            $code->code = $input['code'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }

        if($code->save()) 
        {
            return Redirect::action('CodesProduitsController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($code->validationMessages());
        }
    }

    /**
     * Efface le code de produit de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
            $code = CodeProduit::findOrFail($id);
            $code->delete();
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('CodesProduitsController@index');
    }
}
