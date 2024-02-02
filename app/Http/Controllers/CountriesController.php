<?php

namespace App\Http\Controllers;

use App\Services\CountriesServices;
use Illuminate\Support\Facades\Response;

class CountriesController extends Controller
{
    public function index(CountriesServices $countriesServices): \Illuminate\Http\Response
    {
        return Response::make($countriesServices->fetchJsonCountries())->header('Content-Type', 'application/json');
    }
}
