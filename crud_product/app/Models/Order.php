<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'amount'];
    public function products(): BelongsToMany {
        return $this->belongsToMany(self::class, "order_details");
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function list() {
        return self::all();
    }

    public static function store($request, $id = null) {
        $order = $request->only('id', 'user_id', 'amount');
        $order = self::updateOrCreate(['id' => $id], $order);
        $order->products()->sync($request->products);
        return $order;
    }
}