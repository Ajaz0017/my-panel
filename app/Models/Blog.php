<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'is_featured',
        'naat_khawan_id',
    ];

    public function naatKhawan()
    {
        return $this->belongsTo(NaatKhawan::class);
    }
}