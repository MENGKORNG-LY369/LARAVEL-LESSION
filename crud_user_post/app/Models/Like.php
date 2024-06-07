<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'post_id', 'like_count'];

    public static function list() {
        return self::all();
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

    public static function createOrUpdate($request, $id = null) {
        $like = $request->only('user_id', 'post_id', 'like_count');
        $like = self::updateOrCreate(['id' => $id], $like);
        return $like;
    }
}