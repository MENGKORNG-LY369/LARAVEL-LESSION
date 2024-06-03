<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'amount'];

    public static function list() {
        return self::all();
    }

    public static function store($request, $id = null) {
        $orderDetail = $request->only('id', 'amount');
        $orderDetail = self::updateOrCreate(['id' => $id], $orderDetail);
        return $orderDetail;
    }
}
