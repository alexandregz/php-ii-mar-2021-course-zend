<?php

define( 'BASE', realpath(__DIR__ . '/src') );

spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/' . $file;
    }
);

use Server\Hosting;

$host = new Hosting('test.com', 'testcom', 'aexxxxxx@xxxxxxxx.com');

if($host->create()) {
    echo "Hosting created in ".Hosting::HOME."\n";
}

echo "\nisCreated: ".var_export($host->isCreated(), true);
echo "\n";
