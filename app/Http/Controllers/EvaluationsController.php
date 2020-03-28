<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Course;

class EvaluationsController extends Controller
{
    public function index ($c_id) {
        if(Auth::check()) {
            $user = auth()->user();
            $course = Course::findOrFail($c_id);
            if($user->id == $course->user_id) {
                return view('evaluations.edit', [
                    'course' => $course
                ]);
            }
            else return view('auth.login');
        }
        else return view('auth.login');
    }
}
