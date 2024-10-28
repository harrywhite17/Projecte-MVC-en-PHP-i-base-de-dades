<!DOCTYPE html>
<html lang="ca">
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
            margin: 0;
            font-family: Arial, sans-serif;
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
            overflow-x: auto;
            max-width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            white-space: nowrap;
            padding: 8px;
        }
        @media (max-width: 375px) {
            header, footer {
                padding: 10px 5px;
            }
            h1 {
                font-size: 1.5rem;
            }
            .text-2xl {
                font-size: 1.5rem;
            }
            .bg-blue-500 {
                padding: 0.5rem 1rem;
            }
            th, td {
                padding: 0.5rem;
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body>

<!-- Header/Navbar -->
<header class="p-4">
    <nav class="max-w-full mx-auto flex flex-col items-center">
        <a href="/" class="text-2xl font-bold">La meva pàgina de projecte</a>
        <div class="space-x-4 mt-2">
            <a href="/" class="text-white hover:text-gray-400">Inici</a>
            <a href="/films" class="text-white hover:text-gray-400">Pel·lícules</a>
            <a href="/jocs" class="text-white hover:text-gray-400">Jocs</a>
        </div>
    </nav>
</header>

<!-- Main Content -->
<div class="max-w-full mx-auto bg-white shadow-md rounded-lg p-4 my-8">
    <h1 class="text-3xl font-bold mb-4">Jocs</h1>
    <a href="/jocs/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Afegir Nou Joc</a>
    <div class="table-container mt-4">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-4 text-left">ID</th>
                <th class="py-3 px-4 text-left">Títol</th>
                <th class="py-3 px-4 text-left">Plataforma</th>
                <th class="py-3 px-4 text-left">Any de Llançament</th>
                <th class="py-3 px-4 text-left">Gènere</th>
                <th class="py-3 px-4 text-left">Data d'Afegit</th>
                <th class="py-3 px-4 text-left">Valoració</th>
                <th class="py-3 px-4 text-left">Accions</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
            <?php if (empty($jocs)): ?>
            <tr>
                <td colspan="8" class="text-center py-4">No hi ha jocs disponibles.</td>
            </tr>
            <?php else: ?>
                <?php foreach ($jocs as $joc): ?>
            <tr class="border-b hover:bg-gray-100">
                <td class="py-3 px-4"><?= htmlspecialchars($joc['id']) ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($joc['titol']) ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($joc['plataforma']) ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($joc['any_lanzament']) ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($joc['genere']) ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($joc['data_afegit']) ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($joc['valoracio']) ?></td>
                <td class="py-3 px-4">
                    <a href="/jocs/edit/<?= htmlspecialchars($joc['id']) ?>" class="text-blue-600 hover:underline">Edita</a>
                    <a href="/jocs/delete/<?= htmlspecialchars($joc['id']) ?>" class="text-red-600 hover:underline ml-4">Elimina</a>
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
    <div class="max-w-full mx-auto text-center">
        <p>&copy; 2024 Creat per <span class="font-bold">Harry White</span>. Tots els drets reservats.</p>
    </div>
</footer>

</body>
</html>
