<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UtsProfile extends Model
{
    protected $fillable = [
        'full_name',
        'headline',
        'avatar_initials',
        'bio',
        'skills',
        'email',
        'phone',
        'location',
        'github_url',
        'linkedin_url',
        'instagram_url',
        'is_active',
    ];

    protected $casts = [
        'skills' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}