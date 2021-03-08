<?php

$newCustomers = [
    ['James','May'],
    ['Richard','Hammond'],
    ['Jeremy','Clarkson'],
];

try {
    $pdo = new PDO('mysql:host=localhost;dbname=phpcourse', 'vagrant', 'vagrant');

    $pdo->beginTransaction();

    $stmt = $pdo->prepare("INSERT INTO customers (firstname, lastname) values (:firstname, :lastname)");

    foreach ($newCustomers as $newCustomer)
    {
        $stmt->execute([':firstname' => $newCustomer[0], ':lastname' => $newCustomer[1]]);
    }

    $pdo->commit();

} catch (PDOException $e) {
    echo "PDO exception catched:\n";
    echo $e->getMessage();
    $pdo->rollBack();
}
catch (Exception $e) {
    echo "Generic exception catched:\n";
    echo $e->getMessage();
}
