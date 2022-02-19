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
        return view('comment', ['comments' => $comments]);
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
        // バリデータ取得
        $validated = $request->validated();
        // $validated = $request->safe()->only(['comment']);

        $display_nos = Comment::withTrashed()->get()->count();

        Comment::create([
            'display_no' => $display_nos + 1,
            'user_id' => Auth::user()->id,
            'comment' => $validated['comment'],

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
        // バリデータ取得
        $validated = $request->validated();
        $comment = Comment::find($comment->id);
        //commentの変更がなかった場合、変更せずリダイレクト
        if ($validated['comment'] == $comment->comment) {
            return back();
        }
        //コメントを書き換え
        $comment->update(['comment' => $validated['comment']]);

        return back();
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
        return redirect()->route('index.comment');
    }
}
