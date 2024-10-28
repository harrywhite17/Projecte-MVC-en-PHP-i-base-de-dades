<?php

namespace App\Controllers;

use App\Models\Joc;

class JocController
{
    public function index()
    {
        $jocs = Joc::getAll();
        return view('jocs/index', ['jocs' => $jocs]);
    }

    public function create()
    {
        return view('jocs/create');
    }

    public function store()
    {
        $data = [
            'titol' => $_POST['titol'],
            'plataforma' => $_POST['plataforma'],
            'any_lanzament' => $_POST['any_lanzament'],
            'genere' => $_POST['genere'],
            'data_afegida' => $_POST['data_afegida'],
            'valoracio' => $_POST['valoracio']
        ];

        // Log the data being passed
        error_log('Store data: ' . print_r($data, true));

        // Ensure the date fields are in the correct format
        $data['any_lanzament'] = date('Y-m-d', strtotime($data['any_lanzament']));
        $data['data_afegida'] = date('Y-m-d', strtotime($data['data_afegida']));

        // Log the formatted data
        error_log('Formatted data: ' . print_r($data, true));

        if (!$this->validate($data)) {
            throw new \InvalidArgumentException('Invalid data provided');
        }

        Joc::create($data);
        header('Location: /jocs');
        exit;
    }

    public function edit($id)
    {
        $joc = Joc::find($id);
        if (!$joc) {
            require 'resources/views/errors/404.blade.php';
            return;
        }
        return view('jocs/edit', ['joc' => $joc]);
    }

    public function update($id)
    {
        $data = [
            'titol' => $_POST['titol'],
            'plataforma' => $_POST['plataforma'],
            'any_lanzament' => $_POST['any_lanzament'],
            'genere' => $_POST['genere'],
            'data_afegida' => $_POST['data_afegida'],
            'valoracio' => $_POST['valoracio']
        ];

        // Log the data being passed
        error_log('Update data: ' . print_r($data, true));

        // Ensure the date fields are in the correct format
        $data['any_lanzament'] = date('Y-m-d', strtotime($data['any_lanzament']));
        $data['data_afegida'] = date('Y-m-d', strtotime($data['data_afegida']));

        // Log the formatted data
        error_log('Formatted data: ' . print_r($data, true));

        if (!$this->validate($data)) {
            throw new \InvalidArgumentException('Invalid data provided');
        }

        Joc::update($id, $data);
        header('Location: /jocs');
        exit;
    }

    private function validate($data)
    {
        $isValid = isset($data['titol'], $data['plataforma'], $data['any_lanzament'], $data['genere'], $data['data_afegida'], $data['valoracio']) &&
            is_numeric($data['valoracio']) && $data['valoracio'] >= 0 && $data['valoracio'] <= 10 &&
            $this->validateDate($data['any_lanzament']) && $this->validateDate($data['data_afegida']);

        // Log the validation result
        error_log('Validation result: ' . ($isValid ? 'valid' : 'invalid'));

        return $isValid;
    }

    private function validateDate($date, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        $isValid = $d && $d->format($format) === $date;

        // Log the date validation result
        error_log('Date validation for ' . $date . ': ' . ($isValid ? 'valid' : 'invalid'));

        return $isValid;
    }

    public function delete($id)
    {
        $joc = Joc::find($id);
        if (!$joc) {
            require 'resources/views/errors/404.blade.php';
            return;
        }
        return view('jocs/delete', ['joc' => $joc]);
    }

    public function destroy($id)
    {
        if (!$id) {
            throw new \RuntimeException('No id provided');
        }

        Joc::delete($id);
        header('Location: /jocs');
        exit();
    }
}