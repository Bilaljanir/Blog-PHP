<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $holidays = [
            ['date' => '2023-01-01', 'name' => 'Nouvel An'],
            ['date' => '2023-03-19', 'name' => 'Fête des pères'],
            // Autres fêtes...
        ];

        return view('calendar')->with('holidays', $holidays);
    }

}
