<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Course;
use App\Evaluations;

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

    public function delete (Request $request) {
        if(Auth::check()) {
            $user = auth()->user();
            if(!Hash::check($request->input('password'), $user->password)) return response('Password missmatch', 422);
            $cs = $user->courses()->where('user_id', $user->id)->get();
            foreach ($cs as $c) {
                $evs = $c->evaluations()->where('course_id', $c->id)->get();
                foreach ($evs as $ev) {
                    $ev->delete();
                }
                $c->delete();
            }
            $user->delete();
            return response('Success', 200);
        }
        else return response('Unauthorized', 401);
    }

    public function update (Request $request) {
        if(Auth::check()) {
            $user = auth()->user();
            if($request->input('new-password') != null) {
                $data = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => 'required|string|max:255|unique:users,email,'.$user->id,
                    'new-password' => ['required', 'string', 'min:8']
                ]);
                if(!Hash::check($request->input('password'), $user->password)) return back()->withErrors(['password' => ['La contraseña es incorrecta.']]);
                $user->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['new-password'])
                ]);
                return redirect('/profile');
            }
            else {
                $data = $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => 'required|string|max:255|unique:users,email,'.$user->id,
                ]);
                if(!Hash::check($request->input('password'), $user->password)) return back()->withErrors(['password' => ['La contraseña es incorrecta.']]);
                $user->update([
                    'name' => $data['name'],
                    'email' => $data['email']
                ]);
                return redirect('/profile');
            }
        }
        else return redirect('/login');
    }
}
