<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;

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

        // 카테고리 검색조건 설정
        if (in_array($category, ['javascript', 'php', 'vuejs', 'others'])) {
            $query->where('category', $category);
        } elseif ($category === 'life') {
            $query->whereIn('category', ['food', 'today']);
        }

        $posts = $query->paginate(12);

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
        ['title' => $title, 'content' => $content] = $request->validated();
        $post->title = $title;
        $post->content = $content;

        $post->save();
        
        return redirect()->route('posts.index')->with('success', '게시물이 성공적으로 저장되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(StorePostRequest $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title=$request->input('title');
        $content=$request->input('content');
        
        $post=new Post();
        $post->title = $title;
        $post->content = $content;

        $post->save();
        
        return redirect()->route('posts.index')->with('success', '게시물이 성공적으로 저장되었습니다.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
