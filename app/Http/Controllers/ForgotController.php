<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Mail\forgotPasswordMail;
use Illuminate\Support\Facades\Mail;

use App\User;

class ForgotController extends Controller
{
    public function index() {
        return view('auth.forgot');
    }

    public function reset(Request $request) {
        $data = $request->validate([
            'email' => 'required|string|email|max:255'
        ]);
        $user = User::where('email', $data['email'])->get();
        if($user->isEmpty()) {
            return back()->withErrors(['email' => ['El email introducido no se encuentra registrado en la aplicación.']]);
        }
        $tempPass = rand(10000000,10000000000);
        $user->first()->update([
            'password' => Hash::make($tempPass)
        ]);
        Mail::to($data['email'])->send(new forgotPasswordMail($user->first()->name, $tempPass)); 
        return back()->withErrors(['send' => ['El correo ha sido enviado correctamente. ']]);
        
    }
}
