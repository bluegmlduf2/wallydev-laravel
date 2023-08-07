<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\DeletePostRequest;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->makeIndexMetaTags();

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
        $post->content = $validatedData['content'];
        $post->category = $validatedData['category'];
        $post->titleJa = translate($validatedData['title'], 'ja');
        $post->titleEn = translate($validatedData['title'], 'en');
        $post->contentJa = translate($validatedData['content'], 'ja');
        $post->contentEn = translate($validatedData['content'], 'en');

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
        $this->makePostMetaTags($post);

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
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validatedData = $request->validated();

        $locale = session('locale');
        $translateActive = $validatedData['translate-active'];
        $titleField = $locale == 'ko' ? 'title' : 'title' . ucfirst($locale);
        $contentField = $locale == 'ko' ? 'content' : 'content' . ucfirst($locale);

        // 작성자의 세션 언어에 따른 제목과 내용을 저장한다
        $post->$titleField = $translateActive ? translate($validatedData['title'], $locale) : $validatedData['title'];
        $post->$contentField = $translateActive ? translate($validatedData['content'], $locale) : $validatedData['content'];

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

    /**
     * MakeIndexMetaTags
     */
    private function makeIndexMetaTags()
    {
        $title = config('app.name');
        $description = 'Wally의 후쿠오카 생활과 개발이야기를 담고 있습니다';
        $url = config('app.url');
        $imageUrl = asset('storage/android-chrome-192x192.png');

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical($url);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type', 'website');

        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::addImage($imageUrl);
    }

    /**
     * MakePostMetaTags
     *
     * @param  \App\Models\Post  $post
     */
    private function makePostMetaTags(Post $post)
    {
        $title = $post->title;
        $content = $post->contentShort;
        $category = $post->category;
        $imageUrl = $post->imageUrl;
        $locales = ['ja' => 'ja_jp', 'en' => 'en_us', 'ko' => 'ko_kr'];
        $locale = $locales[session('locale')] ?? 'ko_kr';

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($content);
        SEOMeta::addMeta('article:published_time', $post->createdDate->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $category, 'property');
        SEOMeta::addKeyword([$category, 'key2', 'key3']); //TODO

        OpenGraph::setDescription($content);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl(route('posts.show', ["post" => $post->postId]));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', $locale);
        OpenGraph::addProperty('locale:alternate', array_values($locales));
        OpenGraph::addImage($imageUrl, ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($title);
        JsonLd::setDescription($content);
        JsonLd::setType('Article');
        JsonLd::addImage($imageUrl);
    }
}
