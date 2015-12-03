<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommandesProduitsController;

use App\Models\Commande;
use App\Models\ProduitFini;
use View;
use Redirect;
use Input;
use DB;

class CommandesController extends Controller
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
            $commandes = Commande::all()->sortby('id');
            $produits = ProduitFini::all()->sortby('id');
            foreach ($commandes as $commande) 
            {
                if ($commande->commentaire == "")
                {
                    $commande->commentaire = "Aucun commentaire disponible"
                }
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('commandes.index', compact('commandes', 'produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('commandes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try 
        {
            $input = Input::all();
            
            $commande = new Commande;
            $commande->clientsId =  $input['clientsId'];
            $commande->dateDebut =  $input['dateDebut'];
            $commande->dateFin =    $input['dateFin'];
            $commande->etat =       $input['etat'];
            $commande->commentaire= $input['commentaire'];


        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        
        if($commande->save()) 
        {
            return Redirect::action('CommandesController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($commande->validationMessages());
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
            $commande = Commande::findOrFail($id);
            $produits = DB::select('select produitsId 
                                    from commandesproduits 
                                    where commandesId = ?', $id);
            if ($commande->commentaire == "") 
            {
                $commande->commentaire = "Aucune commentaire disponible";
            }
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('commandes.show', compact('commande', 'produits'));
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
            $commande = Commande::findOrFail($id);
            $produits = DB::select('select produitsId 
                                    from commandesproduits 
                                    where commandesId = ?', $id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('commandes.edit', compact('commande', 'produits'));
    }

    /**
     * Update the specified resource in storage.
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
            $commande = Commande::findOrFail($id);
            
            $commande->clientsId =  $input['clientsId'];
            $commande->dateDebut =  $input['dateDebut'];
            $commande->dateFin =    $input['dateFin'];
            $commande->etat =       $input['etat'];
            $commande->commentaire= $input['commentaire'];

        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }

        
        if($commande->save()) 
        {
            return Redirect::action('CommandesController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($commande->validationMessages());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desactivateCommande($id)
    {
        try 
        {
            $commande = Commande::findOrFail($id);
            destroyItems($id);
            DB::table('commandes')
                    ->where('Id', $id)
                    ->update(['actif' => 0]);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('CommandesController@index');
    }

    public function desactivateItems($id)
    {
        try
        {
            DB::table('commandesproduits')
                    ->where('produitsId', $id)
                    ->update(['actif' => 0]);
        }
        catch
        {
            App::abort(404);
        }
    }
}
