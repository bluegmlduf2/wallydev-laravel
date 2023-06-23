<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'postId',
        'writerUid',
        'title',
        'postViewCount',
        'createdDate',
        'updatedDate',
        'category',
    ];

    protected $primaryKey = ['postId', 'writerUid'];
    public $incrementing = false;

    protected function content(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                // HTML태그제거후 HTML엔터티도 제거후,첫 100글자만 저장
                return mb_substr(html_entity_decode(strip_tags($value)), 0, 150);
            },
        );
    }

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
