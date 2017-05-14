<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tag;

class TagController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tag.taglist', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::check()) {
            return redirect('/tags');
        }
        return view('tag.tagedit');
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
            $tag = new Tag;
            if(isset($request->name)) {
                $tag->name = $request->name;
            } else {
                $tag->name = "-";
            }

            if(isset($request->description)) {
                $tag->description = $request->description;
            } else {
                $tag->description = "-";
            }

            if(isset($request->icon)) {
                $tag->icon = $request->icon;
            } else {
                $tag->icon = "https://image.flaticon.com/icons/svg/189/189665.svg";
            }
            $tag->save();
        }
        return redirect('/tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tag.tagshow', ['tag' => $tag]);
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
            return redirect('/tags');
        }
        $tag = Tag::find($id);
        return view('tag.tagedit', ['tag' => $tag]);
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
            $tag = Tag::find($id);

            if(isset($request->name)) {
                $tag->name = $request->name;
            } else {
                $tag->name = "-";
            }

            if(isset($request->description)) {
                $tag->description = $request->description;
            } else {
                $tag->description = "-";
            }

            if(isset($request->icon)) {
                $tag->icon = $request->icon;
            } else {
                $tag->icon = "https://image.flaticon.com/icons/svg/189/189665.svg";
            }
            $tag->save();
        }

        return redirect('/tags');
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
            Tag::destroy($id);
        }
        return redirect('/tags');
    }
}
