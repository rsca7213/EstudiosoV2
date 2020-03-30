<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;

class ProfilesController extends Controller
{
    public function index () {
        if(Auth::check()) {
            $user = auth()->user();
            return view('profiles.edit', [
                'user' => $user
            ]);
        }
        else return redirect('/login');
    }
}
