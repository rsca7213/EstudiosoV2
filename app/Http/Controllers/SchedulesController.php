<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Course;

class SchedulesController extends Controller
{
    public function index () {
        if(Auth::check()) {
            $user = auth()->user();
            $cs = $user->courses()->where('user_id', $user->id)->get();
            $map = [];
            for($i = 7; $i < 21; $i++) {
                $map[$i] = [];
                for($j = 0; $j < 7; $j++) {
                    $map[$i][$j]['name'] = null;
                    $map[$i][$j]['color'] = null;
                }
            }
            for($i = 7; $i <22; $i++) {
                for($j = 0; $j < 7; $j++) {
                    foreach($cs as $c) {
                        if(Course::checkMap($j, $i, $c->hours)) {
                            $map[$i][$j]['name'] = $c->name;
                            $map[$i][$j]['color'] = $c->color;
                        }
                    }
                }
            }
            //dd($map);
            return view('schedules.view', [
                'courses' => $cs,
                'map' => $map
            ]);
        }
        else return redirect('/login');
    }

    public function edit ($success) {
        if(Auth::check()) {
            if($success == 0) {
                return view('schedules.edit', [
                    'success' => false
                ]);
            }
            else {
                return view('schedules.edit', [
                    'success' => true
                ]);
            }
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

    public function deleteHours (Request $request, $c_id) {
        if(Auth::check()) {
            $hours = $request->input('hours');
            if($hours == ",") $hours = null;
            $user = auth()->user();
            $course = Course::findOrFail($c_id);
            if($user->id == $course->user_id) {
                $course->update([
                    'hours' => $hours
                ]);
            }
            else return response('Unauthorized', 401);
        }
        else return response('Unauthorized', 401);
    }

    public function editHours (Request $request, $c_id) {
        if(Auth::check()) {
            $user = auth()->user();
            $course = Course::findOrFail($c_id);
            if($user->id == $course->user_id) {
                $courses = $user->courses()->where('user_id', $user->id)->get();
                $currentSchedule = [];
                foreach($courses as $c) {
                    if($c->id != $course->id && $c->hours != null) {
                        array_push($currentSchedule, $c->hours);
                    }
                }
                $checkSelf = Course::checkCreateSelf($request->input('newValue'), $request->input('hours'));
                $conflictCheck = Course::checkConflicts($request->input('newValue'), $currentSchedule);
                if($checkSelf != "pass") return response('self: error', 400);
                else if($conflictCheck != "pass") return response ('notself: error', 400);
                else {
                    $course->update([
                        'hours' => $request->input('hours').$request->input('newValue')
                    ]);
                    return response('Success', 200);
                }
            }
            else return response('Unauthorized', 401);
        }   
        else return response('Unauthorized', 401);   
    }

    public function createHours (Request $request, $c_id) {
        if(Auth::check()) {
            $hours = $request->input('hours');
            if($hours == ",") $hours = null;
            $user = auth()->user();
            $course = Course::findOrFail($c_id);
            if($user->id == $course->user_id) {
                $courses = $user->courses()->where('user_id', $user->id)->get();
                $currentSchedule = [];
                foreach($courses as $c) {
                    if($c->id != $course->id && $c->hours != null) {
                        array_push($currentSchedule, $c->hours);
                    }
                }
                $checkSelf = Course::checkCreateSelf($request->input('hours'), $course->hours);
                $conflictCheck = Course::checkConflicts($request->input('hours'), $currentSchedule);
                if($checkSelf != "pass") return response('self: error', 400);
                else if($conflictCheck != "pass") return response ('notself: error', 400);
                else {
                    $course->update([
                        'hours' => $course->hours.$request->input('hours')
                    ]);
                    return response('Success', 200);
                }
            }
            else return response('Unauthorized', 401);
        }   
        else return response('Unauthorized', 401); 
    }
}
