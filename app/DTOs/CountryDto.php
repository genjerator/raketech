<?php

namespace App\DTOs;

class CountryDto
{
    public function __construct(
        readonly public string $name,
        readonly public string $flag,
    ) {
    }
}
