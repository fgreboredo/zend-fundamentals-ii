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
try {
    $car2->startEngine();
}
catch (\Expception $e)
{
    echo $e->getMessage().PHP_EOL;
}

echo "Has anything changed on car #2?".PHP_EOL;
echo "Car #2: ".$car2.PHP_EOL;
echo PHP_EOL.PHP_EOL;

echo "Calling stopEngine on Car #3...".PHP_EOL;
try {
    $car3->stopEngine();
}
catch (\Exception $e)
{
    echo $e->getMessage().PHP_EOL;
}

echo "Has anything changed on car #3?".PHP_EOL;
echo "Car #3: ".$car3.PHP_EOL;
echo PHP_EOL.PHP_EOL;

echo "Making noises, car #1 ?".PHP_EOL;
echo "Car #1: ";
$car1->makeNoise();
echo PHP_EOL;
echo PHP_EOL.PHP_EOL;

echo "Car #2: ";
$car2->makeNoise();
echo PHP_EOL;
echo PHP_EOL.PHP_EOL;

echo "Car #3: ";
$car3->makeNoise();
echo PHP_EOL;
echo PHP_EOL.PHP_EOL;

echo "Using a setter with a defined property".PHP_EOL;
$car3->model = 'Auris';
echo $car3;
echo PHP_EOL.PHP_EOL;

// This should fail

echo "Trying to use an undefined property with __set".PHP_EOL;
try {
    $car3->booth = "100L";
}
catch (\Exception $e) {
    echo $e->getMessage().PHP_EOL;
}
echo PHP_EOL.PHP_EOL;

// This should also fail
echo "Trying to use an undefined property with __get".PHP_EOL;
try {
    echo $car1->booth;
}
catch (\Exception $e) {
    echo $e->getMessage().PHP_EOL;
}

echo PHP_EOL.PHP_EOL;

echo "Finished, goodbye".PHP_EOL;