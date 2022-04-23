<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        $user = Auth::guard('admin')->user();
        $comments = Comment::with('food')->where('comment_parent_id', '=', 0)->orderBy('status', 'DESC')->paginate(10);
        $cmt_reps = Comment::with('food')->where('comment_parent_id','>',0)->get();
        return view('admin.comments.index', compact('comments', 'user', 'cmt_reps'));
    }

    public function allow_comment(Request $request)
    {
        $data = $request->all();
        $comment = Comment::find($data['id']);
        $comment->status = $data['status'];
        $comment->save();
    }

    public function reply_comment(Request $request)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->name = "ChauAdmin";
        $comment->content = $data['comment'];
        $comment->food_id = $data['food_id'];
        $comment->comment_parent_id = $data['comment_id'];
        $comment->date = now();
        $comment->status = 1;
        $comment->save();

    }
}
