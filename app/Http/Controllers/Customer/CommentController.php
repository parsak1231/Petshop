<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $methodsToConvert = ['__invoke'];

    public function __invoke(AddCommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Comment::create($data);

        return redirect()->back()->with('success_comment', 'نظر شما با موفقیت ثبت شد. پس از تایید نظر شما نشان داده خواهد شد');
    }
}
