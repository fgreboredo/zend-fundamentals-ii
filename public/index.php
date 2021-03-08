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
use CarDbApp\Domain\Truck;
use CarDbApp\Domain\Engine;

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
    throw new \Exception("Just trying exceptions functionality");
}
catch (CarDbApp\Core\Exceptions\UnstartableCarException $e)
{
    // This type of exceptions already echoes the message
}
catch (\Exception $e)
{
    error_log($e->getMessage());
    echo $e->getMessage().PHP_EOL;
}
finally {
    echo "The exception was captured alright".PHP_EOL;
}

echo "Trying again...".PHP_EOL;
$car2->getEngine()->setEngineStatus(Engine::ENGINE_STATUS_BURNT);
try {
    $car2->startEngine();
}
catch (CarDbApp\Core\Exceptions\UnstartableCarException $e)
{
    // This type of exceptions already echoes the message
}
catch (\Exception $e)
{
    error_log($e->getMessage());
    echo $e->getMessage().PHP_EOL;
}
finally
{
    echo "The exception was captured alright".PHP_EOL;
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


echo "Testing the interface".PHP_EOL;
echo "Turning left and right on car #1...".PHP_EOL;
$car1->turnLeft();
$car1->turnRight();

echo PHP_EOL.PHP_EOL;

echo "Creating a car-loading truck".PHP_EOL;
$truck = new Truck("Scania", "RandomModel", 20);
echo $truck.PHP_EOL;
$truck->makeNoise();
echo PHP_EOL.PHP_EOL;

echo "Loading cars...".PHP_EOL;
$truck->loadCar($car1);
$truck->loadCar($car2);
$truck->loadCar($car3);

echo var_dump($truck);

echo PHP_EOL;
echo "Unloading the last car...".PHP_EOL;
$returnedCar = $truck->unloadCar();

echo "Returned car is...".PHP_EOL;
echo $returnedCar.PHP_EOL;

echo "Cars in the truck...".PHP_EOL;
echo var_dump($truck);

echo PHP_EOL.PHP_EOL;

echo "Traits test".PHP_EOL;

$car1->turnOn();
$car1->turnWipersOn();
