<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\Validation\Rules;

class ApiCommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // return dd($request);
        // バリデータ取得
        // $validated = $request->validated();
        // $validated = $request->safe()->only(['comment']);
        $validated = $request->validate([
            'api-comment' => 'required',
        ]);

        $display_nos = Comment::withTrashed()->get()->count();

        $comment = Comment::create([
            'display_no' => $display_nos + 1,
            'user_id' => Auth::user()->id,
            'comment' => $validated['api-comment'],
        ]);

        return response()->json([
            'code'     => 200,
            'comment' => $comment
        ], 200);

        // if ($comment) {
        //     return response()->json([
        //         'message' => 'Comment deleted successfully',
        //     ], 200);
        // } else {
        //     return response()->json([
        //         'message' => 'Comment not found',
        //     ], 404);
        // }
    }
}
