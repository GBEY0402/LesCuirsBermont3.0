<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Redirect;
use Input;
use Auth;

use App\Models\entrepot;
use App\Models\ProduitFini;
use App\Models\CodeProduit;

class entrepotProduitFiniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($entrepotId)
    {
        try {
            $user = Auth::user();
            $role = $user->role;
            $entrepot = entrepot::findOrFail($entrepotId);
            $ProduitsFinis = $entrepot->ProduitsFinis->sortby('code'); 
        } catch (ModelNotFoundException $e) {
            App::abort(404);
        } catch (Exception $e) {
           // return  View::make('erreurs.index')->with('e',$e);
        } 

        return View::make('entrepotProduitFini.index', compact('role', 'entrepot','ProduitsFinis')); 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($entrepotId)
    {
       try {
            $user = Auth::user();
            $role = $user->role;
            $entrepot = entrepot::findOrFail($entrepotId);
            $codesProduits = ProduitFini::lists('id', 'code');
        } catch (ModelNotFoundException $e) {
            App::abort(404);
        }
        return View::make('entrepotProduitFini.create', compact('role', 'entrepot', 'codesProduits' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($entrepotId)
    {
        try {
            $entrepot = entrepot::findOrFail($entrepotId);
            
            $input = Input::all(); 
            dd($input);
            $ProduitFini_id = $codesProduits;
            $pointure = $input['pointure'];  
            $quantite = $input['quantite'];
            
        } catch (ModelNotFoundException $e) {
            App::abort(404);
        }

        if($entrepot->ProduitFini->save()) 
        {
            $entrepot->ProduitsFinis()->attach([$ProduitFini_id => ['pointure' => $pointure], ['quantite' => $quantite]]);
            return Redirect::action('entrepotProduitFiniController@index', $entrepotId);
        } 
        else 
        {
            return Redirect::back()->withInput()->withErrors($entrepotProduitFini->validationMessages());
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($entrepotId, $ProduitFiniId)
    {
        try {
            $entrepot = entrepot::findOrFail($entrepotId);
        } catch (ModelNotFoundException $e) {
            App::abort(404);
        }
        $ProduitFini = $entrepot->ProduitFini()->where('id', '=', $ProduitFiniId)->first();
        return View::make('entrepotProduitFini.show', compact('entrepot', 'ProduitFini'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($entrepotId, $ProduitFiniId)
    {
        try {
            $entrepot = entrepot::findOrFail($entrepotId);
        } catch (ModelNotFoundException $e) {
            App::abort(404);
        }
        $ProduitFini = $entrepot->ProduitFini()->where('id', '=', $ProduitFiniId)->first();
        return View::make('entrepotProduitFini.edit', compact('entrepot', 'ProduitFini'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($entrepotId, $ProduitFiniId) //A VERIFIER
    {
        try {
            $entrepot = entrepot::findOrFail($entrepotId); 
        } catch (ModelNotFoundException $e) {
            App::abort(404);
        }
        $input = Input::all();
                
        $ProduitFini = $entrepot->ProduitFini()->where('id', '=', $ProduitFiniId)->first();
        $ProduitFini->nom = $input['nom'];
        $ProduitFini->description = $input['description'];
        $ProduitFini->entrepot_id = $entrepotId;
        if($ProduitFini->save()) { 
            return Redirect::action('entrepotProduitFiniController@index', $entrepotId);
        } else {
            return Redirect::back()->withInput()->withErrors($ProduitFini->validationMessages);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($entrepotId, $ProduitFiniId)
    {
        
        $ProduitFini = ProduitFini::findOrFail($ProduitFiniId);
        $ProduitFini->delete();
        
        return Redirect::action('entrepotProduitFiniController@index', $entrepotId);    
    }

    public function validationRules() {
        return 
            [
            'entrepotsId'            => 'required',
            'ProduitsId'             => 'required',
            'pointure'               => 'required',
            'quantite'               => 'required',
            ];
    }
}
