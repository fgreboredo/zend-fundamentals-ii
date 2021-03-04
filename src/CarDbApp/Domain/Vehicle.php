<?php


namespace CarDbApp\Domain;

use CarDbApp\Domain\Engine;

abstract class Vehicle extends AbstractVehicle
{

    /**
     * @var int
     */
    protected $numberOfWheels = 0;

    /**
     * @var \CarDbApp\Domain\Engine
     */
    protected Engine $engine;


    /**
     * @var string
     */
    public $make;

    /**
     * @var string
     */
    public $model;


    /**
     * Vehicle constructor.
     * @param string $make
     * @param string $model
     * @param int $numberOfWheels
     * @param string $engineType
     */
    public function __construct(string $make = '', string $model = '' )
    {
        $this->make = $make;
        $this->model = $model;
    }


    /**
     * @return bool
     */
    public function hasEngine () : bool
    {
        return !is_null($this->engine);
    }

    /**
     * Starts the vehicle engine
     * @return string
     * @throws \Exception
     */
    public function startEngine() : void
    {
        if ( $this->hasEngine() )
        {
            $this->engine->startEngine();
        }
        else
        {
            throw new \Exception("This vehicle has no engine");
        }
    }


    /**
     * Stops the engine of this vehicle
     *
     * @return bool
     * @throws \Exception
     */
    public function stopEngine() : void
    {
        if ( $this->hasEngine())
        {
           $this->engine->stopEngine();
        }
        else
        {
            throw new \Exception("This vehicle has no engine");
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf ("I am a %s %s with %s wheels and %s engine. My engine is %s.",
            $this->make,
            $this->model,
            $this->numberOfWheels,
            $this->engine->getEngineType(),
            $this->engine->getEngineStatus()
        );
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        throw new \Exception('Undefined property');
    }

    /**
     * @param string $name
     * @param $value
     */
    public function __set(string $name, $value): void
    {
        throw new \Exception('Undefined property');
    }

    public abstract function makeNoise() : void;

}