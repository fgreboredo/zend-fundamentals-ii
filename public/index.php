<?php
/**
 * Application Entry
 */

define('BASE', realpath(__DIR__ . '/../'));

//require '../vendor/autoload.php';
spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/src/' . $file;
    }
);


//Some testing of the Car class
use CarDbApp\Domain\Car;

$car1 = new Car("Chevrolet", "Corvette");
$car2 = new Car("Ford", "Mustang");
$car3 = new Car("Toyota", "Corolla");

echo "Initial state: ".PHP_EOL;
echo "Car #1: ".$car1.PHP_EOL;
echo "Car #2: ".$car2.PHP_EOL;
echo "Car #3: ".$car3.PHP_EOL;
echo PHP_EOL.PHP_EOL;

echo "Calling startEngine on Car #2...".PHP_EOL;
$car2->startEngine();
echo "Has anything changed on car #2?".PHP_EOL;
echo "Car #2: ".$car2.PHP_EOL;
echo PHP_EOL.PHP_EOL;

echo "Calling stopEngine on Car #3...".PHP_EOL;
$car3->stopEngine();
echo "Has anything changed on car #3?".PHP_EOL;
echo "Car #3: ".$car3.PHP_EOL;
echo PHP_EOL.PHP_EOL;

