<?php include "../scripts/consultaViajes.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON -->
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Patrones de Barcos</title>
</head>

<body
    class="relative bg-[url('../img/bg.jpg')] bg-center bg-cover px-8 py-8 min-h-screen text-gray-900 flex flex-col justify-center">

    <!-- Contenedor Principal -->
    <div class="container mx-auto px-4 py-8 max-w-screen-xl">

        <!-- Título de la página -->
        <div class="flex items-center justify-between mb-8 bg-blue-800 text-white rounded-xl p-6 shadow-xl">
            <h1 class="text-4xl font-semibold tracking-tight" style="font-family: 'Poppins', sans-serif;">⛵ Historial
                de Viajes</h1>
        </div>

        <!-- Tabla -->
        <div class="bg-white rounded-xl shadow-xl p-8 bg-opacity-60">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-700" style="font-family: 'Poppins', sans-serif;">
                    <thead class="text-xs uppercase bg-indigo-600 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium">N° DE VIAJE</th>
                            <th scope="col" class="px-6 py-3 font-medium">MATRÍCULA DE BARCO</th>
                            <th scope="col" class="px-6 py-3 font-medium">CÓDIGO DE PATRÓN</th>
                            <th scope="col" class="px-6 py-3 font-medium">FECHA</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center w-32">HORA</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center">DESTINO</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center">ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tablaViajes as $viajes): ?>
                        <tr class="border-b border-indigo-300 bg-indigo-50 hover:bg-indigo-100 transition-colors">
                            <td class="px-6 py-4"><?php echo htmlspecialchars($viajes['numero']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($viajes['matribarco']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($viajes['codpatron']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($viajes['fecha']); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo htmlspecialchars($viajes['hora']); ?></td>
                            <td class="px-6 py-4 text-center"><?php echo htmlspecialchars($viajes['destino']); ?></td>
                            <!-- Botón Generar Informe -->
                            <td class="px-6 py-4 text-center">
                                <form action="../scripts/generarInforme.php" method="POST">
                                    <input type="hidden" name="viaje_id"
                                        value="<?php echo htmlspecialchars($viajes['numero']); ?>">
                                    <button type="submit"
                                        class="px-4 py-2 text-sm text-white bg-teal-600 hover:bg-teal-700 rounded-lg shadow-md focus:ring-4 focus:ring-teal-300 transition-all duration-300">
                                        Generar Informe
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>