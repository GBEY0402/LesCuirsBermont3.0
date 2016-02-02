<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MatierePremiere;
use App\Models\Type;
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
        return View::make('matieresPremieres.index', compact('materiaux', 'role'));
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
        $types = Type::lists('nom');
        return View::make('matieresPremieres.create', compact('role', 'types'));
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
            $types = Type::lists('nom');
            
            $materiel = new MatierePremiere;
            $materiel->type =               $types[$input['type']];
            $materiel->nom =                $input['nom'];
            $materiel->description =        $input['description'];
            $materiel->prix =               $input['prix'];
            $materiel->quantiteTotale =     $input['quantiteTotale'];
            $materiel->quantiteMinimum =    $input['quantiteMinimum'];
            $materiel->quantiteLimite =     $input['quantiteLimite'];
            $materiel->quantiteReserve =    0;
            $materiel->actif =              $input['actif'];
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
        return View::make('matieresPremieres.show', compact('materiel','role'));
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
            $types = Type::lists('nom')->sortby('nom');
            $materiel = MatierePremiere::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('matieresPremieres.edit', compact('materiel','role', 'types'));
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
            $types = Type::lists('nom');
            
            $materiel->type =               $types[$input['type']];
            $materiel->nom =                $input['nom'];
            $materiel->description =        $input['description'];
            $materiel->prix =               $input['prix'];
            $materiel->quantiteTotale =     $input['quantiteTotale'];
            $materiel->quantiteMinimum =    $input['quantiteMinimum'];
            $materiel->quantiteLimite =     $input['quantiteLimite'];
            $materiel->actif =              $input['actif'];

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
