<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>La meva pàgina de projecte</title>
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

        header {
            background-color: #3d54a3;
            color: #f7fafc;
        }

        h1 {
            color: #f7fafc;
            text-align: center;
        }

        footer {
            background-color: #3d54a3;
            color: #f7fafc;
            margin-top: auto;
            font-size: 0.8rem;
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
<header class="p-2">
    <nav class="max-w-lg mx-auto flex flex-col items-center">
        <a href="/" class="text-xl font-bold text-center">La meva pàgina de projecte</a>
        <div class="space-x-4 mt-1 flex flex-wrap justify-center">
            <a href="/" class="text-white hover:text-gray-400 text-sm px-2">Inici</a>
            <a href="/films" class="text-white hover:text-gray-400 text-sm px-2">Pel·lícules</a>
            <a href="/jocs" class="text-white hover:text-gray-400 text-sm px-2">Jocs</a>
        </div>
    </nav>
</header>

<!-- Main Content -->
<div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-2 my-2 flex-grow">
    <h1 class="mb-2 text-center text-3xl font-extrabold text-gray-800">La meva pàgina de projecte</h1>
    <hr class="mb-2">
    <section class="text-center mb-2">
        <p class="text-gray-700 text-sm leading-relaxed px-2">
            Benvingut a la meva pàgina del projecte! Aquí trobaràs la meva col·lecció de films i jocs.
            Utilitza els botons a continuació per explorar o gestionar cada col·lecció.
        </p>
    </section>

    <!-- Films Explanation -->
    <section class="mb-2 px-2">
        <h2 class="text-lg font-bold text-center mb-1">Pel·lícules</h2>
        <p class="text-gray-700 text-sm leading-relaxed text-center">
            La meva taula de pel·lícules inclou una selecció de films amb detalls com el títol, el director, l'any d'estrena, la durada, la sinopsi i el gènere. Aquí pots veure totes les pel·lícules disponibles, afegir-ne de noves, o editar les existents.
        </p>
    </section>

    <!-- Games Explanation -->
    <section class="mb-2 px-2">
        <h2 class="text-lg font-bold text-center mb-1">Jocs</h2>
        <p class="text-gray-700 text-sm leading-relaxed text-center">
            La meva taula de jocs presenta una varietat de jocs amb informació com el títol, el desenvolupador, l'any de llançament, el gènere i una breu descripció. Explora els jocs disponibles i gestiona la teva col·lecció.
        </p>
    </section>
</div>

<!-- Footer -->
<footer class="p-2">
    <div class="max-w-lg mx-auto text-center">
        <p>&copy; 2024 Creat per <span class="font-bold">Harry White</span>. Tots els drets reservats.</p>
    </div>
</footer>

</body>
</html>
