<?php

namespace CarDbApp\Core\Exceptions;

use Exception;

class UnstartableCarException extends Exception
{

    const DEFAULT_MESSAGE = "This engine is broken, you have to fix it";
    const DEFAULT_CODE = 500;

    public function __construct($message = self::DEFAULT_MESSAGE, $code = self::DEFAULT_CODE, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        echo $message.PHP_EOL;
        error_log($message);
    }

}