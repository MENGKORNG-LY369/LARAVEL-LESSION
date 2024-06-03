<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'name', 'description'];

    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }
    public static function list()
    {
        return self::all();
    }

    public static function store($request, $id = null)
    {
        $data = $request->only('id', 'name', 'description');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }

    public static function destroy($id)
    {
        $cate = self::find($id);
        $cate ? $cate->delete() : null;
        return $cate;
    }
}
