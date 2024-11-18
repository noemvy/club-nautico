<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLUB NAUTICA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="relative min-h-screen bg-[url('../img/portada.jpg')] bg-center bg-cover px-8 py-8">
        <!-- Capa de sombreado -->
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>

        <!-- Contenido -->
        <nav class="relative z-10 flex items-center">
            <div class="flex-1 text-white text-4xl font-semibold" style="font-family: 'Poppins', sans-serif;">
                CLUB NAUTICO
            </div>
            <div
                class="flex-1 text-center border-2 border-white rounded-full mx-auto px-10 py-2 bg-white   hover:border-transparent hover:text-black duration-300">
                <ul class="flex justify-center">
                    <li class="list-none inline-block px-8">
                        <a href="inicio.php"
                            class="no-underline font-medium px-10 py-2 hover:bg-white text-black duration-300 rounded-full">Inicio</a>
                    </li>
                    <li class="list-none inline-block px-8">
                        <a href="conductores.php"
                            class="no-underline font-medium px-10 py-2 hover:bg-white text-black duration-300 rounded-full">Conductores</a>
                    </li>
                    <li class="list-none inline-block px-8">
                        <a href="historialViajes.php"
                            class="no-underline font-medium px-10 py-2 hover:bg-white text-black duration-300 rounded-full">Viajes</a>
                    </li>
                    <li class="list-none inline-block px-8">
                        <a href="contacto.php"
                            class="no-underline font-medium px-10 py-2 hover:bg-white text-black duration-300 rounded-full">Contáctanos</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="relative z-10 text-white mt-36 max-w-xl">
            <h1 class="text-6xl font-semibold leading-normal">Tu aventura en el mar, planificada al detalle.</h1>
            <strong class="text-xl">Agenda tu próxima travesía en barco, ¡el mar te espera!</strong>
        </div>
        <br>
        <div class="relative">
            <a href="registro.php"
                class="bg-yellow-300 rounded-3xl py-3 px-8 font-medium inline-block mr-4 hover:bg-transparent hover:border-yellow-300 hover:text-white duration-300 hover:border border-transparent">Agendar
                Viaje</a>
        </div>
    </div>
</body>

</html>