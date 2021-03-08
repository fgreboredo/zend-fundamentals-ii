<?php


namespace CarDbApp\Domain;

use CarDbApp\Domain\Engine;

abstract class SelfMovingVehicle extends Vehicle
{
    protected Engine $engine;

    public function makeNoise(): void
    {
        $this->engine->makeNoise();
    }

}