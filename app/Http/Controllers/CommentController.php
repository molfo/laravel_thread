<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Http\Request;
// use App\Http\Controllers\Auth\Validation\Rules;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(15);
        // $comments = Comment::orderBy('created_at', 'desc')->simplePaginate(10);
        return view('comment', ['comments' => $comments]);
        // return $comments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        // return dd($request);
        // $validated = $request->safe()->only(['comment']);

        // バリデータ取得
        $validator = $request->getValidator();
        // 以後Validatorファサードと同じように使える
        if ($validator->fails()) {
            return redirect('index.comment')
                ->withErrors($validator)
                ->withInput();
        }
        Comment::create([
            'comment' => $validator['comment'],
            'user_id' => Auth::user()->id,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        // if ($comment) {
        //     return response()->json([
        //         'message' => 'Comment deleted successfully',
        //     ], 200);
        // } else {
        //     return response()->json([
        //         'message' => 'Comment not found',
        //     ], 404);
        // }
        return redirect()->route('index.comment');
    }
}
