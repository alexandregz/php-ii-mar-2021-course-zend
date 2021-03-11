<?php


try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=phpcourse','vagrant','vagrant',
        [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
    );

    $firstname = 'Moncho';
    $lastname = 'Reboiras';

    // check if user exists
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM customers WHERE firstname = :firstname');
    $stmt->execute([':firstname' => $firstname]);
    $count = $stmt->fetchColumn();
    if($count > 0) {
        throw new PDOException("We have a customer with firstname $firstname already!");
    }

    // insert
    $stmt = $pdo->prepare( 'INSERT INTO customers(firstname, lastname) VALUES (:firstname, :lastname)' );

    if ($stmt->execute([ ':firstname' => $firstname, ':lastname' => $lastname ])) {
        echo "New user $firstname $lastname added" . PHP_EOL;
    }
} 
catch (PDOException $e){
    echo "Error in PDO: " . $e->getMessage() . PHP_EOL;
}
