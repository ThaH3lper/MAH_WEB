<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Location;
use App\Event;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();
        return view('location.locationlist', ['locations' => $locations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()) {
            return redirect('/locations');
        }
        return view('location.locationedit');
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
            $location = new Location;

            if(isset($request->name)) {
                $location->name = $request->name;
            } else {
                $location->name = "-";
            }

            if(isset($request->description)) {
                $location->description = $request->description;
            } else {
                $location->description = "-";
            }

            $location->lat = 0.0;
            $location->long = 0.0;
            $location->save();
        }
        return redirect('/locations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);
        return view('location.locationshow', ['location' => $location]);
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
            return redirect('/locations');
        }
        $location = Location::find($id);
        return view('location.locationedit', ['location' => $location]);
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
            $location = Location::find($id);
            
            if(isset($request->name)) {
                $location->name = $request->name;
            } else {
                $location->name = "-";
            }

            if(isset($request->description)) {
                $location->description = $request->description;
            } else {
                $location->description = "-";
            }

            $location->lat = 0.0;
            $location->long = 0.0;
            $location->save();
        }

        return redirect('/locations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        foreach(Location::find($id)->events as $event) {
            Event::destroy($event->id);
        }
        if(Auth::check()) {
            Location::destroy($id);
        }
        return redirect('/locations');
    }
}
