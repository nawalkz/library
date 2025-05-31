<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function create()
    {
// If there is at least one Admin, prevent access
        if (User::where('isadmin', 1)->exists()) {
            abort(403, 'Accès refusé');
        }

        return view('auth.register-admin');
    }

    public function store(Request $request)
    {
        if (User::where('isadmin', 1)->exists()) {
            abort(403, 'Accès refusé');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'telephone' => 'required|string|max:20',
        ]);
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('users', 'public');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'image' => $imagePath,
            'telephone' => $request->telephone,
            'isadmin' => 1,
            'role_id' => null,
        ]);

        return redirect('/login')->with('message', 'Admin enregistré avec succès.');
    }
}
