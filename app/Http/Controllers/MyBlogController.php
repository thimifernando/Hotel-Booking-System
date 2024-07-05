<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyBlogController extends Controller
{
    public function index(Request $request)
    {
        //  dd($request->blog())

        

        $blog = Blog::where('user_id',auth()->user()->id)->get();

        // dd($blog);
       
        return view('myblog.index', compact('blog'));


        
    }

    
    public function create()
    {
        return view('myblog.add');
    }

    public function store(StoreBlogRequest $request)
    {
        if (!$request->hasFile('img')) {
            return redirect()->back()->with('notify_message', ['status' => 'error', 'msg' => 'No image uploaded.']);
        }
    
        if (!$request->file('img')->isValid()) {
            return redirect()->back()->with('notify_message', ['status' => 'error', 'msg' => 'Invalid image file.']);
        }
    
        $file = $request->file('img');
        $file_name = $file->hashName();
        $file->store('public/blogs');
    
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('notify_message', ['status' => 'error', 'msg' => 'User not authenticated.']);
        }
    
        $blog = new Blog();
        $blog->user_id = $user->id;
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->mobile = $request->mobile;
        $blog->status = "0";
        $blog->img = 'blogs/'.$file_name;
       
        $blog->save();
    
        return redirect()->route('myblog.index')->with('notify_message', ['status' => 'success', 'msg' => 'Blog uploaded successfully!']);
    }
    

    public function show(Request $request)
    {  
        //  dd($request->all());
        $blog = Blog::findOrFail($request->id);
        return view('myblog.view', compact('blog'));
    }
    public function edit(Request $request)
    {
        $blog = Blog::where('id',$request->id)->firstOrfail();
        return view('myblog.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request)
    {
        $blog = Blog::find($request->blog);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->img = $request->img;
        $blog->mobile = $request->mobile;
        

        $blog->save();

        return redirect()->route('myblog.index')->with('notify_message', ['status' => 'success', 'msg' => 'Blog Edit successfully!']);

    }

    public function destroy(Request $request)
    {
        

        $blog = Blog::findOrfail($request->id);
       $blog->delete();

       return redirect()->route('myblog.index')->with('notify_message', ['status' => 'success', 'msg' => 'Blog Delete successfully!']);
   }
}
