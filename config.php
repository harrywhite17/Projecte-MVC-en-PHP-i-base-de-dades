<?php

$databaseType = getenv('DB_CONNECTION') ?: 'mysql';
$host = getenv('DB_HOST') ?: '127.0.0.1';
$name = getenv('DB_DATABASE') ?: 'phpTinkering';
$user = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: 'alumne';

// Return the configuration array
return [
    'database' => [
        'databasetype' => $databaseType,
        'host' => $host,
        'name' => $name,
        'user' => $user,
        'password' => $password,
    ]
];