<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Blog;

class NaatKhawan extends Model
{
    use HasFactory;

    protected $table = 'naat_khawans';

    protected $fillable = [
        'name',
        'profile_image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}