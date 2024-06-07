<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title', 'description', 'user_id', 'media_id'];

    public static function list() {
        return self::all();
    }

    public function media(): BelongsTo {
        return $this->belongsTo(Media::class);
    }
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    public function likes(): HasMany {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }

    public static function createOrUpdate($request, $id = null) {
        if (!$request->hasFile('image')) return false;

        $post = $request->only('title', 'description', 'user_id', 'image');
        $post = [
            'title' => $request->title, 
            'description' => $request->description, 
            'user_id'  => $request->user_id, 
            'media_id' => Media::createOrUpdate($request->image, $id)
        ];
        $post = self::updateOrCreate(['id' => $id], $post);
        return $post;
    }
}