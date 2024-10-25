<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jocs</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: darkgrey;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0; /* Remove default margin */
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
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            table-layout: auto;
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
    <h1 class="text-3xl font-bold mb-4">Jocs</h1>
    <a href="/jocs/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Afegir Nou Joc</a>
    <div class="table-container mt-4">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Titol</th>
                <th class="py-3 px-6 text-left">Plataforma</th>
                <th class="py-3 px-6 text-left">Any Lanzament</th>
                <th class="py-3 px-6 text-left">Genere</th>
                <th class="py-3 px-6 text-left">Data Afegida</th>
                <th class="py-3 px-6 text-left">Valoració</th>
                <th class="py-3 px-6 text-center">Accions</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            <?php if (empty($jocs)): ?>
            <tr>
                <td colspan="8" class="py-3 px-6 text-center">No hi ha jocs disponibles.</td>
            </tr>
            <?php else: ?>
                <?php foreach ($jocs as $joc): ?>
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6"><?= $joc['id'] ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($joc['titol']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($joc['plataforma']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($joc['any_lanzament']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($joc['genere']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($joc['data_afegida']) ?></td>
                <td class="py-3 px-6"><?= htmlspecialchars($joc['valoracio']) ?></td>
                <td class="py-3 px-6 text-center">
                    <a href="/jocs/edit/<?= $joc['id'] ?>" class="text-blue-500 hover:text-blue-700 mr-4">Editar</a>
                    <a href="/jocs/delete/<?= $joc['id'] ?>" class="text-red-500 hover:text-red-700">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Footer -->
<footer class="p-4">
    <div class="max-w-5xl mx-auto text-center">
        <p>&copy; 2024 Creat per <span class="font-bold">Harry White</span>. Tots els drets reservats.</p>
    </div>
</footer>

</body>
</html>
