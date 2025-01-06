<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comments($type)
    {
        $comments = Comment::where('type', $type)->get();

        return view('comments.index', compact('comments'));
    }

    public function storeComment($type, $id, Request $request)
    {
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->comment = $request->comment;
        $comment->type = $type;
        $comment->type_id = $id;
        $comment->save();

        return back()->with('success', __('Comment added successfully'));
    }
}
