<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Client;
use View;
use Redirect;
use Input;
use Auth;


class ClientsController extends Controller
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
            $clients = Client::all()->sortby('nom');
            foreach ($clients as $client) 
            {
                if ($client->courriel == "")
                {
                    $client->courriel = "Aucun courriel disponible";
                }
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('clients.index', compact('clients', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('clients.create');
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
            
            $client = new Client;
            $client->prenom =   $input['prenom'];
            $client->nom =      $input['nom'];
            $client->adresse =  $input['adresse'];
            $client->ville =    $input['ville'];
            $client->noTel =    $input['noTel'];
            $client->courriel = $input['courriel'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        
        if($client->save()) 
        {
            return Redirect::action('ClientsController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($client->validationMessages());
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
            $client = Client::findOrFail($id);
            if ($client->courriel == "") 
            {
                $client->courriel = "Aucune courriel disponible";
            }
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('clients.show', compact('client'));
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
            $client = Client::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('clients.edit', compact('client'));
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
            $client = Client::findOrFail($id);
            
            $client->prenom =   $input['prenom'];
            $client->nom =      $input['nom'];
            $client->adresse =  $input['adresse'];
            $client->ville =    $input['ville'];
            $client->noTel =    $input['noTel'];
            $client->courriel = $input['courriel'];

        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }

        
        if($client->save()) 
        {
            return Redirect::action('ClientsController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($client->validationMessages());
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
            $client = Client::findOrFail($id);
            $client->delete();
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('ClientsController@index');
    }
}
