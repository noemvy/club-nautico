<?php include "../scripts/registroViajes.php" ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Favicon -->
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Agendar Viaje en Barco</title>
</head>

<body>
    <form id="registro-form" action="../scripts/registroViajes.php" method="post"
        style="font-family: 'Poppins', sans-serif;">
        <!-- component -->
        <div class="bg-gray-100 flex justify-center items-center h-screen">
            <!-- Left: Image -->
            <div class="w-1/2 h-screen hidden lg:block">
                <img src="../img/registro.jpg" alt="Placeholder Image" class="object-cover w-full h-full">
            </div>
            <!-- REGISTRO -->
            <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
                <h1 class="text-2xl font-semibold mb-4">Ingresa los datos correctos de tu viaje</h1>
                <!-- NUMERO DE VIAJE -->
                <div class="mb-4">
                    <span class="mb-1 text-sm">Número de Viaje</span>
                    <input type="text"
                        class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                        name="numero" id="numero" required />
                </div>
                <!-- MATRICULA DE BARCO-->
                <div class="mb-4">
                    <label for="matribarco">Matrícula de Barco</label>
                    <select name="matribarco" id="matribarco"
                        class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                        <option value="">Selecciona una matrícula</option>
                        <?php foreach ($matriculaBarco as $matribarco): ?>
                        <option value="<?= htmlspecialchars($matribarco['matricula']) ?>">
                            <?= htmlspecialchars($matribarco['matricula']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- CODIGO DE PATRON -->
                <div class="mb-4">
                    <label for="codpatron">Código de Patrón</label>
                    <select name="codpatron" id="codpatron"
                        class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500">
                        <option value="">Seleccione un código</option>
                        <?php foreach ($codigoPatron as $codpatron): ?>
                        <option value="<?= htmlspecialchars($codpatron['codigo']) ?>">
                            <?= htmlspecialchars($codpatron['codigo']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- FECHA -->
                <div class="mb-4">
                    <span class="mb-1 text-sm">Fecha:</span>
                    <input type="text"
                        class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                        name="fecha" id="fecha" required placeholder="ejemplo: 20-07-2024" />
                </div>
                <!-- HORA -->
                <div class="mb-4">
                    <span class="mb-1 text-sm">Hora:</span>
                    <input type="text"
                        class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                        name="hora" id="hora" placeholder="ejemplo: 03:00 PM" required />
                </div>
                <!-- DESTINO -->
                <div class="mb-4">
                    <span class="mb-1 text-sm">Destino:</span>
                    <input type="text"
                        class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                        name="destino" id="destino" required />
                </div>

                <!-- Login Button -->
                <button
                    class="w-full bg-[#0f1e50] text-white p-2 rounded-lg mt-3 hover:bg-blue-400 hover:text-black hover:border hover:border-gray-300">
                    Registrar
                </button>
    </form>
    </div>
    </div>
    </div>
    </form>
</body>

<script>
document.getElementById('registro-form').addEventListener('submit', function() {
    // Limpiar campos después de enviar el formulario
    setTimeout(() => {
        this.reset();
    }, 10);
});
</script>

</html>