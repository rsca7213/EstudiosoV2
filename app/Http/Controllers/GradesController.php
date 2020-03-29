<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Course;
use App\Evaluation;

class GradesController extends Controller
{
    public function index ($c_id) {
        if(Auth::check()) {
            $user = auth()->user();
            $course = Course::findOrFail($c_id);
            if($user->id == $course->user_id) {
                $evs = $course->evaluations()->where('course_id', $course->id)->get()->sortBy('date');
                return view('grades.edit', [
                    'course' => $course,
                    'evs' => $evs
                ]);
            }
            else return redirect('/login');
        }
        else return redirect('/login');
    }
}
