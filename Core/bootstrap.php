<?php
require_once '../config.php'; // Adjust the path to include config.php correctly

try {
    $config = require '../config.php'; // Load the config values

    // Create the PDO connection
    $pdo = new PDO(
        'mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['name'],
        $config['database']['user'],
        $config['database']['password']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the connection is valid
    if (!$pdo) {
        throw new Exception('Failed to establish a database connection.');
    }

    // Pass the PDO instance to the Database class constructor
    $database = new Core\Database\Database($pdo);
    Core\App::bind('database', $database);

    // Instantiate the Route and bind it to the App container
    $route = new Core\Route(); // Ensure this is the correct namespace for your Route class
    Core\App::bind('route', $route);

} catch (PDOException $e) {
    die('Connection error: ' . $e->getMessage());
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
