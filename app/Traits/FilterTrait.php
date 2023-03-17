<?php

namespace App\Traits;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait FilterTrait
{
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query
            ->when($filters['country'] ?? false, fn ($query, $value) => $query->where('country', $value))
            ->when($filters['category_id'] ?? false, fn ($query, $value) => $query->where('category_id', $value))
            ->when($filters['search'] ?? false, function ($query, $value) {
                $query->where(function ($query) use ($value) {
                    $query
                        ->where('name', 'like', '%' . $value . '%')
                        ->orWhere('email', 'like', '%' . $value . '%')
                        ->orWhere('username', 'like', '%' . $value . '%')
                        ->orWhere('bio', 'like', '%' . $value . '%');
                });
            })
            ->when($filters['orderBy'] ?? false, fn ($query, $value) => $query->orderBy($value, $filters['order'] ?? 'desc'));
    }
}
