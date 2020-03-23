<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Course;

class CoursesController extends Controller
{
    public function index () {
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
                'name' => 'required|string|max:60',
                'teacher' => 'required|string|max:60',
                'color' => 'required|string|max:7|min:7'
            ]);
            auth()->user()->courses()->create([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'teacher' => $data['teacher'],
                'color' => $data['color']
            ]);
            return redirect('/courses/view');
        }
    }
}
