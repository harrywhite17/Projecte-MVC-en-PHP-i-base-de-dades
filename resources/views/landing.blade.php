<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        header{

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
<div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg p-10 my-8">
    <!-- Header Section -->
    <h1 class="mb-8 text-center">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-2">La meva pàgina de projecte</h1>
        <hr>
        <p class="text-lg text-gray-600"></p>
    </h1>

    <!-- Description Section -->
    <section class="text-center mb-6">
        <p class="text-gray-700 text-xl leading-relaxed">
            Benvingut a la meva pàgina del projecte! Aquí trobaràs la meva col·lecció de films i jocs.
            Utilitza els botons a continuació per explorar o gestionar cada col·lecció.
        </p>
    </section>

    <!-- Films Explanation -->
    <section class="mb-8">
        <h2 class="text-2xl font-bold text-center mb-4">Pel·lícules</h2>
        <p class="text-gray-700 text-lg leading-relaxed text-center">
            La meva taula de pel·lícules inclou una selecció de films amb detalls com el títol, el director, l'any d'estrena, la durada, la sinopsi i el gènere. Aquí pots veure totes les pel·lícules disponibles, afegir-ne de noves, o editar les existents.
        </p>
    </section>

    <!-- Games Explanation -->
    <section class="mb-8">
        <h2 class="text-2xl font-bold text-center mb-4">Jocs</h2>
        <p class="text-gray-700 text-lg leading-relaxed text-center">
            La meva taula de jocs presenta una varietat de jocs amb informació com el títol, el desenvolupador, l'any de llançament, el gènere i una breu descripció. Explora els jocs disponibles i gestiona la teva col·lecció.
        </p>
    </section>

</div>

<!-- Footer -->
<footer class="p-4">
    <div class="max-w-5xl mx-auto text-center">
        <p>&copy; 2024 Creat per <span class="font-bold">Harry White</span>. Tots els drets reservats.</p>
    </div>
</footer>

</body>
</html>
