<?php

namespace App\Http\Controllers;

// use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use App\Models\Schedule;

class CalendarModalController extends Controller
{
    public function create(Request $request){
        Schedule::create([
            'schedule_name' => $request->schedule_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'time' => $request->time,
        ]);
    }
}