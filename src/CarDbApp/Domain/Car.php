<?php


namespace CarDbApp\Domain;


class Car
{

    /**
     * In some cases we coud have 6 (Tyrrell P34), in some cases 3 (Reliant Robin)
     */
    const STANDARD_NUMBER_OF_WHEELS = 4;

    /**
     * @var string
     */
    private $engineStatus = '';

    /**
     * Car constructor.
     */
    public function __construct(public string $make, public string $model)
    {
        $this->engineStatus = "brand new";
    }

    public function startEngine(){
        $this->setEngineStatus('running');
    }

    public function stopEngine(){
        $this->setEngineStatus('stopped');
    }

    /**
     *
     * @param string $engineStatus
     */
    protected function setEngineStatus($engineStatus) {
        $this->engineStatus = $engineStatus;
    }

    /**
     * Expected to be rewritten in subclasses
     */
    protected function fillUpTank(){

    }

    public function __toString(): string
    {
        return sprintf("I am a %s %s, and my engine is %s", $this->make, $this->model, $this->engineStatus);
    }


}