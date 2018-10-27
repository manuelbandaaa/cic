<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Course;
use App\AttendanceList;
use App\Attendance;
use App\User;

class AttendanceController extends Controller
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
    	$course = Course::where('user_id', \Auth::user()->id)->first();
    	$participants = Participant::where('course_id', $course->id)->get();

        return view('attendance.attendanceForm', compact('participants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create validation for day
        $course = Course::where('user_id', \Auth::user()->id)->first();
    	$participants = Participant::where('course_id', $course->id)->get();
    	$attendanceList = AttendanceList::create([
    		'date' => $request->date,
    		'course_id' => $course->id
    	]);

    	foreach($participants as $participant){
			Attendance::create([
				'participant_id' => $participant->id,
				'attendance_list_id' => $attendanceList->id,
				'attendance' => $request->has($participant->id)? 1 : 0
			]);
    	}

        $course->average = Attendance::where('attendance', 1)
        ->whereHas('attendance_list', function($query) use($course){
            $query->where('course_id', $course->id);
        })->count() / $course->attendace_lists()->count();
        $course->save();

        return redirect()->action('AttendanceController@getList', \Auth::user()->id);
    }

    /**
     * Muestra la información de un user especificado.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participants = Participant::whereHas('attendances', function($query) use($id){
        	$query->where('attendance_list_id', $id);
        	$query->where('attendance', 1);
        })->get();

        return view('attendance.show')->with([
        	'participants' => $participants,
        	'day' => AttendanceList::find($id)->date
        ]);
    }

    public function  getList($user_id)
    {
    	$course = Course::where('user_id', $user_id)->first();
        $attendance = AttendanceList::where('course_id', $course->id)->get();

        return view('attendance.attendanceList')->with([
            'attendance' => $attendance,
            'user' => User::find($user_id)
        ]);
    }

    public function destroy($id)
    {
    	$attendance = Attendance::where('attendance_list_id', $id)->get();
    	foreach($attendance as $participant){
    		$participant->delete();
    	}
        AttendanceList::destroy($id);

        $course = \Auth::user()->course->first();
        if($course->attendance_list()->count() == 0){
            $course->average = 0;
        } else {
            $course->average = Attendance::where('attendance', 1)
                ->whereHas('attendance_list', function($query) use($course){
                    $query->where('course_id', $course->id);
                })->count() / $course->attendace_lists()->count();
        }
        $course->save();
 
        return redirect()->action('AttendanceController@getList', \Auth::user()->id);
    }
}
