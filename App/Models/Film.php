<?php

namespace App\Models;

use Core\App;
use PDOException;
use Exception; // Import the built-in Exception class

class Film
{
    protected static $table = 'films';

    // Function to return all films
    public static function getAll()
    {
        $db = App::get('database');
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    // Function to find a film by ID
    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $statement->execute(['id' => $id]);
        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    // Function to create a new film
    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('INSERT INTO ' . static::$table . " (titol, director, any_estrena, duracio, sinopsi, genere, data_afegida) VALUES (:titol, :director, :any_estrena, :duracio, :sinopsi, :genere, :data_afegida)");

        // Ensure the year is in the correct format
        $data['any_estrena'] = date('Y', strtotime($data['any_estrena']));

        // Validate and format 'data_afegida'
        if (empty($data['data_afegida'])) {
            $data['data_afegida'] = date('Y-m-d'); // Set to current date if empty
        } else {
            $data['data_afegida'] = date('Y-m-d', strtotime($data['data_afegida'])); // Ensure proper format
        }

        try {
            $statement->bindValue(':titol', $data['titol']);
            $statement->bindValue(':director', $data['director']);
            $statement->bindValue(':any_estrena', $data['any_estrena']);
            $statement->bindValue(':duracio', $data['duracio']);
            $statement->bindValue(':sinopsi', $data['sinopsi']);
            $statement->bindValue(':genere', $data['genere']);
            $statement->bindValue(':data_afegida', $data['data_afegida']);
            $statement->execute();
        } catch (PDOException $e) {
            // Handle exception (you can log it or display an error message)
            error_log($e->getMessage());
            throw new Exception("Error creating film: " . $e->getMessage());
        }
    }


    // Function to update a film
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE " . static::$table . " SET titol = :titol, director = :director, any_estrena = :any_estrena, duracio = :duracio, sinopsi = :sinopsi, genere = :genere, data_afegida = :data_afegida WHERE id = :id");

        // Ensure the year is formatted correctly
        $data['any_estrena'] = date('Y', strtotime($data['any_estrena']));
        $data['data_afegida'] = date('Y-m-d', strtotime($data['data_afegida']));

        try {
            $statement->bindValue(':id', $id);
            $statement->bindValue(':titol', $data['titol']);
            $statement->bindValue(':director', $data['director']);
            $statement->bindValue(':any_estrena', $data['any_estrena']);
            $statement->bindValue(':duracio', $data['duracio']);
            $statement->bindValue(':sinopsi', $data['sinopsi']);
            $statement->bindValue(':genere', $data['genere']);
            $statement->bindValue(':data_afegida', $data['data_afegida']);
            $statement->execute();
        } catch (PDOException $e) {
            // Handle exception (you can log it or display an error message)
            error_log($e->getMessage());
            throw new Exception("Error updating film: " . $e->getMessage());
        }
    }

    // Function to delete a film
    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);

        try {
            $statement->execute();
        } catch (PDOException $e) {
            // Handle exception (you can log it or display an error message)
            error_log($e->getMessage());
            throw new Exception("Error deleting film: " . $e->getMessage());
        }
    }
}
