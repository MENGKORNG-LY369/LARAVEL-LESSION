<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'category_id', 'media_id'];

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function media(): BelongsTo {
        return $this->belongsTo(Media::class);
    }

    public static function list() {
        return self::all();
    }

    public static function storeOrUpdate($request, $id = null) {
        
        if ($request->hasFile('image')) {
            
            $media_id = Media::storeOrCreate($request->image);
            $product = ['name' => $request->name, 'category_id' => $request->category_id, 'media_id' => Media::storeOrCreate($request->image)];
            $product = self::updateOrCreate(['id' => $id], $product);
            return $product;
        }
    }
}