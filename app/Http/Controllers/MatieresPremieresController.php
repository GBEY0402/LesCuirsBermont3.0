<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MatierePremiere;
use View;
use Redirect;
use Input;
use Auth;

class MatieresPremieresController extends Controller
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
            $materiaux = MatierePremiere::all()->sortby('type');
            foreach ($materiaux as $materiel) 
            {
                if ($materiel->description == "")
                {
                    $materiel->description = "Aucun description disponible";
                }
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('matieresPremieres.index', compact('materiaux'));
    }

    /**
     * Affiche le formulaire pour créer une nouvelle matière première.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('matieresPremieres.create');
    }

    /**
     * Enregistre dans la base de donnée la nouvelle matière première créer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try 
        {
            $input = Input::all();
            
            $materiel = new MatierePremiere;
            $materiel->type =               $input['type'];
            $materiel->nom =                $input['nom'];
            $materiel->description =        $input['description'];
            $materiel->prix =               $input['prix'];
            $materiel->quantiteTotale =     $input['quantiteTotale'];
            $materiel->quantiteMinimum =    $input['quantiteMinimum'];
            $materiel->quantiteLimite =     $input['quantiteLimite'];
            $materiel->quantiteReserver =   $input['quantiteReserver'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        
        if($commande->save()) 
        {
            return Redirect::action('MatieresPremieresController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($materiel->validationMessages());
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
            $materiel = MatierePremiere::findOrFail($id);
            if ($materiel->description == "") 
            {
                $materiel->description = "Aucune description disponible";
            }
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('matieresPremieres.show', compact('materiel'));
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
            $materiel = MatierePremiere::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('matieresPremieres.edit', compact('materiel'));
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
            $materiel = MatierePremiere::findOrFail($id);
            
            $materiel->type =               $input['type'];
            $materiel->nom =                $input['nom'];
            $materiel->description =        $input['description'];
            $materiel->prix =               $input['etat'];
            $materiel->quantiteTotale =     $input['quantiteTotale'];
            $materiel->quantiteMinimum =    $input['quantiteMinimum'];
            $materiel->quantiteLimite =     $input['quantiteLimite'];
            $materiel->quantiteReserver =   $input['quantiteReserver'];

        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }

        
        if($materiel->save()) 
        {
            return Redirect::action('MatieresPremieresController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($materiel->validationMessages());
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
            $materiel = MatierePremiere::findOrFail($id);
            $materiel->delete();
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('MatieresPremieresController@index');
    }
}
