<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Error;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $blogs = Blog::all();
       return view('content',['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogForm()
    {
        return view('blogForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $request->validate(['name' => ['required','unique:users'],
                            'content' => ['required']]);
        $inputs = $request->all();
        unset($inputs['_token']);
        $response = Blog::create($inputs);
        if($response){
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($blog)
    {   
        try{
            $id = Crypt::decrypt($blog);

            $blog = Blog::findOrFail($id);
            
            return view('edit',compact('blog'));

        }catch(Exception $e){
            return $e;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog)
    {
        $request->validate(['name' => 'required|unique:users',
                            'content' => 'required']);
        if($blog)
        {
            $id = Crypt::decrypt($blog);
            try{
                $blog = Blog::findOrFail($id);
                $blog->name = $request->name;
                $blog->content = $request->content;
                $blog->save();
            }catch(Exception $e){
                return $e;
            }
            return redirect()->route('home');
        }
        else
        {
            return back()->withErrors('Record not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog)
    {
        try{
            $id = Crypt::decrypt($blog);
            Blog::findOrFail($id)->delete();
            return true;

        }catch(Exception $e){
            return $e;
        }
    }
}
