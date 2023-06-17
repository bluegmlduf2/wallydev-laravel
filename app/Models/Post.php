<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'postId',
        'writerUid',
        'title',
        'content',
        'postViewCount',
        'createdDate',
        'updatedDate',
        'category',
        'imageUrl',
    ];

    protected $primaryKey = ['postId', 'writerUid'];
    public $incrementing = false;
}
