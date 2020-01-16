<?php

namespace App\Http\Controllers\Back;

use App\Activity;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity=Activity::all();
        return view('backend.activity.list')->withList($activity);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Activity $activity)
    {
        $this->validate($request,array(
            'name' => 'required|max:255',
            'description'=>'required',
        ));
        //store to database
        if($request->hasFile('featuredImage')){
            $file = $request->file('featuredImage');
            $filenameWithExt = $request->file('featuredImage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featuredImage')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $file->move('images',$fileNameToStore);
            $activity->featuredImage=$fileNameToStore;
        } else {
            $activity->featuredImage = '';
        }
        $activity->fill($request->except(['id']));
        $activity->save();
        $request->session()->flash('msg', 'You album has been successfully created');
        return redirect()->route('activity.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity,$id)
    {
        $activity=Activity::find($id);
        return view('backend.activity.create')->withEdit($activity->find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity,$id)
    {
        $this->validate($request,array(
            'name' => 'required',
            'description'=>'required',
        ));
        $activity=Activity::find($id);
        // $album->title=$request->input('album_name');
        // $album->body=$request->input('album_description');
        if($request->hasFile('featuredImage')){
            $file = $request->file('featuredImage');
            $filenameWithExt = $request->file('featuredImage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('featuredImage')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $file->move('images',$fileNameToStore);
            $activity->featuredImage=$fileNameToStore;
        } else {
            $activity->featuredImage = '';
        }
        $activity->fill($request->except(['id']));
        $activity->save();
        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity,$id)
    {
        $activity=Activity::find($id);
        $activity->delete();
        session()->flash('success','The album was deleted successfully');
        return redirect()->route('activity.index');
    }
}
