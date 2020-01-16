<?php

namespace App\Http\Controllers\Back;

use App\Event;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $event=Event::all();
        return view('backend.events.list')->withList( $event);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Event $event)
    {
        $this->validate($request,array(
            'title' => 'required|max:255',
            'body'=>'required',
        ));
        //store to database
        // if($request->hasFile('featuredImage')){
        //     $file = $request->file('featuredImage');
        //     $filenameWithExt = $request->file('featuredImage')->getClientOriginalName();
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     $extension = $request->file('featuredImage')->getClientOriginalExtension();
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     $file->move('blog-featured-image',$fileNameToStore);
        //     $blog->featuredImage=$fileNameToStore;
        // } else {
        //     // return $request;
        //     $blog->featuredImage = '';
        // }
        $event->fill($request->except(['id']));
        $event->save();
        $request->session()->flash('msg', 'You event has been successfully posted');
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event=Event::find($id);
        return view('backend.events.create')->withEdit($event->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,array(
            'title' => 'required',
            'body'=>'required',
        ));
        $event = Event::find($id);
        $event->title=$request->input('title');
        $event->body=$request->input('body');
        // $blog->content=$request->input('content');
        // $blogCategory->fill($r->except(['id','created_at']));
        $event->save();
        return redirect()->route('events.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        $event->delete();
        session()->flash('success','The post was deleted successfully');
        return redirect()->route('events.index');
    }
}
