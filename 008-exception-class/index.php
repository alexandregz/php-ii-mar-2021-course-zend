<?php

define( 'BASE', realpath(__DIR__ . '/src') );

spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/' . $file;
    }
);

//use Service\Hosting;
use Service\HostingPersonal;
use Service\Exception\ExceptionService;

//$host = new Hosting('test.com', 'testcom', 'aexxxxxx@xxxxxxxx.com');
//echo "Creating Hosting\n";
//if($host->create()) {
//    echo "Hosting created in ".Hosting::HOME."\n";
//}
//echo "$host isCreated: ".var_export($host->isCreated(), true);
//echo "\n";
//
//echo "\n";

$hostPersonal = new HostingPersonal('test-personal.com', 'testpersonalcom', 'aexxxxxx@xxxxxxxx.com', true);
try {
    echo "Creating HostingPersonal\n";
    if ($hostPersonal->create('test-personal-cambio-dom.com')) {
        echo "Hosting 'Personal' created in " . Hosting::HOME . "\n";
    }
    echo "$hostPersonal isCreated: " . var_export($hostPersonal->isCreated(), true);
    echo "\n";
}
catch (ExceptionService $e) {
    echo $e->getMessage()."\n";
}º
finally {
    if($hostPersonal->isCreated()) {
        echo "Rollback\n";
        $hostPersonal->rollback();
    }
}


