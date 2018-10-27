<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Course;

class ParticipantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participant.participantForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $participant = Participant::create($request->all());
        $participant->course->numParticipants = $participant->course->numParticipants+1;
        $participant->course->save();

        return redirect()->action('ParticipantsController@getList', \Auth::user()->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        return view('participant.participantForm', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        $participant->update($request->all());

        return redirect()->action('ParticipantsController@getList', \Auth::user()->id);
    }

    public function  getList($user_id)
    {
    	$course = Course::where('user_id', $user_id)->first();
        $participants = Participant::where('course_id', $course->id)->get();

        return view('participant.participantList', compact('participants'));
    }
}
