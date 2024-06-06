<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =['file_path'];

    public function product(): HasOne {
        return $this->hasOne(Product::class);
    }

    public static function storeOrCreate($media, $id = null) {
        $mediaObj = new Media();

        $filename = $media->getClientOriginalName(); // get the file name
        $getfilenamewitoutext = pathinfo($filename, PATHINFO_FILENAME); // get the file name without extension
        $getfileExtension = $media->getClientOriginalExtension(); // get the file extension
        $createnewFileName = time().'_'.str_replace(' ','_', $getfilenamewitoutext).'.'.$getfileExtension; // create new random file name
        $img_path = $media->storeAs('public/images', $createnewFileName); // get the image path

        $mediaObj->file_path = $createnewFileName;
        $mediaObj->save();
        return $mediaObj->id;
    }
}