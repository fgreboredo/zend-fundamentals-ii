<?php


namespace CarDbApp\Domain;


abstract class Engine
{

    protected $engineType;
    protected $engineStatus;

    public const ENGINE_STATUS_NEW = 0;
    public const ENGINE_STATUS_RUNNING = 1;
    public const ENGINE_STATUS_STOPPED = 2;
    public const ENGINE_STATUS_STALLED = 3;
    public const ENGINE_STATUS_BURNT = 4;

    public const ENGINE_STATUS_STRING = [
        self::ENGINE_STATUS_NEW => 'brand new',
        self::ENGINE_STATUS_RUNNING => 'running',
        self::ENGINE_STATUS_STOPPED => 'stopped',
        self::ENGINE_STATUS_STALLED => 'stalled',
        self::ENGINE_STATUS_BURNT => 'burn out'
    ];

    public abstract function getEngineType() : string;

    public abstract function setEngineType(string $engineType);

    public abstract function startEngine() : void;

    public abstract function stopEngine() : void;

    protected abstract function setEngineStatus(int $engineStatus) : void;

    public abstract function getEngineStatus() : string;

    public abstract function makeNoise(): void;

}