<?php

namespace App\Traits;

use App\Models\Country;
use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait CountryTrait
{
    /**
     * Get the creation date formatted as "day Month name, Year".
     *
     * @return string
     */

    // public function setCountryAttribute($value)
    // {
    //     $this->attributes['country'] = strtolower($value);
    // }
    public function getCountryAttribute($value)
    {
        $country = Country::where('code', $value)->first();
        return $country;
    }
}
