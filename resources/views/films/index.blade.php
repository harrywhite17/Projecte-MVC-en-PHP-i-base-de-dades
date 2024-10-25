<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
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
        <a href="/" class="text-2xl font-bold">La meva pàgina de projecte</a>
        <div class="space-x-4">
            <a href="/" class="text-white hover:text-gray-400">Inici</a>
            <a href="/films" class="text-white hover:text-gray-400">Pel·lícules</a>
            <a href="/jocs" class="text-white hover:text-gray-400">Jocs</a>
        </div>
    </nav>
</header>

<!-- Main Content -->
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 my-8">
    <h1 class="text-3xl font-bold mb-4">Pel·lícules</h1>
    <a href="/films/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Afegir Nova Pel·lícula</a>
    <table class="min-w-full mt-4 bg-white border border-gray-300">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">ID</th>
            <th class="py-3 px-6 text-left">Títol</th>
            <th class="py-3 px-6 text-left">Director</th>
            <th class="py-3 px-6 text-left">Any Estrena</th>
            <th class="py-3 px-6 text-left">Durada</th>
            <th class="py-3 px-6 text-left">Sinopsi</th>
            <th class="py-3 px-6 text-left">Gènere</th>
            <th class="py-3 px-6 text-center">Accions</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        <?php if (empty($films)): ?>
        <tr>
            <td colspan="8" class="py-3 px-6 text-center">No hi ha pel·lícules disponibles.</td>
        </tr>
        <?php else: ?>
            <?php foreach ($films as $film): ?>
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6"><?=$film['id'] ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($film['titol']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($film['director']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($film['any_estrena']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($film['duracio']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($film['sinopsi']) ?></td>
            <td class="py-3 px-6"><?= htmlspecialchars($film['genere']) ?></td>
            <td class="py-3 px-6 text-center">
                <a href="/films/edit/<?= $film['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">Editar</a>
                <a href="/films/delete/<?= $film['id'] ?>" class="text-red-500 hover:text-red-700">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<footer class="p-4">
    <div class="max-w-5xl mx-auto text-center">
        <p>&copy; 2024 Creat per <span class="font-bold">Harry White</span>. Tots els drets reservats.</p>
    </div>
</footer>

</body>
</html>
