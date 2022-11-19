<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
}    
