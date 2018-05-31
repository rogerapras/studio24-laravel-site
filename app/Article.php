<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'preview_text',
        'body',
        'activity',
        'meta_keywords',
        'meta_description',
        'user_id',
        'preview_img',
    ];

    public function scopeActive($query)
    {
        return $query->where('activity', 1);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function addComment($body)
    {
        $this->comments()->create($body);
    }
}
