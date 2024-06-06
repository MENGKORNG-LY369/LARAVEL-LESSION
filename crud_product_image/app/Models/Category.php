<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name'];

    public static function storeOrUpdate($request, $id = null) {
        $category = $request->only('name');
        $category = self::updateOrCreate(['id' => $id], $category);
        return $category;
    }
}
