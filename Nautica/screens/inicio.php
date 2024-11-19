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
    <div class="relative min-h-screen bg-[url('../img/bg.jpg')] bg-center bg-cover px-8 py-8">
        <!-- Capa de sombreado -->
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>

        <!-- Contenido -->
        <nav class="relative z-10 flex justify-center mt-12">
            <div class="text-white text-6xl font-semibold" style="font-family: 'Poppins', sans-serif;">
                CLUB NAUTICO
            </div>
        </nav>

        <div class="relative z-10 text-white mt-12 text-center max-w-3xl mx-auto">
            <h1 class="text-6xl font-semibold leading-normal">Tu aventura en el mar, planificada al detalle.</h1>
            <strong class="text-xl">Agenda tu próxima travesía en barco, ¡el mar te espera!</strong>
        </div>

        <!-- Menú de botones debajo del título -->
        <div class="relative z-10 flex justify-center mt-12 space-x-4">
            <a href="../screens/registro.php"
                class="block px-6 py-3 bg-black text-white rounded-lg hover:bg-opacity-70 duration-300 hover:text-yellow-300 border-2 border-transparent hover:border-yellow-300">Agendar
                Viaje</a>
            <a href="../screens/conductores.php"
                class="block px-6 py-3 bg-black text-white rounded-lg hover:bg-opacity-70 duration-300 hover:text-yellow-300 border-2 border-transparent hover:border-yellow-300">Conductores</a>
            <a href="../screens/historialViajes.php"
                class="block px-6 py-3 bg-black text-white rounded-lg hover:bg-opacity-70 duration-300 hover:text-yellow-300 border-2 border-transparent hover:border-yellow-300">
                Historial Viajes</a>
        </div>

        <br>
    </div>
    </div>
</body>

</html>