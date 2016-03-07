<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
        *
        * La vue inventaire est appelé lors de l'authtentication est accepté.
        * On envoie avec la vue le paramètre role. 
        *
        */
        $user = Auth::user();
        $role = $user->role;
        return view('inventaire', compact('user', 'role'));
    }

    public function ici()
    {
        return view('test.createUser');
    }

    public function prod()
    {
        /**
        *
        * 
        * 
        *
        */
        $user = Auth::user();
        return view('production', ['role' => $user->role]);
    }

    public function usager()
    {
        /**
        *
        * 
        * 
        *
        */
        $user = Auth::user();
        return view('gestionemploye', ['role' => $user->role]);
    }

        public function inventaire()
    {
        /**
        *
        * 
        * 
        *
        */
        $user = Auth::user();
        return view('inventaire', ['role' => $user->role]);
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
    public function store(Request $request)
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
