<?php


namespace CarDbApp\Domain;


abstract class AbstractVehicle
{

    public abstract function hasEngine() : bool;

    public abstract function makeNoise() : void;

    public abstract function startEngine() : void;

    public abstract function stopEngine(): void;

}