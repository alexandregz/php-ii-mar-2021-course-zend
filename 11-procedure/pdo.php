<?php


try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=phpcourse','vagrant','vagrant',
        [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]
    );

    $firstname = 'Moncho';
    $lastname = 'Reboiras';

    // delete procedure previously
    $pdo->exec('DROP PROCEDURE IF EXISTS phpcourse.getIfExistsByFirstname');
    $pdo->exec(
        'CREATE PROCEDURE phpcourse.getIfExistsByFirstname( p_firstname varchar(50) ) ' .
        'BEGIN ' .
            'SELECT COUNT(*) AS total FROM customers WHERE firstname = p_firstname; ' .
        'END'
    );
    
    // check if user exists
    $stmt = $pdo->prepare( 'CALL getIfExistsByFirstname(?)' );
    $stmt->execute([$firstname]);
    $count = $stmt->fetchColumn();
    if($count > 0) {
        throw new PDOException("We have a customer with firstname $firstname already!");
    }

    // insert
    $stmt = $pdo->prepare( 'INSERT INTO customers(firstname, lastname) VALUES (:firstname, :lastname)' );

    if ($stmt->execute([ ':firstname' => $firstname, ':lastname' => $lastname ])) {
        echo "New user $firstname $lastname added" . PHP_EOL;
    }

    $stmt = $pdo->prepare( 'CALL getIfExistsByFirstname(?)' );
    $stmt->execute([$firstname]);
    $count = $stmt->fetchColumn();
    echo "Users with firstname $firstname: $count" . PHP_EOL;
} 
catch (PDOException $e){
    echo "Error in PDO: " . $e->getMessage() . PHP_EOL;
}
