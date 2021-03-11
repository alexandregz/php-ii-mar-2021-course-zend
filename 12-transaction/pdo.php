<?php


try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=phpcourse','vagrant','vagrant',
        [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
    );

    $firstname = 'Moncho';
    $lastname = 'Reboiras';

    // all querys in transaction
    $pdo->beginTransaction();


    // insert 1
    $stmt = $pdo->prepare( 'INSERT INTO customers(firstname, lastname) VALUES (:firstname, :lastname)' );

    if ($stmt->execute([ ':firstname' => $firstname, ':lastname' => $lastname ])) {
        echo "New user $firstname $lastname added" . PHP_EOL;
    }

    // trying again
    $stmt = $pdo->prepare( 'INSERT INTO customers(firstname, lastname) VALUES (:firstname, :lastname)' );

    if ($stmt->execute([ ':firstname' => null, ':lastname' => $lastname.'2' ])) {
        echo "New user $firstname $lastname added" . PHP_EOL;
    }

    $pdo->commit();
}
catch (PDOException $e){
    $pdo->rollBack();

    echo "Rollback because error in PDO: " . $e->getMessage() . PHP_EOL;

    // check if user exists
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM customers WHERE firstname = :firstname');
    $stmt->execute([':firstname' => $firstname]);
    $count = $stmt->fetchColumn();

    echo "Users with firstname $firstname: $count" . PHP_EOL;
}
