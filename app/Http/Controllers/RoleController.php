<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           $roles = Role::paginate(10);
           return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreRoleRequest $request)
    {
        $formFields = $request->validated();
        Role::create($formFields);

        return redirect()->route('admin.roles.index')->with('success', 'role ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request,Role $role)
    {
        $formFields = $request->validated();
        $role->update($formFields);

        return redirect()->route('admin.roles.index')->with('update', 'role mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('destroy', 'role supprimé avec succès.');
    }
    
}
