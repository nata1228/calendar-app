<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Schedule;

class CalendarController extends Controller
{
    public function index(){
        $users = User::all();
        return Inertia::render('Calendar', [
            "test" => 1,
            "users" => $users,
        ]);
    }

    public function create(Request $request){
        Schedule::create([
            'schedule_name' => $request->schedule_name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'button_color' => $request->button_color,
            'user_id' => Auth::id(),
        ]);
        return $this->get_schedules();
    }

    public function show(){
        return view('calendar.calendar');
    }

    public function get_schedules(){
        return Schedule::where('user_id',Auth::id())->get();
    }
}    
