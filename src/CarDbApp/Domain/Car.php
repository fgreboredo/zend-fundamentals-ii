<?php


namespace CarDbApp\Domain;

use CarDbApp\Core\Traits\{
    RadioTrait, WipersTrait
};

class Car extends SelfMovingVehicle
{
    const STANDARD_NUMBER_OF_WHEELS = 4;

    use RadioTrait, WipersTrait {
        RadioTrait::turnOn insteadof WipersTrait;
        WipersTrait::turnOn as turnWipersOn;

        RadioTrait::turnOff insteadof WipersTrait;
        WipersTrait::turnOff as turnWipersOff;

        RadioTrait::isRadio as protected;
        WipersTrait::isWipers as protected;
    }


    protected Engine $engine;

    public function __construct(string $make = '', string $model = '')
    {
        parent::__construct($make, $model);
        $this->engine = new PetrolEngine('Petrol Inline 4 cylinders');
        $this->numberOfWheels = self::STANDARD_NUMBER_OF_WHEELS;
    }
}
