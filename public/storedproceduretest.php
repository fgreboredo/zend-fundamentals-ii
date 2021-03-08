<?php

// This exercise assumes that the code of /data/stored_procedure.sql has been run in the mysql server

try {
    $pdo = new PDO('mysql:host=localhost;dbname=phpcourse', 'vagrant', 'vagrant');

    $stmt = $pdo->prepare("CALL createCustomer (?,?)");

    $stmt->execute(['Sylvester', 'Stallone']);

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