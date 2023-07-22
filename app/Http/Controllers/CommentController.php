<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\DeleteCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request, Post $post)
    {
        $validatedData = $request->validated();
        $validatedDataFormatted = array_merge($validatedData, ['password' => Hash::make($validatedData['password'])]); // 패스워드 해시로 변경

        $comment = new Comment();
        $comment->fill($validatedDataFormatted);
        $comment->post()->associate($post); // 연결된 게시물 설정
        $comment->save();

        $message = __('The :resource was created!', ['resource' => __('validation.attributes.comment')]);

        return redirect()->route('posts.show', ["post" => $post->postId])
            ->with(["success-message" => $message]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteCommentRequest $request, Post $post, Comment $comment)
    {
        $inputPassword = $request->validated()['password-delete'];

        $message = ["error-message" => __("The password is incorrect.")];

        if (Hash::check($inputPassword, $comment->password)) {
            $message = ["success-message" => __('The :resource was deleted!', ['resource' => __('validation.attributes.comment')])];
            $comment->delete();
        }

        return redirect()->route('posts.show', ["post" => $post->postId])
            ->with($message);
    }
}
