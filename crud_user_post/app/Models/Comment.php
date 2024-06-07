<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['text', 'user_id', 'post_id'];

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
        $comment = $request->only('text', 'user_id', 'post_id');
        $comment = self::updateOrCreate(['id' => $id], $comment);
        return $comment;
    }
}