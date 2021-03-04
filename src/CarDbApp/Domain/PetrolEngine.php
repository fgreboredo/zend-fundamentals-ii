<?php


namespace CarDbApp\Domain;


class PetrolEngine extends Engine
{

    public function __construct(string $engineType)
    {
        $this->engineType = $engineType;
        $this->engineStatus = parent::ENGINE_STATUS_NEW;
    }

    /**
     * @return string
     */
    public function getEngineType() : string
    {
        return $this->engineType;
    }

    /**
     * @param string $engineType
     */
    public function setEngineType(string $engineType)
    {
        $this->engineType = $engineType;
    }

    /**
     *
     */
    public function startEngine(): void
    {
        if ($this->engineStatus != parent::ENGINE_STATUS_BURNT)
        {
            $this->setEngineStatus(parent::ENGINE_STATUS_RUNNING);
        }
        else
        {
            throw new \Exception ("The engine of this vehicle is burnt out");
        }
    }

    public function stopEngine() : void
    {
        switch ($this->engineStatus)
        {
            case parent::ENGINE_STATUS_BURNT:
                {
                    throw new \Exception("The engine of this vehicle is burnt out");
                }
                break;
            case parent::ENGINE_STATUS_STALLED:
                {
                    throw new \Exception("The engine of this vehicle is stalled, you need to start it again");
                }
                break;
            default:
                {
                    $this->setEngineStatus(parent::ENGINE_STATUS_STOPPED);
                }
                break;
        }
    }

    protected function setEngineStatus(int $engineStatus): void
    {
        $this->engineStatus = $engineStatus;
    }

    public function getEngineStatus(): string
    {
        return parent::ENGINE_STATUS_STRING[$this->engineStatus];
    }

    public function makeNoise(): void
    {
        switch ($this->engineStatus)
        {
            case parent::ENGINE_STATUS_NEW: echo "I'm new, start me!"; break;
            case parent::ENGINE_STATUS_RUNNING: echo "Brrrrm brrrrm"; break;
            case parent::ENGINE_STATUS_STOPPED: echo "Stopped, no noise"; break;
            case parent::ENGINE_STATUS_STALLED: echo "Stalled, silent altogether"; break;
            default: echo "Clonc clonc, I need a mechanic"; break;
        }
    }


}