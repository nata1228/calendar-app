<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

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
