<?php

namespace App\Http\Controllers;

// use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class CalendarModalController extends Controller
{
    public function create(Request $request){
        \Log::debug($request);
        Schedule::create([
            'schedule_name' => $request->schedule_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'button_color' => $request->button_color,
            'user_id' => Auth::id(),
        ]);
    }
}
