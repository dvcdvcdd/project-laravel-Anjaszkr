<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photobooth extends Model
{
    protected $fillable = ['image_path'];

    protected static function booted(): void
    {
        static::deleted(function (Photobooth $photobooth) {

            if ($photobooth->image_path && Storage::disk('public')->exists($photobooth->image_path)) {

                Storage::disk('public')->delete($photobooth->image_path);
            }
        });
    }
}
