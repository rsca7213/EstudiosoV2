<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Evaluation extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function getDayOfWeek($date) {
        $weekMap = [
            0 => 'Domingo',
            1 => 'Lunes',
            2 => 'Martes',
            3 => 'Miercoles',
            4 => 'Jueves',
            5 => 'Viernes',
            6 => 'Sabado',
        ];
        $date = Carbon::parse($date);
        $day = $date->dayOfWeek;
        return $weekMap[$day];
    }

    public static function filterArrByDate ($arr) {
        $now = now()->format('Y-m-d');
        $newArr = [];
        $cont = 0;
        foreach($arr as $item) {
            $date = Carbon::parse($item['date']);
            $diff = $date->diffInDays($now, false) * -1;
            if($diff >= 0 && $cont<10) {
                $item['days'] = $diff;
                array_push($newArr, $item);
                $cont++;
            }
        }
        return $newArr;
    }

    public static function generateCalendarDays ($page) {
        $arrDays = [];  
        for ($i = 0; $i <= 9; $i++) {
            $day = [];
            $dayToAdd = Carbon::now()->addDays($page*10);
            $day['date'] = $dayToAdd->addDays($i)->format('Y-m-d');
            $day['dayOfWeek'] = Evaluation::getDayOfWeek($day['date']);
            array_push($arrDays, $day);
        }
        return $arrDays;
    }

    public function course () {
        return $this->belongsTo(Course::class);
    }
}
