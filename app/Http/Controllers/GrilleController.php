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
     * Affiche le contenu d'un entrepot sous forme de grille.
     *
     * @return \Illuminate\Http\Response
     */
    
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
                                array_push($sousListeItems, " ");
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
                                    array_push($sousListeItems, " ");
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
     * Non utiliser pour le moment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Non utiliser pour le moment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Non utiliser pour le moment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Non utiliser pour le moment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Non utiliser pour le moment.
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
     * Non utiliser pour le moment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
