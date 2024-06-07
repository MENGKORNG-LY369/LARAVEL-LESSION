<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['image'];

    public static function uploadFileStorage($file): string
    {

        $filename = $file->getClientOriginalName(); // get the file name
        $getfilenamewitoutext = pathinfo($filename, PATHINFO_FILENAME); // get the file name without extension
        $getfileExtension = $file->getClientOriginalExtension(); // get the file extension
        $newFileName = time() . '_' . str_replace(' ', '_', $getfilenamewitoutext) . '.' . $getfileExtension; // create new random file name
        $img_path = $file->storeAs('public/images/posts', $newFileName); // get the image path
        return $newFileName;
    }

    public static function createOrUpdate($request, $id): string
    {
        $file_name = self::uploadFileStorage($request);
        $media = self::updateOrCreate(['id' => $id], ['image' => $file_name]);
        return $media->id;
    }
}