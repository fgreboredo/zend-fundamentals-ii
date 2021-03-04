<?php


namespace CarDbApp\Domain;

use CarDbApp\Domain\Vehicle;
use CarDbApp\Domain\PetrolEngine;

class Car extends Vehicle
{
    const STANDARD_NUMBER_OF_WHEELS =  4;

    const PETROL_ENGINE = 'petrol';

    public function __construct(string $make = '', string $model = '')
    {
        parent::__construct($make, $model);
        $this->engine = new PetrolEngine('Petrol Inline 4 cylinders');
        $this->numberOfWheels = self::STANDARD_NUMBER_OF_WHEELS;
    }


    public function makeNoise(): void
    {
        $this->engine->makeNoise();
    }

}