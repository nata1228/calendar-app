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
            "users" => $users
        ]);
    }

    public function show(){
        return view('calendar.calendar');
    }

    public function get(){
        $schedules = Schedule::where('user_id',Auth::id())->get();
        return $schedules;
    }
}    
