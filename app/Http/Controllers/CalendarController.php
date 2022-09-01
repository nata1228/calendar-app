<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CalendarController extends Controller
{
    public function index(){
        return Inertia::render('Calendar', [
            "test" => 1
        ]);
    }

    public function show(){
        return view('calendar.calendar');
    }
}
