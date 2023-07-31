<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\DeletePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 페이지타입
        $category = $request->segment(1);

        $query = Post::query();

        if ($category) {
            $query->where('category', $category);
        }

        $posts = $query->orderBy('createdDate', 'desc')->paginate(12);

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();

        $post = new Post();

        $post->title = $validatedData['title'];
        $post->titleJa = translate($validatedData['title'], 'ja');
        $post->titleEn = translate($validatedData['title'], 'en');
        $post->content = $validatedData['content'];
        $post->contentJa = translate($validatedData['content'], 'ja');
        $post->contentEn = translate($validatedData['content'], 'en');
        $post->category = $validatedData['category'];

        $post->save();

        $message = __('The :resource was created!', ['resource' => __('validation.attributes.post')]);

        return redirect()->route('posts.show', ["post" => $post->postId])
            ->with(["success-message" => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->increment('postViewCount');

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $validatedData = $request->validated();

        $post->title = $validatedData['title'];
        $post->titleJa = translate($validatedData['title'], 'ja');
        $post->titleEn = translate($validatedData['title'], 'en');
        $post->content = $validatedData['content'];
        $post->contentJa = translate($validatedData['content'], 'ja');
        $post->contentEn = translate($validatedData['content'], 'en');
        $post->category = $validatedData['category'];

        $post->save();

        $message = __('The :resource was updated!', ['resource' => __('validation.attributes.post')]);

        return redirect()->route('posts.show', ["post" => $post->postId])
            ->with(["success-message" => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\DeletePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeletePostRequest $request, Post $post)
    {
        unset($request);

        $post->comments()->delete();

        $post->delete();

        $message = __('The :resource was deleted!', ['resource' => __('validation.attributes.post')]);

        return redirect()->route('home', ["post" => $post->postId])
            ->with(["success-message" => $message]);
    }
}
