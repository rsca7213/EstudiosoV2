<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use App\User;
use App\Course;
use App\Evaluation;

class CalendarController extends Controller
{
    public function index ($page) {
        if(Auth::check()) {
            $mergedArr = [];
            $arrDays = Evaluation::generateCalendarDays($page);
            $user = auth()->user();
            $cs = $user->courses()->where('user_id', $user->id)->get();
            foreach($arrDays as $day) {
                $mergeTemp = [];
                $evsTemp = [];
                foreach($cs as $c) {
                    $evs = $c->evaluations()->where('course_id', $c->id)->get();
                    foreach($evs as $ev) {
                        if($ev->date == $day['date']) {
                            $evTemp = [];
                            $evTemp['name'] = $ev->name;
                            $evTemp['c_name'] = $c->name;
                            $evTemp['c_id'] = $c->id;
                            array_push($evsTemp, $evTemp);
                        }
                    }
                } 
                $mergeTemp['date'] = $day['date'];
                $mergeTemp['dayOfWeek'] = $day['dayOfWeek'];
                $mergeTemp['evs'] = $evsTemp;
                array_push($mergedArr, $mergeTemp);
            }
            //dd($mergedArr);
            return view('calendar.view', [
                'days' => $mergedArr,
                'page' => $page
            ]);
        }
        else return redirect('/login');
    }
}
