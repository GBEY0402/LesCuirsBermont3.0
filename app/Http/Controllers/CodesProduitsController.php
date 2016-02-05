<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CodeProduit;
use View;
use Redirect;
use Input;
use Auth;

class CodesProduitsController extends Controller
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
            $codes = CodeProduit::all()->sortby('code');
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('codesProduits.index', compact('codes', 'role'));
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
        return View::make('codesProduits.create', compact('role'));
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
            $code = new CodeProduit;
            $code->code =         $input['code'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        
        if($code->save()) 
        {
            return Redirect::action('CodesProduitsController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($code->validationMessages());
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
            $code = CodeProduit::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('codesProduits.show', compact('code', 'role'));
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
            $code = CodeProduit::findOrFail($id);
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return View::make('codesProduits.edit', compact('code', 'role'));
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
            $code = CodeProduit::findOrFail($id);
            
            $code->code =         $input['code'];
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }

        if($code->save()) 
        {
            return Redirect::action('CodesProduitsController@index');
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($code->validationMessages());
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
            $code = CodeProduit::findOrFail($id);
            $code->delete();
        } 
        catch(ModelNotFoundException $e) 
        {
            App::abort(404);
        }
        return Redirect::action('CodesProduitsController@index');
    }
}
