<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Image;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        $this->middleware('admin', ['except' => ['show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all()->sortBy('created_at');

        return view('event.eventsIndex', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.eventForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Cloudder::upload($request->img);

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => \Cloudder::getResult()['url'],
            'public_id' => \Cloudder::getResult()['public_id']
        ]);

        if(isset($request->images)){
            foreach($request->images as $image){
                \Cloudder::upload($image);
                Image::create([
                    'model_type' => 'Event',
                    'model_id' => $event->id,
                    'url' => \Cloudder::getResult()['url'],
                    'public_id' => \Cloudder::getResult()['public_id']
                ]);
            }
        }

        return redirect()->action('EventsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $event->load(['images']);

        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('event.eventForm', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        \Cloudder::upload($request->img);

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'img' => \Cloudder::getResult()['url'],
            'public_id' => \Cloudder::getResult()['public_id']
        ]);

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->load(['images']);
        foreach($event->images as $image){
            \Cloudder::delete($image->public_id, []);
        }
        \Cloudder::delete($event->public_id, []);
        $event->delete();

        return redirect()->action('EventsController@index');
    }
}
