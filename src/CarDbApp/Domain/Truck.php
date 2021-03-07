<?php


namespace CarDbApp\Domain;

use CarDbApp\Domain\Car;

class Truck extends SelfMovingVehicle
{

    const STANDARD_NUMBER_OF_WHEELS = 18;

    protected int $tonnesOfCapacity;

    protected array $cars;

    public function __construct(string $make = '', string $model = '', int $tonnesOfCapacity = 0)
    {
        parent::__construct($make, $model);
        $this->tonnesOfCapacity = $tonnesOfCapacity;
        $this->engine = new PetrolEngine('Diesel V12');
        $this->numberOfWheels = self::STANDARD_NUMBER_OF_WHEELS;
        $this->cars = [];
    }

    public function loadCar(?Car $car) : void
    {
        array_push($this->cars, $car);
    }

    public function unloadCar() : Car
    {
        return array_pop($this->cars);
    }

}