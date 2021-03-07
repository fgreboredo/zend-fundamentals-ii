<?php

namespace CarDbApp\Core\Traits;

trait RadioTrait
{
    private bool $radio;
    private bool $autotuneRadio;

    public function turnOn(): void
    {
        $this->radio = true;
        echo "Radio turned on".PHP_EOL;
    }

    public function turnOff() : void
    {
        $this->radio = false;
        echo "Radio turned off".PHP_EOL;
    }

    public function setAutotuneRadio () : void
    {
        $this->autotuneRadio = true;
    }
    public function unsetAutotuneRadio() : void
    {
        $this->autotuneRadio = false;
    }

    /**
     * @return bool
     */
    public function isRadio(): bool
    {
        return $this->radio;
    }

    /**
     * @return bool
     */
    public function isAutotuneRadio(): bool
    {
        return $this->autotuneRadio;
    }


}