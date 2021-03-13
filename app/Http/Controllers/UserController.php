<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'oItems' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $oRequest
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $oRequest)
    {
        User::create($oRequest->all());
        
        return redirect('user')->withOk('L\'utilisateur a été ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.form', [
            'oItem' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $oRequest
     * @param  \App\Models\User  $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $oRequest, User $user)
    {
        $user->update($oRequest->all());
        
        return redirect('user')->withOk('L\'utilisateur a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect('user')->withOk('L\'utilisateur a été supprimé avec succès');
    }
}
