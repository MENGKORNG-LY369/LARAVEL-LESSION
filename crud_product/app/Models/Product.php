<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'name', 'price', 'quantity', 'category_id'];

    public function categories(): BelongsTo {
        return $this->belongsTo(Product::class, 'category_id', 'id');
    }

    public static function list() {
        return self::all();
    }

    public static function store($request, $id = null) {
        $product = $request->only('id', 'name', 'price', 'quantity', 'category_id');
        $product = self::updateOrCreate(['id' => $id], $product);
        return $product;
    }
}
