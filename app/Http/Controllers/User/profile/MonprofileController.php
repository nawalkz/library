<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonprofileController extends Controller
{

    public function index(){
        $user = auth()->user(); 
        return view('users.profile.monprofile.index', compact('user'));
    }

}
