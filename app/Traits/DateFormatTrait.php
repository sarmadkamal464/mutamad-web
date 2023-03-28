<?php

namespace App\Traits;

use App\Models\Project;

trait DateFormatTrait
{
    /**
     * Get the creation date formatted as "day Month name, Year".
     *
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return date('j F, Y', strtotime($value));
    }
}
