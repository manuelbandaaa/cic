<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Session;
use App\Planning;
use App\User;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getList', 'public_view']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $courses->load(['user']);

        return view('course.coursesIndex', compact('courses'));
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
        $planning = Planning::find($request->planning_id);
        $student = User::find($planning->user_id);

        Course::create([
            'name' => $planning->course_name,
            'description' => $planning->solution ? $planning->solution : "Sin descripción",
            'user_id' => $planning->user_id,
            'day' => 'No especificado',
            'time' => 'No especificado',
            'place' => 'No especificado',
            'numParticipants' => 0,
            'planning_id' => $planning->id,
            'img' => asset('img/logo.jpg')
        ]);

        $student->position_id = 3;
        $student->save();

        return redirect()->action('CandidatesController@list', $this->getDegree($student->degree))->with(['message' => 'Taller aprobado con exito.', 'alert-class' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        $course->load(['user']);

        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        return view('course.courseForm', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $course->name = $request->name;
        $course->day = $request->day;
        $course->time = $request->time;
        $course->place = $request->place;
        $course->save();

        return view('course.show', compact('course'));
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

    public function getList()
    {
        $courses = Course::where('status', 1)->get();

        return view('course.coursesList', compact('courses'));
    }

    public function getDegree($type)
    {
        switch ($type) {
            case 'Primaria':
                return "elementary-school";
            
            case 'Secundaria':
                return "secondary-school";

            case 'Preparatoria':
                return "high-school";

            case 'Universidad':
                return "university";
        }
    }

    public function editInfo(Request $request, $id)
    {
        $course = Course::find($id);

        return view('course.data-form', compact('course'));
    }

    public function updateInfo(Request $request, $id)
    {
        $course = Course::find($id);
        if($request->has('img')){
            if($course->img != asset('img/logo.jpg')){
                \Cloudder::delete($course->public_id, []);
            }
            \Cloudder::upload($request->img);
            $course->img = \Cloudder::getResult()['url'];
            $course->public_id = \Cloudder::getResult()['public_id'];
        }

        $course->description = $request->description;
        $course->save();

        return view('course.show', compact('course'));
    }

    public function public_view($id)
    {
        $course = Course::find($id);
        $session = Session::where('date', '>=', \Carbon\Carbon::now()->startOfDay())
        ->where('planning_id', $course->planning->id)->first();
        ($session) ? $nextSession = $session->date : $nextSession = null;
        $sessions = Session::where('planning_id', $course->planning->id)->get()->sortBy('date');

        return view('course.publicShow', compact('course', 'nextSession', 'sessions'));
    }

    public function remove_course($id, $value)
    {
        $course = Course::find($id);
        $course->status = $value;
        $course->save();
        $course->load(['user']);

        return redirect()->route('courses.show', $id);
    }
}
