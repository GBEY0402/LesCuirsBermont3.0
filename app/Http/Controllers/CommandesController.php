<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Commande;
use App\Models\ProduitFini;
use View;
use Redirect;
use Input;
use DB;
use Auth;

class CommandesController extends Controller
{
    /**
     * Liste des commandes dans la vue index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $user = Auth::user();
            $role = $user->role;
            $commandes = Commande::all()->sortby('id');
            $produits = ProduitFini::all();
            foreach ($commandes as $commande) 
            {
                if ($commande->commentaire == "")
                {
                    $commande->commentaire = "Aucun commentaire disponible";
                }
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('commandes.index', compact('commandes', 'produits', 'role'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle commande.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->role;
        return View::make('commandes.create', compact('role'));
    }

    /**
     * Ajout à la base de donnée d'une nouvelle commande.
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
     * Affiche la commande selectionnée.
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
        return View::make('commandes.show', compact('commande', 'produits', 'role'));
    }

    /**
     * Affiche le formulaire pour modifier une commande.
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
            $commande = Commande::findOrFail($id);
            $produits = DB::select('select produitsId 
                                    from commandesproduits 
                                    where commandesId = ?', $id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('production.edit', compact('commande', 'produits', 'role'));
    }

    /**
     * Mise à jour de la commande dans la base de donnée.
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
            $produits = DB::select('select produitsId, quantite 
                                    from commandesproduits 
                                    where commandesId = ?', $id);
            
            $commande->clientsId =  $input['clientsId'];
            $commande->dateDebut =  $input['dateDebut'];
            $commande->dateFin =    $input['dateFin'];
            $commande->etat =       $input['etat'];
            $commande->commentaire= $input['commentaire'];

            // $i = 1;

            // foreach ($produits as $produit)
            // {
            //     $produit->quantite = $input['']
            // }



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
     * Suppression 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
            
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('CommandesController@index');
    }
}
