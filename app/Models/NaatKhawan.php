<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /*
    |--------------------------------------------------------------------------
    | Relationships (Future Use)
    |--------------------------------------------------------------------------
    */

    // Example:
    // public function naats()
    // {
    //     return $this->hasMany(Naat::class);
    // }
}