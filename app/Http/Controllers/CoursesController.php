<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Course;
use App\Evaluation;

class CoursesController extends Controller
{
    public function index () {
        if(Auth::check()) {
            return view('courses.view', [
                'courses' => auth()->user()->courses()->where('user_id', auth()->user()->id)->get(),
            ]);
        }
        else return view('auth.login');
    }

    public function create () {
        if (Auth::check()) {
            return view ('courses.add', [
                'user' => auth()->user()
            ]);
        }
        else return view('auth.login');
    }

    public function store (Request $request) {
        if (Auth::check()) {
            $data = $request->validate([
                'name' => 'required|string|max:50',
                'teacher' => 'required|string|max:50',
                'color' => 'required|string|max:7|min:7'
            ]);

            $courses = auth()->user()->courses()->where('user_id', auth()->user()->id)->get();
            foreach($courses as $course) {
                if($course->name == $data['name']) return back()->withErrors(['name' => ['Ya tiene un curso con este nombre.']]);
            }

            $newid = auth()->user()->courses()->create([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'teacher' => $data['teacher'],
                'color' => $data['color']
            ])->id;
            return redirect('/evaluations/modify/'.$newid);
        }
    }

    public function delete (Request $request) {
        if(Auth::check()) {
            $id = $request->id;
            $course = Course::findOrFail($id);
            if($course->user_id == auth()->user()->id) {
                $evs = $course->evaluations()->where('course_id', $course->id)->get();
                foreach ($evs as $ev) {
                    $ev->delete();
                }
                $course->delete();
                return redirect('/courses/view');
            }
            else return view('auth.login');
        }
        else return view('auth.login');
    }
}
