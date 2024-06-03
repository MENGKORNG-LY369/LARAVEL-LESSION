<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromotionProduct extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['title', 'discount'];

    public static function store($request, $id = null) {
        $data = $request->only('id', 'title', 'discount');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
}
