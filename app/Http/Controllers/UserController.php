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
    	return View::make('users.create');   	
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
		$users->nom = $input['nom'];
		$users->prenom = $input['prenom'];
		$users->role = $input['role'];
		$users->password = $input['password'];
		
		if($users->save()) {
			if (is_array(Input::get('sport'))) {
				$users->sports()->attach(array_keys(Input::get('sport')));
			}
			return Redirect::action('UserController@index');
		} else {
			return Redirect::back()->withInput()->withErrors($users->validationMessages);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
