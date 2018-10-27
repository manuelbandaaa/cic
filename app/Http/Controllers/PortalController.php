<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Image;

class PortalController extends Controller
{
    public function inicio()
    {
    	$events = Event::all()->sortByDesc('created_at');;

        return view('portal.inicio', compact('events'));
    }
}
