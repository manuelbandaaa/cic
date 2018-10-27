<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Planning;
use App\Observation;
use App\User;

class PlanningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    public function create()
    {
        //
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
            'course_name' => 'required|max:255',
        ]);

        $planning = Planning::create($request->all());

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
        $planning = Planning::where('user_id', $id)->with(['sessions'])->first();

        if($planning == null) {
            return view('planning.planningForm')->with(['id' => \Auth::user()->id]);
        }

        if(\Auth::user()->position_id <= 2 || \Auth::user()->id == $planning->user_id) {
            if($planning!=null && \Auth::user()->position_id==4 && !$planning->finished){
                $obs = Observation::where('type', 'planning')->where('type_id', $planning->id)->first();
                return view('planning.candidatePlanning', compact('planning', 'obs'));
            }else if($planning!=null && $planning->finished){
                return view('planning.show', compact('planning'));
            }
        } else {
            return view('home');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $planning = Planning::where('user_id', $id)->with(['sessions'])->first();

        if(\Auth::user()->id == $planning->user_id) {
            if(!$planning->finished){
                return view('planning.planningForm', compact('planning', 'id'));
            } else {
                return redirect()->route('planning.show', $planning->id);
            }
        } else {
            return view('home');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Planning $planning)
    {
        $planning->update($request->all());

        if(\Auth::user()->position_id == 4){
            return view('planning.candidatePlanning', compact('planning'));
        } else{
            return redirect()->route('planning.show', $planning->id);
        }
        

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

    public function sendPlanning($id, $value, Request $request)
    {
        $planning = Planning::find($id);
        $obs = Observation::where('type', 'planning')->where('type_id', $planning->id)->first();
        $user = User::find($planning->user_id);

        $planning->finished = $value;
        $planning->save();

        if($obs!=null){
            $obs->delete();
        }

        if(isset($request->obs)){
            Observation::create([
                'obs' => $request->obs,
                'type' => 'Planning',
                'type_id' => $planning->id
            ]);
        }

        if(\Auth::user()->position_id == 4) {
            return redirect()->route('home')->with('message', 'Se ha enviado tu propuesta a revisión');
        } else {
            return redirect()->action('CandidatesController@list', $this->getDegree($user->degree));
        }
        
    }

    public function getDegree($type)
    {
        switch ($type) {
            case 'Primaria':
                return "elementary-school";
            
            case 'Secundaria':
                return "secondary-school";

            case 'Prepartoria':
                return "high-school";

            case 'Universidad':
                return "university";
        }
    }
}
