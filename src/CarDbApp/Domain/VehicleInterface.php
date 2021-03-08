<?php


namespace CarDbApp\Domain;


interface VehicleInterface
{

    public function hasEngine() : bool;

    public function makeNoise() : void;

    public function startEngine() : void;

    public function stopEngine(): void;

    public function turnLeft(): void;

    public function turnRight(): void;

}