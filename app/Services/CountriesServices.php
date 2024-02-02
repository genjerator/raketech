<?php

namespace App\Services;

use App\Adapter\RestCountriesAdapter;

final class CountriesServices
{
    public function __construct(private readonly RestCountriesAdapter $countriesAdapter)
    {
    }

    public function fetchCountries(): void
    {
        $countriesData = $this->countriesAdapter->getCountriesData();

        foreach ($countriesData as $index => $countryDto) {
            $countryArray = [];
            $countryArray['name'] = $countryDto->name;
            $countryArray['flag'] = $countryDto->flag;
        }
    }
}

