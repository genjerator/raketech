<?php

namespace App\Services;

use App\Adapter\RestCountriesAdapter;
use App\Interfaces\CountriesDataInterface;
use App\Resources\CountryResource;

final class CountriesServices
{
    public function __construct(private readonly CountriesDataInterface $countriesData)
    {
    }

    public function fetchJsonCountries(): string
    {
        $cachedJson = cache('countries_cache');
        if(empty($cachedJson)) {
            $countries = $this->countriesData->getCountriesData();
            $cachedJson = CountryResource::collection($countries)->toResponse(request())->getContent();
            cache()->put('countries_cache', $cachedJson, 60);
        }
        return $cachedJson;
    }
}

