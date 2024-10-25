<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Pel·lícula</title>
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
    <nav class="max-w-5xl mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">Projecte Landing Page</a>
        <div class="space-x-4">
            <a href="/" class="text-white hover:text-gray-400">Inici</a>
            <a href="/films" class="text-white hover:text-gray-400">Pel·lícules</a>
            <a href="/jocs" class="text-white hover:text-gray-400">Jocs</a>
        </div>
    </nav>
</header>

<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 my-8">
    <h1 class="text-3xl font-bold mb-4">Edita Pel·lícula</h1>
    <form action="/films/update" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($film->id) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        <div class="mb-4">
            <label for="titol" class="block text-sm font-medium text-gray-700">Títol:</label>
            <input type="text" name="titol" value="<?= htmlspecialchars($film->titol) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label for="director" class="block text-sm font-medium text-gray-700">Director:</label>
            <input type="text" name="director" value="<?= htmlspecialchars($film->director) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label for="any_estrena" class="block text-sm font-medium text-gray-700">Any d'Estrena:</label>
            <input type="date" name="any_estrena" value="<?= htmlspecialchars($film->any_estrena) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label for="duracio" class="block text-sm font-medium text-gray-700">Duració:</label>
            <input type="number" name="duracio" value="<?= htmlspecialchars($film->duracio) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <div class="mb-4">
            <label for="sinopsi" class="block text-sm font-medium text-gray-700">Sinopsi:</label>
            <textarea name="sinopsi" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required><?= htmlspecialchars($film->sinopsi) ?></textarea>
        </div>
        <div class="mb-4">
            <label for="genere" class="block text-sm font-medium text-gray-700">Gènere:</label>
            <input type="text" name="genere" value="<?= htmlspecialchars($film->genere) ?>" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Edita</button>
    </form>
    <a href="/films" class="text-gray-500 hover:underline mt-4 block">Torna</a>
</div>

<footer class="p-4">
    <div class="max-w-5xl mx-auto text-center">
        <p>&copy; 2024 Creat per <span class="font-bold">Harry White</span>. Tots els drets reservats.</p>
    </div>
</footer>

</body>
</html>
