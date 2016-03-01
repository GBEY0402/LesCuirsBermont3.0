<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Commande;
use App\Models\ProduitFini;
use App\Models\Client;
use App\Models\CommandeProduit;
use View;
use Redirect;
use Input;
use Auth;
use DB;
use DateTime;

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
        return View::make('commandes.index', compact('commandes', 'role'));
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
        $codes = ProduitFini::lists('code');
        $clients = Client::lists('id');

        return View::make('commandes.create', compact('role', 'clients', 'codes'));
    }

    /**
     * Ajout à la base de donnée d'une nouvelle commande.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /*$input = Input::all();
        dd($input);*/
        try 
        {
            $input = Input::all();
            $lineCount = $input['maxLineCount'];
            $clients = Client::lists('id'); 

            $commande = new Commande;
            $commande->clients_Id = $clients[$input['clientsId']];
            $commande->dateDebut =  new DateTime($input['dateDebut']);
            $commande->dateFin =    new DateTime($input['dateFin']);
            $commande->etat =       $input['etat'];
            $commande->commentaire= $input['commentaire'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        
        if($commande->save()) 
        {
            try
            {
                for($i = 1; $i == $lineCount; $i++)
                {
                    $code = ($i."_code");
                    if(Input::has($code))
                    {
                        $pointure = $i."_pointure";
                        $quantite = $i."_quantite";
                        $produitFini = DB::table('ProduitsFinis')->where('code', $input[$code])->first();
                        $commande->ProduitsFinis()->attach($produitFini->id, ['pointure' => $input[$pointure] , 'quantite' => $input[$quantite]]);  
                    }        
                }
            }
            catch(ModelNotFoundException $e)
            {
                App::abort(404);
            }
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
            $produitsFinis = $commande->ProduitsFinis()->orderby("code")->get();

            if ($commande->commentaire == "") 
            {
                $commande->commentaire = "Aucune commentaire";
            }
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('commandes.show', compact('commande', 'role', 'produitsFinis'));
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
            $clients = Client::lists('id');
            $commande = Commande::findOrFail($id);
            $produitsFinis = $commande->ProduitsFinis()->orderby("code")->get();
            $nombreProduits = count($produitsFinis);
            $data = array();
            
            $i = 1;
            
            foreach($produitsFinis as $produit)
            {
                $row = array();
                array_push($row, $i.'_code');
                array_push($row, $produit->code);
                array_push($row, $i.'_pointure');
                array_push($row, $produit->pivot->pointure);
                array_push($row, $i.'_quantite');
                array_push($row, $produit->pivot->quantite);
                array_push($data, $row);
                $i = $i + 1;
            }
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('commandes.edit', compact('commande', 'role', 'clients', 'data', 'nombreProduits'));
    }

    /**
     * Mise à jour de la commande dans la base de donnée.
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
            $lineCount = $input['maxLineCount'];
            $commande = Commande::findOrFail($id);
            
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
            try
            {
                $commande->ProduitsFinis()->detach();
                for($i = 1; $i == $lineCount; $i++)
                {
                    $code = ($i."_code");
                    if(Input::has($code))
                    {
                        $pointure = $i."_pointure";
                        $quantite = $i."_quantite";
                        $produitFini = DB::table('ProduitsFinis')->where('code', $input[$code])->first();
                        $commande->ProduitsFinis()->attach($produitFini->id, ['pointure' => $input[$pointure] , 'quantite' => $input[$quantite]]);  
                    }        
                }
            }
            catch(ModelNotFoundException $e)
            {
                App::abort(404);
            }
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
            $commande = Commande::findOrFail($id);
            $commande->produitsFinis()->detach();
            $commande->delete();
        }  
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('CommandesController@index');
    }
}
