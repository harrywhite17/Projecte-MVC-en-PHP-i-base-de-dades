<?php

namespace App\Models;

use Core\App;

class Joc
{
    protected static $table = 'jocs';

    public static function getAll()
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . static::$table);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function find($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('SELECT * FROM ' . static::$table . ' WHERE id = :id');
        $statement->execute(['id' => $id]);
        return $statement->fetch(\PDO::FETCH_OBJ);
    }

    public static function create($data)
    {
        $db = App::get('database')->getConnection();
        $data['any_lanzament'] = date('Y', strtotime($data['any_lanzament']));

        // Validate 'valoracio' to ensure it's within the allowed range
        if (!isset($data['valoracio']) || !is_numeric($data['valoracio']) || $data['valoracio'] < 0 || $data['valoracio'] > 10) {
            throw new \InvalidArgumentException('Invalid valoracio value. It must be a number between 0 and 10.');
        }

        // Ensure 'data_afegida' is set to today's date if not provided
        if (empty($data['data_afegida']) || $data['data_afegida'] == '1970-01-01') {
            $data['data_afegida'] = date('Y-m-d');
        } else {
            $data['data_afegida'] = date('Y-m-d', strtotime($data['data_afegida']));
        }

        $statement = $db->prepare('INSERT INTO ' . static::$table . ' (titol, plataforma, any_lanzament, genere, data_afegida, valoracio) VALUES (:titol, :plataforma, :any_lanzament, :genere, :data_afegida, :valoracio)');
        $statement->execute($data);
    }

    public static function update($id, $data)
    {
        $db = App::get('database')->getConnection();
        $data['any_lanzament'] = date('Y', strtotime($data['any_lanzament']));

        // Validate 'valoracio' to ensure it's within the allowed range
        if (!isset($data['valoracio']) || !is_numeric($data['valoracio']) || $data['valoracio'] < 0 || $data['valoracio'] > 10) {
            throw new \InvalidArgumentException('Invalid valoracio value. It must be a number between 0 and 10.');
        }

        // Ensure 'data_afegida' is set to today's date if not provided
        if (empty($data['data_afegida']) || $data['data_afegida'] == '1970-01-01') {
            $data['data_afegida'] = date('Y-m-d');
        } else {
            $data['data_afegida'] = date('Y-m-d', strtotime($data['data_afegida']));
        }

        $statement = $db->prepare('UPDATE ' . static::$table . ' SET titol = :titol, plataforma = :plataforma, any_lanzament = :any_lanzament, genere = :genere, data_afegida = :data_afegida, valoracio = :valoracio WHERE id = :id');
        $data['id'] = $id;
        $statement->execute($data);
    }

    public static function delete($id)
    {
        $db = App::get('database')->getConnection();
        $statement = $db->prepare('DELETE FROM ' . static::$table . ' WHERE id = :id');
        $statement->execute(['id' => $id]);
    }
}
