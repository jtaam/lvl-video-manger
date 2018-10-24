<?php

namespace App\Http\Controllers;

use App\Comment;
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

        return response($comment, 200);
    }
}
