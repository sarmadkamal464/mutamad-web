<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected $response;

    function __construct(ResponseController $response)
    {
        $this->response = $response;
    }
    public function getCountries(Request $request)
    {
        return $this->response->collectionResponse($request, Country::all());
    }
}
