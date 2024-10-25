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

        if (!$this->validate($data)) {
            throw new \InvalidArgumentException('Invalid data provided');
        }

        Joc::update($id, $data);
        header('Location: /jocs');
        exit;
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

    private function validate($data)
    {
        return isset($data['titol'], $data['plataforma'], $data['any_lanzament'], $data['genere'], $data['data_afegida'], $data['valoracio']) &&
            is_numeric($data['valoracio']) && $data['valoracio'] >= 0 && $data['valoracio'] <= 10;
    }
}
