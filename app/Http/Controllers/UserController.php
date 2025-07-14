<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function index()
    {
        $users = User::with('role')->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    public function create()
    {
        
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
       User::create($request->all());

        return redirect()->route('admin.users.index')->with('success', 'user ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
{
    return view('admin.users.edit', compact('user'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
       
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('update', 'user mis à jour avec succès.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       
        $user->delete();

        return redirect()->route('admin.users.index')->with('destroy', 'user supprimé avec succès.');
    }
}
