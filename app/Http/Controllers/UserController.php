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
}
