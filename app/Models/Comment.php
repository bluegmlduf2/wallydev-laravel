<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comment extends Model
{
    protected $table = 'comments';

    protected $primaryKey = 'commentId';

    public $incrementing = false;

    // 기본 날짜 속성명 변경
    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'updatedDate';

    // 대량할당용 (배열) 
    protected $fillable = [
        'comment',
        'name',
        'password',
    ];

    // 엘로퀀트 댓글 모델 생성시 UUID등록
    protected static function booted()
    {
        // 신규댓글 생성되기전에 호출됨
        static::creating(function ($comments) {
            $comments->commentId = Str::uuid()->toString();
        });
    }

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'postId');
    }
}
