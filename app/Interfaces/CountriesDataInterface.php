<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface CountriesDataInterface
{
    public function getCountriesData(): Collection;
}
