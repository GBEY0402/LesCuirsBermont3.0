<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ProduitFini;
use App\Models\CodeProduit;
use App\Models\entrepot;
use View;
use Redirect;
use Input;
use Auth;
use DB;

class ProduitsFinisController extends Controller
{
    /**
     * Envoie la liste de produit fini à la vue index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $user = Auth::user();
            $role = $user->role;
            $entrepots = Entrepot::All();
            $produits = ProduitFini::All();

            //$listeProduitsEntrepot = entrepot->pivot->
            
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('produitsFinis.index', compact('produits', 'role', 'entrepots'));
    }

    /**
     * Affiche le formulaire pour créer un produit fini.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->role;
        $codes = CodeProduit::lists('code');
        if($codes->isEmpty())
            {
                return View::make('codesProduits.create', compact('role'));
            }
        return View::make('produitsFinis.create', compact('role', 'codes'));
    }

    /**
     * Enregistre le nouveau produit fini dans la base de donnée.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try 
        {
            $input = Input::all();
            $codes = CodeProduit::lists('code');
            
            $produit = new ProduitFini;
            $produit->code =        $codes[$input['code']];
            $produit->nom =         $input['nom'];
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
     * Affiche les spécifications d'un produit fini.
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
     * Affiche le formulaire pour modifier un produit fini.
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
            $codes = CodeProduit::lists('code');
            if($codes->isEmpty())
            {
                return View::make('codesProduits.create', compact('role'));
            }
            $produit = ProduitFini::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('produitsFinis.edit', compact('produit', 'role', 'codes'));
    }

    /**
     * Mise à jour du produit fini dans la base de données.
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
            $codes = CodeProduit::lists('code');
            $produit = ProduitFini::findOrFail($id);
            
            $produit->code =        $codes[$input['code']];
            $produit->nom =         $input['nom'];
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
     * Suppression du produit fini de la base de données.
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
