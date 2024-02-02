<?php

namespace App\Http\Controllers;

use App\Interfaces\CountriesDataInterface;
use App\Resources\CountryResource;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function index(CountriesDataInterface $countriesData)
    {
        $countries = $countriesData->getCountriesData();
        return CountryResource::collection($countries);
    }
}
