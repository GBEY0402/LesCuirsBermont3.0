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

        return View::make('entrepotProduitFini.edit', compact('role', 'entrepot','ProduitsFinis')); 
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
            $codesProduits = ProduitFini::lists('code', 'id');
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
            $ProduitFini_id = $input['codeProduit'];
            $pointure = $input['pointure'];  
            $quantite = $input['quantite'];
            
        } catch (ModelNotFoundException $e) {
            App::abort(404);
        }

        
        $entrepot->ProduitsFinis()->attach($ProduitFini_id, ['pointure' => $pointure , 'quantite' => $quantite]);
        return Redirect::action('entrepotProduitFiniController@MultiEdit', $entrepot->id);
         
        // else 
        // {
        //     return Redirect::back()->withInput()->withErrors($entrepotProduitFini->validationMessages());
        // }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($entrepotId)
    {
        try {
            $entrepot = entrepot::findOrFail($entrepotId);
        } catch (ModelNotFoundException $e) {
            App::abort(404);
        }

        return View::make('entrepotProduitFini.show', compact('entrepot', 'ProduitFini'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MultiEdit($entrepotId)
    {
        try {
            $user = Auth::user();
            $role = $user->role;
            $entrepot = entrepot::findOrFail($entrepotId);
            $ProduitsFinis = $entrepot->ProduitsFinis()->orderby('code')->orderby('pivot_pointure')->get();
            $listeEntrepot = entrepot::lists('nom', 'id');
        } catch (ModelNotFoundException $e) {
            App::abort(404);
        }

        return View::make('entrepotProduitFini.edit', compact('role', 'entrepot','ProduitsFinis', 'listeEntrepot'));
    }

    
    public function get_string_between($string, $start, $end){
                $string = ' ' . $string;
                $ini = strpos($string, $start);
                if ($ini == 0) return '';
                $ini += strlen($start);
                $len = strpos($string, $end, $ini) - $ini;
                return substr($string, $ini, $len);
            }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function MultiUpdate($entrepotId) 
    {
    
        try {


            $user = Auth::user();
            $role = $user->role;
            $entrepot = entrepot::findOrFail($entrepotId);

            $l_quantites = Input::all(); 
            $ProduitsFinis = $entrepot->ProduitsFinis->sortby('code'); 
            $entrepot->ProduitsFinis()->detach(); 
            foreach ($l_quantites as $name => $quantiteq){
                if ($name[0] == 'q'){
                
                
                    $fullstring = $name;
                    $ProduitFini_Id = entrepotProduitFiniController::get_string_between($fullstring, '_', '-');
                    $pointure = entrepotProduitFiniController::get_string_between($fullstring, '-', '_');
                    $quantite = $quantiteq;
                    $entrepot->ProduitsFinis()->attach($ProduitFini_Id, ['pointure' => $pointure , 'quantite' => $quantite]);
                                          
                 }
    
            }

    
            return Redirect::action('entrepotProduitFiniController@MultiEdit', $entrepot->id);

        } 
        catch (ModelNotFoundException $e) {
            App::abort(404);
        }
        
        // if($ProduitFini->save()) { 
        //     return Redirect::action('entrepotProduitFiniController@index', $entrepotId);
        // } else {
        //     return Redirect::back()->withInput()->withErrors($ProduitFini->validationMessages);
        // }
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function transfert_entrepotde($entrepotId, $ProduitFiniId, $pointure) {
        
       
        $entrepot = entrepot::findOrFail($entrepotId);

        return View::make('entrepotProduitFini.transfert', compact('role', 'entrepot','ProduitsFiniId', 'pointure'));
        
        

        //$entrepot->ProduitsFinis()->wherePivot('produit_fini_id', $ProduitFini_Id)->wherePivot('pointure', $pointure)->updateExistingPivot($ProduitFini_Id, ['pointure' => $pointure , 'quantite' => $quantiteAchanger]);

        
         //return Redirect::action('entrepotProduitFiniController@MultiEdit', $entrepot->id);

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
