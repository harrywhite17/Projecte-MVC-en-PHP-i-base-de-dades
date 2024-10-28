<?php

namespace App\Models;

use Core\App;
use PDOException;
use Exception;

class Film
{
    protected static $table = 'films';

    public static function getAll()
    {
        $db = App::get('database');
        $statement = $db->getConnection()->prepare('SELECT * FROM ' . self::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . self::$table . ' WHERE id = :id');
        $statement->execute(['id' => $id]);
        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('INSERT INTO ' . static::$table . " (titol, director, any_estrena, duracio, sinopsi, genere, data_afegida) VALUES (:titol, :director, :any_estrena, :duracio, :sinopsi, :genere, :data_afegida)");

        $data['any_estrena'] = date('Y', strtotime($data['any_estrena']));

        if (empty($data['data_afegida']) || $data['data_afegida'] === '1970-01-01') {
            $data['data_afegida'] = date('Y-m-d');
        } else {
            $data['data_afegida'] = date('Y-m-d', strtotime($data['data_afegida']));
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
            error_log($e->getMessage());
            throw new Exception("Error creating film: " . $e->getMessage());
        }
    }

    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare("UPDATE " . static::$table . " SET titol = :titol, director = :director, any_estrena = :any_estrena, duracio = :duracio, sinopsi = :sinopsi, genere = :genere, data_afegida = :data_afegida WHERE id = :id");

        $data['any_estrena'] = date('Y', strtotime($data['any_estrena']));

        if (empty($data['data_afegida']) || $data['data_afegida'] === '1970-01-01') {
            $data['data_afegida'] = date('Y-m-d');
        } else {
            $data['data_afegida'] = date('Y-m-d', strtotime($data['data_afegida']));
        }

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
            error_log($e->getMessage());
            throw new Exception("Error updating film: " . $e->getMessage());
        }
    }

    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id');
        $statement->bindValue(':id', $id);

        try {
            $statement->execute();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception("Error deleting film: " . $e->getMessage());
        }
    }
}
