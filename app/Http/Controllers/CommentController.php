<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Events\Comment\CommentCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'videoId' => 'required'
        ]);

        $comments = Comment::where('video_id', $data['videoId'])
            ->orderBy('id', 'desc')
            ->get();
        return response($comments, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|min:3',
            'videoId' => 'required',
        ]);

        $comment = Comment::create([
            'body' => $data['body'],
            'user_id' => Auth::user()->id,
            'video_id' => $data['videoId']
        ]);

        event(new CommentCreated($comment));

        return response($comment, 200);
    }
}
