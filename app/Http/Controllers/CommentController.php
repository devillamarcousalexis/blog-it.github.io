<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $tbl_comment = Comment::get();
        return redirect()->back()->with('message', "A new comment has been posted!");
    }

    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|string',
            'comment_content' => 'required|string'
        ]);

        $tbl_comment = new Comment;
        $tbl_comment->user_id = Auth::id();
        $tbl_comment->blog_id = $request->blog_id;
        $tbl_comment->comment_content = $request->comment_content;
        $tbl_comment->user_image = Auth::user()->user_image;
        $tbl_comment->save();
        return redirect()->back()->with('message', "A new comment has been posted!");
    }
}
