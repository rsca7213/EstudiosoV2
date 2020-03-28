<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Course;
use App\Evaluation;

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

    public function store (Request $request, $c_id) {
        if(Auth::check()) {
            $user = auth()->user();
            $course = Course::findOrFail($c_id);
            if($user->id == $course->user_id) {
                $data = $request->validate([
                    'name' => 'required|string|max:50',
                    'date' => 'required|date',
                    'value' => 'required|numeric|max:100|min:1'
                ]);
                $evs = $course->evaluations()->where('course_id', $course->id)->get();
                $acum = 0;
                foreach($evs as $ev) {
                    $acum += $ev->value;
                    if ($ev->name == $data['name']) return response('Name cannot be the same.', 400);
                }
                $acum += $data['value'];
                if ($acum > 100) return response('Value acumulated exceded 100.', 422);
                $course->evaluations()->create([
                    'course_id' => $course->id,
                    'date' => $data['date'],
                    'name' => $data['name'],
                    'value' => $data['value']
                ]);
                return response('Success.', 200);
            }
            else return response('Unauthorized.', 401);
        }
        else return response('Unauthorized.', 401);
    }
}
