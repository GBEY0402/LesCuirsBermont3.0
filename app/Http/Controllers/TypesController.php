<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Type;
use View;
use Redirect;
use Input;
use Auth;

class TypesController extends Controller
{
    /**
     * Affiche la liste des types de matières premières.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $user = Auth::user();
            $role = $user->role;
            $types = Type::all()->sortby('nom');
            foreach ($types as $type) 
            {
                if ($type->commentaire == "")
                {
                    $type->commentaire = "Aucun commentaire disponible";
                }
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('types.index', compact('types', 'role'));
    }

    /**
     * Affiche le formulaire de création d'un type de matière première.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->role;
        return View::make('types.create', compact('role'));
    }

    /**
     * Enregistre le nouveau type dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        try 
        {
            $input = Input::all();
            
            $type = new Type;
            $type->nom =         $input['nom'];
            $type->commentaire = $input['commentaire'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        
        if($type->save()) 
        {
            return Redirect::action('TypesController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($type->validationMessages());
        }
    }

    /**
     * Affiche les spécifications d'un type de matière première.
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
            $type = Type::findOrFail($id);
            if ($type->commentaire == "") 
            {
                $type->commentaire = "Aucun commentaire disponible";
            }
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('types.show', compact('type', 'role'));
    }

    /**
     * Affiche le formulaire de modification d'un type de matière première.
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
            $type = Type::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('types.edit', compact('type', 'role'));
    }

    /**
     * Mise à jour du type de matière première dans la base de données.
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
            $type = Type::findOrFail($id);
            
            $type->nom =         $input['nom'];
            $type->commentaire = $input['commentaire'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }

        if($type->save()) 
        {
            return Redirect::action('TypesController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($type->validationMessages());
        }
    }

    /**
     * Suppression d'un type de matière première de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
            $type = Type::findOrFail($id);
            $type->delete();
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('TypesController@index');
    }
}
