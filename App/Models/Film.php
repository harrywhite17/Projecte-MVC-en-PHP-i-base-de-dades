<?php

namespace App\Models;

use Core\App;

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

        // Ensure the date is in the correct format
        $data['any_estrena'] = date('Y', strtotime($data['any_estrena']));

        $statement->bindValue(':titol', $data['titol']);
        $statement->bindValue(':director', $data['director']);
        $statement->bindValue(':any_estrena', $data['any_estrena']);
        $statement->bindValue(':duracio', $data['duracio']);
        $statement->bindValue(':sinopsi', $data['sinopsi']);
        $statement->bindValue(':genere', $data['genere']);
        $statement->bindValue(':data_afegida', $data['data_afegida']);
        $statement->execute();
    }

    // Function to update a film
    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE " . static::$table . " SET titol = :titol, director = :director, any_estrena = :any_estrena, duracio = :duracio, sinopsi = :sinopsi, genere = :genere WHERE id = :id");

        // Ensure the date is in the correct format
        $data['any_estrena'] = date('Y', strtotime($data['any_estrena']));

        $statement->bindValue(':id', $id);
        $statement->bindValue(':titol', $data['titol']);
        $statement->bindValue(':director', $data['director']);
        $statement->bindValue(':any_estrena', $data['any_estrena']);
        $statement->bindValue(':duracio', $data['duracio']);
        $statement->bindValue(':sinopsi', $data['sinopsi']);
        $statement->bindValue(':genere', $data['genere']);
        $statement->execute();
    }

    // Function to delete a film
    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();
    }
}