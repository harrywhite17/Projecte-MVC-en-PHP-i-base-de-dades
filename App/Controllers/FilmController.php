<?php

namespace App\Controllers;

use App\Models\Film;

class FilmController
{
    public function index()
    {
        $films = Film::getAll();
        return view('films/index', ['films' => $films]);
    }

    public function create()
    {
        return view('films/create');
    }

    public function store()
    {
        $data = [
            'titol' => $_POST['titol'],
            'director' => $_POST['director'],
            'any_estrena' => $_POST['any_estrena'],
            'duracio' => $_POST['duracio'],
            'sinopsi' => $_POST['sinopsi'],
            'genere' => $_POST['genere']
        ];

        // Validate data
        if (!$this->validate($data)) {
            throw new \InvalidArgumentException('Invalid data provided');
        }

        Film::create($data);
        header('Location: /films');
        exit;
    }

    public function edit($id)
    {
        $film = Film::find($id);
        if (!$film) {
            require 'resources/views/errors/404.blade.php';
            return;
        }
        return view('films/edit', ['film' => $film]);
    }

    public function update($id)
    {
        $data = [
            'titol' => $_POST['titol'],
            'director' => $_POST['director'],
            'any_estrena' => $_POST['any_estrena'],
            'duracio' => $_POST['duracio'],
            'sinopsi' => $_POST['sinopsi'],
            'genere' => $_POST['genere'],
            'data_afegida' => $_POST['data_afegida']
        ];

        if (!$this->validate($data)) {
            throw new \InvalidArgumentException('Invalid data provided');
        }

        Film::update($id, $data);
        header('Location: /films');
        exit;
    }

    public function delete($id)
    {
        $film = Film::find($id);
        if (!$film) {
            require 'resources/views/errors/404.blade.php';
            return;
        }
        return view('films/delete', ['film' => $film]);
    }

    public function destroy($id)
    {
        if (!$id) {
            throw new \RuntimeException('No id provided');
        }

        Film::delete($id);
        header('Location: /films');
        exit();
    }

    private function validate($data)
    {
        // Add your validation logic here
        return isset($data['titol'], $data['director'], $data['any_estrena'], $data['duracio'], $data['sinopsi'], $data['genere']);
    }
}