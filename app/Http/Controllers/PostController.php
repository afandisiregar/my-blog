<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $datas = Post::orderBy('created_at','asc')->with(['user','comments'])->get();
        return view('post',compact('datas'));
    }

    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('show',compact('post'));
    }
}
