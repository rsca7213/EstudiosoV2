<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Carbon\Carbon;

use App\User;
use App\Course;
use App\Evaluation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()) {
            $user = auth()->user();
            $cs = $user->courses()->where('user_id', $user->id)->get();
            $evs = collect();
            foreach($cs as $c) {
                $evsTemp = $c->evaluations()->where('course_id', $c->id)->get();
                foreach($evsTemp as $ev) {
                    $evs->push($ev);
                }
            }
            $evs = $evs->sortBy('date');
            $evsArray = [];
            foreach($evs as $ev) {
                $evArrTemp = [];
                $evArrTemp['course_id'] = $ev->course_id;
                $evArrTemp['name'] = $ev->name;
                $evArrTemp['date'] = $ev->date;
                foreach($cs as $c) {
                    if($ev->course_id == $c->id) {
                        $evArrTemp['course_name'] = $c->name;
                    }
                }
                array_push($evsArray, $evArrTemp);
            }
            $evsArray = Evaluation::filterArrByDate($evsArray);
            return view('home', [
                'evs' => $evsArray
            ]);
        }
        else return redirect("/login");
    }
}
