<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Milestone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $comment = new Comment();
        $comment->comment = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $comment->parent_id = $request->get('parent_id', 0); // Default parent_id to 0 if not provided
        $comment->commentable_id = $request->get('milestone_id');
        $comment->commentable_type = Milestone::class;
        $comment->save();

        return back();
    }


    public function replyStore(Request $request): RedirectResponse
    {
        $reply = new Comment();
        $reply->comment = $request->get('comment_body');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $milestone = Milestone::find($request->get('milestone_id'));
        $milestone->comments()->save($reply);

        return back();

    }
}
