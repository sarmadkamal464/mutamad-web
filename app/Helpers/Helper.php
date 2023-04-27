<?php

namespace App\Helpers;

use Illuminate\Support\Facades\URL;

class Helper
{
    public static function api_url(string $string)
    {
        return URL::to(config('app.app_api_url') . $string);
    }
}
