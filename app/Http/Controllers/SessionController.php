<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Planning;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getList']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $planning = Planning::where('id', $id)->with(['sessions'])->first();

        return view('session.sessionForm')->with(['planning_id' => $planning->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'date' => 'date'
        ],
        [
            'required' => 'El campo :attribute es obligatorio.',
            'integer' => 'El campo :attribute debe ser entero.',
            'unique' => 'El campo :attribute ya existe, escribe otro.',
            'regex' => 'El campo :attribute es invalido.',
            'date' => 'Introduce una fecha con el formato AAAA-MM-DD'
        ]);

        Session::create($request->all());
        $planning = Planning::find($request->planning_id);

        return redirect()->route('planning.show', $planning->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        return view('session.sessionForm', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $session->update($request->all());
        $planning = Planning::find($session->planning_id);

        return redirect()->route('planning.show', $planning->user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
