<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['only' => ['index']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function contact()
    {
        return view('portal.contact');
    }

    public function in_progress()
    {
        return view('portal.in_progress');
    }

    public function info()
    {
        return view('portal.info');
    }

    public function manual()
    {
        return view('portal.manual');
    }

    public function scholarships()
    {
        return view('portal.scholarships');
    }
}
