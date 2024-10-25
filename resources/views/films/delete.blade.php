<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Film</title>
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

<!-- Header/Navbar -->
<header class="p-4">
    <nav class="max-w-5xl mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">Project Landing Page</a>
        <div class="space-x-4">
            <a href="/" class="text-white hover:text-gray-400">Inici</a>
            <a href="/films" class="text-white hover:text-gray-400">Pel·lícules</a>
            <a href="/jocs" class="text-white hover:text-gray-400">Jocs</a>
        </div>
    </nav>
</header>

<!-- Main Content -->
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 my-8">
    <h1 class="text-2xl font-bold mb-4">Borrar pelicules</h1>
    <p>Estas segur que vols borrar la pelicula "<?= htmlspecialchars($film->titol) ?>"?</p>
    <p class="text-red-500 text-sm mt-2">Aquesta acció no es pot desfer.</p>
    <form action="/films/destroy/<?= htmlspecialchars($film->id) ?>" method="POST">
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Si,borrar</button>
        <a href="/films" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 ml-4">Cancela</a>
    </form>
</div>

<!-- Footer -->
<footer class="p-4">
    <div class="max-w-5xl mx-auto text-center">
        <p>&copy; 2024 Creat per <span class="font-bold">Harry White</span>. Tots els drets reservats.</p>
    </div>
</footer>

</body>
</html>
