<!-- resources/views/jocs/edit.blade.php -->

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Joc</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: darkgrey;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('/assets/background.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        header, footer {
            background-color: #3d54a3;
            color: #f7fafc;
        }
        footer {
            margin-top: auto;
        }
        footer a {
            color: #a0aec0;
        }
        footer a:hover {
            color: #f7fafc;
        }
    </style>
</head>
<body>

<header class="p-4">
    <nav class="max-w-5xl mx-auto flex flex-col items-center">
        <h1 class="text-2xl font-bold mb-2">Projecte Landing Page</h1>
        <div class="space-x-4">
            <a href="/" class="text-white hover:text-gray-400">Inici</a>
            <a href="/films" class="text-white hover:text-gray-400">Pel·lícules</a>
            <a href="/jocs" class="text-white hover:text-gray-400">Jocs</a>
        </div>
    </nav>
</header>

<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 my-8">
    <h1 class="text-3xl font-bold mb-4">Edita Joc</h1>
    <form action="/jocs/update/<?= htmlspecialchars($joc->id) ?>" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($joc->id) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        <div class="mb-4">
            <label for="titol" class="block text-sm font-medium text-gray-700">Introdueix el títol del joc:</label>
            <input type="text" name="titol" value="<?= htmlspecialchars($joc->titol) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label for="plataforma" class="block text-sm font-medium text-gray-700">Introdueix la plataforma:</label>
            <input type="text" name="plataforma" value="<?= htmlspecialchars($joc->plataforma) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label for="any_lanzament" class="block text-sm font-medium text-gray-700">Any de Llançament:</label>
            <input type="date" name="any_lanzament" value="<?= htmlspecialchars(date('Y-m-d', strtotime($joc->any_lanzament))) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label for="genere" class="block text-sm font-medium text-gray-700">Introdueix el gènere:</label>
            <input type="text" name="genere" value="<?= htmlspecialchars($joc->genere) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label for="data_afegit" class="block text-sm font-medium text-gray-700">Data d'Afegit:</label>
            <input type="date" name="data_afegit" value="<?= htmlspecialchars(date('Y-m-d', strtotime($joc->data_afegit))) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label for="valoracio" class="block text-sm font-medium text-gray-700">Valoració:</label>
            <input type="number" name="valoracio" value="<?= htmlspecialchars($joc->valoracio) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required min="0" max="10" step="0.1">
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edita</button>
    </form>
    <a href="/jocs" class="text-gray-500 hover:underline mt-4 block">Torna</a>
</div>

<footer class="p-4">
    <div class="max-w-5xl mx-auto text-center">
        <p>&copy; 2024 Creat per <span class="font-bold">Harry White</span>. Tots els drets reservats.</p>
    </div>
</footer>

</body>
</html>