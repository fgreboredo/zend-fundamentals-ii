<?php


namespace CarDbApp\Domain;


abstract class AbstractVehicle implements VehicleInterface
{

    /**
     * @return bool
     */
    public function hasEngine() : bool
    {
        return false;
    }

    /**
     *
     */
    public abstract function makeNoise() : void;

    /**
     *
     */
    public abstract function startEngine() : void;

    /**
     *
     */
    public abstract function stopEngine(): void;

    /**
     *
     */
    public function turnLeft(): void
    {
        echo "Turning left!".PHP_EOL;
    }

    /**
     *
     */
    public function turnRight(): void
    {
        echo "Turning right!".PHP_EOL;
    }


}