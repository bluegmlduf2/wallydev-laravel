<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all(); // 게시글 리소스 컨트롤러에서 게시글 데이터 조회

        foreach ($posts as $post) {
            $content = $post->content;

            // 이미지태그가 글에 존재할 경우, 첫번째 img태그의 url을 저장함
            if (preg_match('/<img [^>]*src="[^"]*"[^>]*>/', $content, $matches)) {
                $post->imageUrl = preg_replace('/.*src="([^"]*)".*/', '$1', $matches[0]);
            }

            // HTML태그제거후 HTML엔터티도 제거후,첫 100글자만 저장
            $post->content = mb_substr(html_entity_decode(strip_tags($content)), 0, 150);
        }

        return view('home', compact('posts'));
    }
}
