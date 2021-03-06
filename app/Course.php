<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function decomposeToArray ($string) {
        $arr = [];
        if($string == null) return $arr;
        for ($i = 0; $i < strlen($string); $i++) {
            $innerArr = [];
            $innerArr['day'] = $string[$i].$string[$i+1];
            $i += 2;
            if($string[$i+1] != '-') {
                $innerArr['start'] = (int) ($string[$i].$string[$i+1]);
                $i += 2;
            }
            else {
                $innerArr['start'] = (int) $string[$i];
                $i++;
            }
            $i++;
            if($string[$i+1] != ',') {
                $innerArr['end'] = (int) ($string[$i].$string[$i+1]);
                $i += 2;
            }
            else {
                $innerArr['end'] = (int) $string[$i];
                $i++;
            }
            array_push($arr, $innerArr);
        }
        return $arr;
    }

    public static function checkCreateSelf ($new, $current) {
        $new = Course::decomposeToArray($new);
        $current = Course::decomposeToArray($current);
        foreach($current as $slot) {
            if($slot['day'] == $new[0]['day']) {
                if($new[0]['start'] > $slot['start'] && $new[0]['start'] < $slot['end']) {
                    return "conflict in start";
                }
                if($new[0]['end'] > $slot['start'] && $new[0]['end'] < $slot['end']) {
                    return "conflict in end";
                }
                if($new[0]['start'] <= $slot['start'] && $new[0]['end'] >= $slot['end']) {
                    return "conflict (containts existent)";
                }
            }
        }
        return "pass";
    }

    public static function checkConflicts($new, $currents) {
        $new = Course::decomposeToArray($new);
        $currentArr = [];
        foreach($currents as $current) {
            array_push($currentArr, Course::decomposeToArray($current));
        }
        foreach($currentArr as $courseHours) {
            foreach($courseHours as $slot) {
                if($slot['day'] == $new[0]['day']) {
                    if($new[0]['start'] > $slot['start'] && $new[0]['start'] < $slot['end']) {
                        return "conflict in start";
                    }
                    if($new[0]['end'] > $slot['start'] && $new[0]['end'] < $slot['end']) {
                        return "conflict in end";
                    }
                    if($new[0]['start'] <= $slot['start'] && $new[0]['end'] >= $slot['end']) {
                        return "conflict (containts existent)";
                    }
                }
            }
        }
        return "pass";
    }

    public static function checkMap($day, $hour, $courseHours) {
        switch($day) {
            case 0:
                $day = 'MO';
            break;
            case 1:
                $day = 'TU';
            break;
            case 2:
                $day = 'WE';
            break;
            case 3:
                $day = 'TH';
            break;
            case 4:
                $day = 'FR';
            break;
            case 5:
                $day = 'SA';
            break;
            case 6:
                $day = 'SU';
            break;
        }
        $courseHours = Course::decomposeToArray($courseHours);
        foreach($courseHours as $hours) {
            if($day == $hours['day']) {
                if($hours['start'] == $hour) return true;
                if($hours['start'] < $hour && $hours['end'] > $hour) return true;
            }
        }
        return false;
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function evaluations() {
        return $this->hasMany(Evaluation::class);
    }
}
