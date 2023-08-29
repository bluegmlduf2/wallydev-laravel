<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\DeleteCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentMail;

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

        // 관리자에게 댓글내용 보내기
        Mail::to($request->user())->locale(session('locale'))->send(new CommentMail($comment, $post));

        $message = __('The :resource was created!', ['resource' => __('validation.attributes.comment')]);

        return redirect()->route('posts.show', ["post" => $post->postId])
            ->with(["success-message" => $message]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Post  $post
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Post $post, Comment $comment)
    {
        $validatedData = $request->validated();
        $inputPassword = $validatedData['password-update'];
        $inputComment = $validatedData['comment-update'];

        $message = ["error-message" => __("The password is incorrect.")];

        if (Hash::check($inputPassword, $comment->password)) {
            $message = ["success-message" => __('The :resource was updated!', ['resource' => __('validation.attributes.comment')])];
            $comment->comment = $inputComment;
            $comment->save();
        }

        return redirect()->route('posts.show', ["post" => $post->postId])
            ->with($message);
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
        $validatedData = $request->validated();
        $inputPassword = $validatedData['password-delete'];

        $message = ["error-message" => __("The password is incorrect.")];

        if (Hash::check($inputPassword, $comment->password)) {
            $message = ["success-message" => __('The :resource was deleted!', ['resource' => __('validation.attributes.comment')])];
            $comment->delete();
        }

        return redirect()->route('posts.show', ["post" => $post->postId])
            ->with($message);
    }
}
