<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use View;
use DB;
use Auth;
use App\Models\Entrepot;

class GrilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function edit($entrepotId)
    {
        try
        {
            $user = Auth::user();
            $role = $user->role;
            $entrepot = Entrepot::findOrFail($entrepotId);
            $items = $entrepot->ProduitsFinis()->orderby("code")->get();
            $rows = count($items);
            $listeItems = array();
            $sousListeItems = array();
            $validateur = 0;

            if($rows > 0)
            {    
                for($i = 0; $i < $rows; $i++)
                {
                    if($i == 0)
                    {
                        array_push($sousListeItems, $items[0]->code);
                        array_push($sousListeItems, $items[0]->pivot->pointure);
                        array_push($sousListeItems, $items[0]->pivot->quantite);
                    }
                    else
                    {
                        if($items[$i]->code == $items[$i - 1]->code)
                        {
                            array_push($sousListeItems, $items[$i]->pivot->pointure);
                            array_push($sousListeItems, $items[$i]->pivot->quantite);
                        }
                        else
                        {
                            array_push($listeItems, $sousListeItems);
                            $sousListeItems = array();
                            array_push($sousListeItems, $items[$i]->code);
                        }
                    }
                }
                array_push($listeItems, $sousListeItems);
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('grille.edit', compact('role', 'entrepot', 'listeItems', 'validateur'));
    }*/

    /*public function edit($entrepotId)
    {
        try
        {
            $user = Auth::user();
            $role = $user->role;
            $entrepot = Entrepot::findOrFail($entrepotId);
            $items = $entrepot->ProduitsFinis()->orderby("code")->orderby("pointure")->get();
            $rows = count($items);
            $sousListeItems = array();
            $listeItems = array();
            if($rows > 0)
            {    
                for($i = 0; $i < $rows; $i = $i + 0)
                {

                    echo "I = $i\n";
                    $sousListeItems = array();
                    $j = 0;
                    while($j < 14)
                    {
                        if($j == 0)
                        {
                            array_push($sousListeItems, $items[$i]->code);
                            echo "j = $j\n";
                            echo "sousListeItems = $sousListeItems[$j]\n";
                        }
                        else
                        {
                            echo "j = $j\n";
                            if($j == $items[$i]->pivot->pointure)
                            {
                                array_push($sousListeItems, $items[$i]->pivot->quantite);
                                echo "sousliste = $sousListeItems[$j]\n";
                                $i++;
                                echo "i = $i\n";
                            }
                            else
                            {
                                array_push($sousListeItems, 0);
                                echo "sousliste = $sousListeItems[$j]\n";
                            }
                        }
                        $j++;
                    }
                    array_push($listeItems, $sousListeItems);
                }
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('grille.edit', compact('role', 'entrepot', 'listeItems'));
    }*/

    public function edit($entrepotId)
    {
        try
        {
            $user = Auth::user();
            $role = $user->role;
            $entrepot = Entrepot::findOrFail($entrepotId);
            $items = $entrepot->ProduitsFinis()->orderby("code")->orderby("pointure")->get();
            $rows = count($items);
            $sousListeItems = array();
            $listeItems = array();
            if($rows > 0)
            {    
                for($i = 0; $i < $rows; $i = $i + 0)
                {
                    $sousListeItems = array();
                    $j = 0;
                    while($j < 14)
                    {
                        if($j == 0)
                        {
                            array_push($sousListeItems, $items[$i]->code);
                        }
                        else
                        {
                            if($i >= $rows)
                            {
                                array_push($sousListeItems, 0);
                            }
                            else
                            {
                                if($j == $items[$i]->pivot->pointure)
                                {
                                    array_push($sousListeItems, $items[$i]->pivot->quantite);
                                    $i++;
                                }
                                else
                                {
                                    array_push($sousListeItems, 0);
                                }
                            }
                        }
                        $j++;
                    }
                    array_push($listeItems, $sousListeItems);
                }
            }
        }
        catch(ModelNotFoundException $e)
        {
            App::abort(404);
        }
        return View::make('grille.edit', compact('role', 'entrepot', 'listeItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    public function update($id)
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
