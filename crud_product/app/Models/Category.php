<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'name', 'description'];

    public static function list() {
        return self::all();
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }

    public static function store($request, $id = null) {
        $category = $request->only('name', 'description');
        $category = self::updateOrCreate(['id' => $id], $category);
        return $category;
    }
}
