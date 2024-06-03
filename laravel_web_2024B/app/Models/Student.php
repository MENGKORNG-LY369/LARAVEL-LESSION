<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'age', 'province', 'score', 'phone', 'status'];

    public function getStatusAttribute() {
        return $this->score < 50 ? 'Failed' : 'Passed';
    }
    public static function list()
    {
        return self::all();
    }

    public static function store($request,$id=null)
    {
        $data = $request->only('name', 'age', 'province', 'score', 'phone');
        $data = self::updateOrCreate(['id'=>$id],$data);
        return $data;
    }
}