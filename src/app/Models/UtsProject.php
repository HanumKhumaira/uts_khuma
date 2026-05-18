<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UtsProject extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'tech_stack',
        'repository_url',
        'demo_url',
        'image_url',
        'status',
        'progress',
        'is_featured',
        'sort_order',
        'published_at',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'progress' => 'integer',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (UtsProject $project): void {
            if (blank($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query
            ->orderBy('sort_order')
            ->latest('published_at')
            ->latest();
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'planned' => 'Direncanakan',
            'in_progress' => 'Sedang Dikerjakan',
            'completed' => 'Selesai',
            default => 'Tidak Diketahui',
        };
    }

    public function getStatusClassAttribute(): string
    {
        return match ($this->status) {
            'planned' => 'badge badge-muted',
            'in_progress' => 'badge badge-warning',
            'completed' => 'badge badge-success',
            default => 'badge badge-muted',
        };
    }

    public function getTechStackListAttribute(): array
    {
        $techStack = $this->tech_stack;

        if (is_array($techStack)) {
            return array_values(array_filter($techStack));
        }

        if (is_string($techStack)) {
            $decoded = json_decode($techStack, true);

            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return array_values(array_filter($decoded));
            }

            return array_values(array_filter(
                array_map('trim', explode(',', $techStack))
            ));
        }

        return [];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}