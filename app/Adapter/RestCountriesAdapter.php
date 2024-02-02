<?php

namespace App\Adapter;

use App\Clients\RestCountriesClient;
use App\DTOs\CountryDto;
use App\Interfaces\CountriesDataInterface;
use Illuminate\Support\Collection;

class RestCountriesAdapter implements CountriesDataInterface
{
    public function __construct(
        readonly public RestCountriesClient $countriesClient
    ) {
    }

    /**
     * @throws \JsonException
     */
    public function getCountriesData(): Collection
    {
        $responseJson = $this->countriesClient->getCountries();

        $responseArray = json_decode($responseJson, true, 512, \JSON_THROW_ON_ERROR);
        $responseCollection = new Collection();
        foreach ($responseArray as $index => $country) {
            $responseCollection->add(new CountryDto(
                name: (string) $country['name']['common'],
                flag:  $country['flags']['png'],
            ));
        }

        return $responseCollection;
    }

}
