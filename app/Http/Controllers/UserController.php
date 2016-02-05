<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use View;
use Redirect;
use Input;
use Auth;
use Hash;

class UserController extends Controller
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
            $usagers = User::all()->sortby('nom');
            foreach ($usagers as $usager) 
            {
                if ($usager->id == "")
                {
                    $usager->id = "Aucun usager disponible";
                }
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('users.index', compact('usagers', 'role'));
	
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
    	return View::make('users.create', compact('role'));   	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$users = new User;
        $this->validate($request, $users->validationRules());
    
        try 
        {
            $input = Input::all();
           
            $users->nom = $input['nom'];
            $users->prenom = $input['prenom'];
            $users->username = $input['username'];
            $users->role = $input['role'];
            $users->password = Hash::make($input['password']);
        }
        
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        } 
        $users->save();
        return Redirect::action('UserController@index');
        
      
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
            $usager = User::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('users.show', compact('usager', 'role'));
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
            $user = User::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('users.edit', compact('user', 'role'));
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
        
        $input = Input::all();
        $users = User::findOrFail($id);

        $this->validate($request, $users->validationRules());
        try 
        {
            $input = Input::all();
           
            $users->nom = $input['nom'];
            $users->prenom = $input['prenom'];
            $users->username = $input['username'];
            $users->role = $input['role'];
            $users->password = Hash::make($input['password']);
        }

        catch(ModelNotFoundException $e) 
        {

            App::abort(404);
        } 
        
        $users->save();
        return Redirect::action('UserController@index');
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
            $user = User::findOrFail($id);
            $user->delete();
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('UserController@index');
    }
}
