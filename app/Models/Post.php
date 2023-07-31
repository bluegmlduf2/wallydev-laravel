<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Post extends Model
{

    protected $table = 'posts';

    protected $primaryKey = 'postId';

    public $incrementing = false;

    // 기본 날짜 속성명 변경
    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'updatedDate';


    // 칼럼 기본값 설정
    protected $attributes = [
        'postViewCount' => 0,
    ];

    // 게시글의 댓글가져오기 (1:N)
    public function comments()
    {
        return $this->hasMany(Comment::class, 'postId')->orderBy('createdDate', 'asc');
    }

    // 엘로퀀트 게시글 모델 생성시 UUID등록
    protected static function booted()
    {
        // 게시글의 생성되기전에 호출됨
        static::creating(function ($posts) {
            $posts->postId = Str::uuid()->toString();
        });
    }

    // 취득가능한 사용자 칼럼 추가 (Accessors)
    protected function title(): Attribute
    {
        return Attribute::make(
            get: function () {
                return session('locale') == 'ko' ? $this->attributes['title'] : $this->attributes['title' . ucfirst(session('locale'))];
            },
        );
    }

    // 취득가능한 사용자 칼럼 추가 (Accessors)
    protected function content(): Attribute
    {
        return Attribute::make(
            get: function () {
                return session('locale') == 'ko' ? $this->attributes['content'] : $this->attributes['content' . ucfirst(session('locale'))];
            },
        );
    }

    // 취득가능한 사용자 칼럼 추가 (Accessors)
    protected function contentShort(): Attribute
    {
        return Attribute::make(
            get: function () {
                // HTML태그제거후 HTML엔터티도 제거후,첫 100글자만 저장
                $content = session('locale') == 'ko' ? $this->attributes['content'] : $this->attributes['content' . ucfirst(session('locale'))];
                $content_short = mb_substr(html_entity_decode(strip_tags($content)), 0, 150);
                return $content_short;
            },
        );
    }

    // 취득가능한 사용자 칼럼 추가 (Accessors)
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                // 이미지태그가 글에 존재할 경우, 첫번째 img태그의 url을 저장함
                if (preg_match('/<img [^>]*src="[^"]*"[^>]*>/', $this->attributes['content'], $matches)) {
                    return preg_replace('/.*src="([^"]*)".*/', '$1', $matches[0]);
                }
            },
        );
    }
}
