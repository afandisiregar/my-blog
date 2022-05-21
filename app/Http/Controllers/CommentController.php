<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function create(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        Comment::create([
            'post_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success','Comment successfully!');
    }
}
