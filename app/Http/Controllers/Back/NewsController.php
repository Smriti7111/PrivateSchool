<?php

namespace App\Http\Controllers\Back;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::all();
        return view('backend.news.list')->withList($news);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,News $news)
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
        $news->fill($request->except(['id']));
        $news->save();
        $request->session()->flash('msg', 'You event has been successfully posted');
        return redirect()->route('news.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news=News::find($id);
        return view('backend.news.create')->withEdit($news->find($id));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,array(
            'title' => 'required',
            'body'=>'required',
        ));
        $news = News::find($id);
        $news->title=$request->input('title');
        $news->body=$request->input('body');
        // $blog->content=$request->input('content');
        // $blogCategory->fill($r->except(['id','created_at']));
        $news->save();
        return redirect()->route('news.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=News::find($id);
        $news->delete();
        session()->flash('success','The post was deleted successfully');
        return redirect()->route('news.index');
        //
    }
}
