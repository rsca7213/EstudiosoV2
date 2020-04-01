<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Courses;

class SchedulesController extends Controller
{
    public function index () {
        if(Auth::check()) {
            $user = auth()->user();
            $cs = $user->courses()->where('user_id', $user->id)->get();
            return view('schedules.view', [
                'courses' => $cs
            ]);
        }
        else return redirect('/login');
    }
}
