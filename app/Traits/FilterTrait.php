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
            ->when($filters['status'] ?? false, fn ($query, $value) => $query->where('status', $value))
            ->when(
                $filters['category'] ?? false,
                fn ($query, $value) => $query->whereIn('category_id', function ($subquery) use ($value) {
                    foreach (explode(',', $value) as $key => $val) {
                        $subquery
                            ->select('id')
                            ->from('categories')
                            ->orWhere('slug', $val);
                    }
                }),
            )
            ->when($filters['search'] ?? false, function ($query, $value) {
                $query->where(function ($query) use ($value) {
                    $query
                        ->where('name', 'like', '%' . $value . '%')
                        ->orWhere('email', 'like', '%' . $value . '%')
                        ->orWhere('username', 'like', '%' . $value . '%')
                        ->orWhere('bio', 'like', '%' . $value . '%');
                });
            })
            ->when($filters['orderBy'] ?? false, fn ($query, $value) => $query->orderBy($value, $filters['order'] ?? 'desc'), fn ($query, $value) => $query->getModel() instanceof User ? $query->orderBy('earning', 'desc') : $query->orderBy('id', 'desc'))
            ->when($filters['offset'] ?? false, fn ($query, $value) => $query->offset($value))
            ->when($filters['limit'] ?? false, fn ($query, $value) => $query->limit($value));
    }
}
