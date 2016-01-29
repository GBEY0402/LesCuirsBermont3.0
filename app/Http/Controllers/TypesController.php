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
     * Show the form for creating a new resource.
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
            $type = Type::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('types.edit', compact('type', 'role'));
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
     * Remove the specified resource from storage.
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
