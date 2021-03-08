<?php
// Exercise 1: Stored procedures
try {
    $pdo = new PDO('mysql:host=localhost;dbname=phpcourse', 'vagrant', 'vagrant');

    $stmt = $pdo->prepare("INSERT INTO customers (firstname, lastname) values (:firstname, :lastname)");

    $stmt->execute([':firstname' => "Isabel", ':lastname' => 'Diaz']);

} catch (PDOException $e) {
    echo "PDO exception catched:\n";
    echo $e->getMessage();
    exit(1);
}
catch (Exception $e) {
    echo "Generic exception catched:\n";
    echo $e->getMessage();
    exit(1);
}