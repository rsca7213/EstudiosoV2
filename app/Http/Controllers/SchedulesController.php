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

    public function edit () {
        if(Auth::check()) {
            return view('schedules.edit');
        }
        else return redirect('/login');
    }

    public function listCourses () {
        if(Auth::check()) {
            $user = auth()->user();
            $courses = $user->courses()->where('user_id', $user->id)->get();
            return response($courses, 200);
        }
        else return response('Unauthorized', 401);
    }
}
