<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'website_url',
        'youtube_url',
    ];

    Protected static function booted()
    {
        static::deleting(function ($project) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
        });
    }
}
