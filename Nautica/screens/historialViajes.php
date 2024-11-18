<?php  
include "../scripts/consultaViajes.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Patrones de Barcos</title>
</head>

<body class="bg-gradient-to-br from-white via-blue-800 to-white min-h-screen text-white flex flex-col">

    <!-- Contenedor Principal -->
    <div class="container mx-auto px-4 py-8">
        <!-- Título y Botón -->
        <div class="flex items-center justify-between mb-6 bg-blue-800 rounded-t-xl p-6">
            <h1 class="text-2xl font-bold">Patrones de Barcos</h1>
            <button id="openModal"
                class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-lg focus:ring-4 focus:ring-blue-300 font-medium text-sm">
                Agregar Patrón
            </button>
        </div>

        <!-- Tabla -->
        <div class="bg-sky-300 rounded-xl shadow-lg p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-black">
                    <thead class="text-xs uppercase bg-sky-600">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-medium">N° DE VIAJE</th>
                            <th scope="col" class="px-6 py-3 font-medium">MATRÍCULA DE BARCO</th>
                            <th scope="col" class="px-6 py-3 font-medium">CÓDIGO DE PATRÓN</th>
                            <th scope="col" class="px-6 py-3 font-medium">FECHA</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center">HORA</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center">DESTINO</th>
                            <th scope="col" class="px-6 py-3 font-medium text-center">ACCIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tablaViajes as $viajes): ?>
                        <tr class="border-b border-blue-700 hover:bg-blue-700">
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
                                        class="px-3 py-2 text-sm text-white bg-green-500 hover:bg-green-600 rounded-lg focus:ring-4 focus:ring-green-300">
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