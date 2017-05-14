<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Location;
use App\Tag;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event.eventlist', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()) {
            return redirect('/events');
        }
        if(count(Location::all()) === 0) {
            return redirect('/events');
        }
        $data = array();
        $locations = Location::all();
        $locations->first()->checked = true;
        $data['locations'] = $locations;
        $data['tags'] = Tag::all();
        return view('event.eventedit', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            $event = new Event;
            if(isset($request->name)) {
                $event->name = $request->name;
            } else {
                $event->name = "-";
            }

            if(isset($request->description)) {
                $event->description = $request->description;
            } else {
                $event->description = "-";
            }

            if(isset($request->date)) {
                $event->date = $request->date;
            } else {
                $event->date = "2017-06-08 20:00:00";
            }
            $event->location_id = $request->location;
            $event->save();

            $event->tags()->detach();
            $event->tags()->attach($request->tags);
            $event->save();
        }
        return redirect('/events');
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
        return view('event.eventshow', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Auth::check()) {
            return redirect('/events');
        }
        $data = array();
        $event = Event::find($id);

        $alltags = Tag::all();
        foreach($alltags as $tag) {
            foreach($event->tags as $etag)
            if($tag->id == $etag->id) {
                $tag->checked = true;
            }
        }

        $data['event'] = $event;
        $data['event']['tags'] = $event->tags;
        $data['locations'] = Location::all();
        $data['tags'] = $alltags;
        return view('event.eventedit', ['data' => $data]);
        //return $data['event']['tags'];
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
        if(Auth::check()) {
            $event = Event::find($id);

            if(isset($request->name)) {
                $event->name = $request->name;
            } else {
                $event->name = "-";
            }

            if(isset($request->description)) {
                $event->description = $request->description;
            } else {
                $event->description = "-";
            }

            if(isset($request->date)) {
                $event->date = $request->date;
            } else {
                $event->date = "2017-06-08 20:00:00";
            }

            $event->location_id = $request->location;
            $event->tags()->detach();
            $event->tags()->attach($request->tags);
            $event->save();
        }

        return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()) {
            Event::destroy($id);
        }
        return redirect('/events');
    }
}
