<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'name', 'category_id', 'description'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, "category_id", 'id');
    }

    public static function list() {
        return self::all();
    }

    public static function store($request, $id = null) {
        $data = $request->only('id', 'name', 'category_id', 'description');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }

    public static function destroy($id) {
        $cate = self::find($id);
        $cate ? $cate->delete() : null;
        return $cate;
    }
}
