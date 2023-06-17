<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all(); // 게시글 리소스 컨트롤러에서 게시글 데이터 조회

        return view('home', compact('posts'));
    }
}
