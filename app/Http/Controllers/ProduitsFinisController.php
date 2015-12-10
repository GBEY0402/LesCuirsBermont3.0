<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ProduitFini;
use View;
use Redirect;
use Input;
use Auth;

class ProduitsFinisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $user = Auth::user();
            $role = $user->role;
            $produits = ProduitFini::all()->sortby('code');
            foreach ($produits as $produit) 
            {
                if ($produit->description == "")
                {
                    $produit->description = "Aucune description disponible";
                }
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('produitsFinis.index', compact('produits', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->role;
        return View::make('produitsFinis.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try 
        {
            $input = Input::all();
            
            $produit = new ProduitFini;
            $produit->code =        $input['code'];
            $produit->nom =         $input['nom'];
            $produit->quantite =    $input['quantite'];
            $produit->prix =        $input['prix'];
            $produit->description = $input['description'];
            $produit->actif =       $input['actif'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        
        if($produit->save()) 
        {
            return Redirect::action('ProduitsFinisController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($produit->validationMessages());
        }
    }

    /**
     * Display the specified resource.
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
            $produit = ProduitFini::findOrFail($id);
            if ($produit->description == "") 
            {
                $produit->description = "Aucune description disponible";
            }
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('produitsFinis.show', compact('produit', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
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
            $produit = ProduitFini::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('produitsFinis.edit', compact('produit', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        try 
        {
            $input = Input::all();
            $produit = ProduitFini::findOrFail($id);
            
            $produit->code =        $input['code'];
            $produit->nom =         $input['nom'];
            $produit->quantite =    $input['quantite'];
            $produit->prix =        $input['prix'];
            $produit->description = $input['description'];
            $produit->actif =       $input['actif'];

        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }

        
        if($produit->save()) 
        {
            return Redirect::action('ProduitsFinisController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($produit->validationMessages());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
            $produit = ProduitFini::findOrFail($id);
            $produit->delete();
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('ProduitsFinisController@index');
    }
}
