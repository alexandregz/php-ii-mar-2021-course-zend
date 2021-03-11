<?php

$email = $argv[1];
if(!isset($email)) die("Usage: $argv[0] EMAIL" . PHP_EOL);

$emailRegex = "/^[A-Za-z0-9][\w\d\.\+-]*\@[A-Za-z0-9]+((\.|-*)?[A-Za-z0-9])*\.[A-Za-z]{2,20}$/";

if(preg_match($emailRegex, $email) == true) {
    echo "Email $email is valid". PHP_EOL;
}
else {
    echo "Invalid email!" . PHP_EOL;
}

