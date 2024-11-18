<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <title>Agendar Viaje en Barco</title>
</head>

<body>
    <form id="registro-form" action="../scripts/registroViajes.php" method="post">
        <div class="relative min-h-screen bg-cover bg-center flex items-center justify-center"
            style="background-image: url('../img/registro.jpg');">
            <!-- Contenedor con el formulario y el texto -->
            <div class="relative flex flex-col md:flex-row m-6 bg-white shadow-2xl rounded-xl w-full max-w-3xl">
                <!-- Lado izquierdo con eslogan -->
                <div class="flex flex-col justify-center p-6 md:p-10 bg-[#0f1e50] text-white rounded-l-xl w-1/2">
                    <h1 class="text-3xl font-bold mb-3">¡Bienvenido a Bordo!</h1>
                    <p class="text-md font-light">
                        Planea y agenda tus viajes en barco con facilidad y comodidad.
                        Vive la experiencia de navegación sin preocupaciones.
                    </p>
                </div>

                <!-- Lado derecho con el formulario -->
                <div class="flex flex-col justify-center p-6 md:p-10 w-1/2">
                    <span class="mb-2 text-2xl font-bold text-[#0f1e50]">Agendar Viaje</span>
                    <span class="font-light text-gray-400 mb-4 text-sm">
                        Por favor, ingresa los datos correctos para tu viaje.
                    </span>

                    <div class="py-1">
                        <span class="mb-1 text-sm">Número de Viaje</span>
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="numero" id="numero" required />
                    </div>

                    <div class="py-1">
                        <span class="mb-1 text-sm">Matrícula del Barco:</span>
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="matribarco" id="matribarco" required />
                    </div>

                    <div class="py-1">
                        <span class="mb-1 text-sm">Código de Patrón/Conductor:</span>
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="codpatron" id="codpatron" required />
                    </div>

                    <div class="py-1">
                        <span class="mb-1 text-sm">Fecha del Viaje:</span>
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="fecha" id="fecha" required placeholder="ejemplo: 20-07-2024" />
                    </div>

                    <div class="py-1">
                        <span class="mb-1 text-sm">Hora del Viaje:</span>
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="hora" id="hora" required placeholder="ejemplo: 03:00 PM" />
                    </div>

                    <div class="py-1">
                        <span class="mb-1 text-sm">Destino del Viaje:</span>
                        <input type="text"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="destino" id="destino" required />
                    </div>

                    <button
                        class="w-full bg-[#0f1e50] text-white p-2 rounded-lg mt-3 hover:bg-blue-400 hover:text-black hover:border hover:border-gray-300">
                        Registrar
                    </button>
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
    }, 10); // Pequeño retraso para asegurar que los datos sean enviados antes del reseteo
});
</script>

</html>