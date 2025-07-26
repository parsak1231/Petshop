<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $entries = getEntriesData($request, [5, 10, 20, 25, 50], 20);
        $comments = Comment::query()->paginate($entries)->withQueryString();

        return view('admin.comments.index',
            compact('comments', 'entries')
        );
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
