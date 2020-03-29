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

    public function store (Request $request, $c_id, $ev_id) {
        if(Auth::check()) {
            $user = auth()->user();
            $course = Course::findOrFail($c_id);
            $ev = Evaluation::findOrFail($ev_id);
            if($course->user_id == $user->id && $ev->course_id == $course->id) {
                $data = $request->validate([
                    'grade' => 'required|numeric|max:20|min:0'
                ]);
                $ev->update([
                    'grade' => $data['grade']
                ]);
                return response('Success', 200);
            }
            else return response('Unauthorized', 401);
        }
        else return response('Unauthorized', 401);
    }

    public function update (Request $request, $c_id, $ev_id) {
        if(Auth::check()) {
            $user = auth()->user();
            $course = Course::findOrFail($c_id);
            $ev = Evaluation::findOrFail($ev_id);
            if($course->user_id == $user->id && $ev->course_id == $course->id) {
                $data = $request->validate([
                    'grade' => 'required|numeric|max:20|min:0'
                ]);
                $ev->update([
                    'grade' => $data['grade']
                ]);
                return response('Success', 200);
            }
            else return response('Unauthorized', 401);
        }
        else return response('Unauthorized', 401);
    }

    public function delete ($c_id, $ev_id) {
        if(Auth::check()) {
            $user = auth()->user();
            $course = Course::findOrFail($c_id);
            $ev = Evaluation::findOrFail($ev_id);
            if($course->user_id == $user->id && $ev->course_id == $course->id) {
                $ev->update([
                    'grade' => null
                ]);
                return response('Success', 200);
            }
            else return response('Unauthorized', 401);
        }
        else return response('Unauthorized', 401);
    }
}
