<?php

namespace CarDbApp\Core\Traits;

trait WipersTrait
{

    private bool $wipers;
    private bool $automaticWipers;

    public function turnOn(): void
    {
        $this->wipers = true;
        echo "Wipers turned on".PHP_EOL;
    }

    public function turnOff() : void
    {
        $this->wipers = false;
        echo "Wipers turned off".PHP_EOL;
    }

    public function setAutomaticMode () : void
    {
        $this->automaticWipers = true;
    }
    public function unsetAutomaticMode() : void
    {
        $this->automaticWipers = false;
    }

    /**
     * @return bool
     */
    public function isWipers(): bool
    {
        return $this->wipers;
    }

    /**
     * @return bool
     */
    public function isAutomaticWipers(): bool
    {
        return $this->automaticWipers;
    }


}