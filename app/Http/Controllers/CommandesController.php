<?php

namespace App\Http\Controllers;

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
     * Liste des commandes dans la vue index et assigne l'attribut commentaire de la commande si inexistant.
     * Le role sert à gérer les droits d'utilisation de la vue.
     * Doit envoyer la liste de commandes et le role.
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
            /* Assigne un commentaire à chaque commande si son commentaire est vide */
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
     * Ajout à la base de donnée d'une nouvelle commande et redirige vers
     * l'index une fois l'ajout fait.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try 
        {
            $input = Input::all();
            if(Input::has('maxLineCount'))
            {
                $lineCount = $input['maxLineCount'];
            }
            else
            {
                $lineCount = 0;
            }
            $clients = Client::lists('id'); 

            /* Creation de l'objet Commande et assigne les attributs */
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
                /**
                 * Attache les produits finis à la commande. 
                 * Retrouve le "name" de chaque infos de chaque produits finis 
                 * et attache le produit à la commande.
                 */
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
     * Affiche la commande selectionnée et les produits associés.
     * Utilise une commande, un role et les produits attachés à la commande.
     *
     * @param  int  $id (le id de la commande)
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
     * nombreProduits sert à la fonction update comme compteur de ligne
     *
     * @param  int  $id (L'id de la commande a modifiée)
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
            /**
             * Assigne les "name" de chaque informations dans chacun des produits attachés à la commande.
             */
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
     * Assigne les nouvelles valeurs aux attributs de la commande
     * et modifie les quantités de chaque produit associé à la commande.
     * 
     * @param  int  $id (L'id de la commande à modifiée)
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        try 
        {
            $input = Input::all();
            if(Input::has('maxLineCount'))
            {
                $lineCount = $input['maxLineCount'];
            }
            else
            {
                $lineCount = 0;
            }
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
                /**
                 * Détache(détruit) les produits attachés et réattache les produits avec les nouvelles informations.
                 */
                $commande->ProduitsFinis()->detach();
                for($i = 1; $i == $lineCount; $i++)
                {
                    $code = ($i."_code");
                    if(Input::has($code))
                    {
                        $pointure = $i."_pointure";
                        $quantite = $i."_quantite";
                        $produitFini = DB::table('ProduitsFinis')->where('code', $input[$code])->first();
                        $commande->ProduitsFinis()->attach($produitFini->id, 
                                    ['pointure' => $input[$pointure] , 'quantite' => $input[$quantite]]);  
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
     * Suppression de la commande et des produits attachés.
     * Retrouve la commande, détache les produits et efface la commande de la bd.
     *
     * @param  int  $id (L'id de la commande à effacer)
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
