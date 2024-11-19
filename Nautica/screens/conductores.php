<?php  
include "../scripts/conductores.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON -->
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <title>Patrones de Barcos</title>
</head>

<body
    class=" relative bg-[url('../img/bg.jpg')] bg-center bg-cover px-8 py-8 text-gray-900 min-h-screen flex items-center justify-center">


    <div class="w-full max-w-6xl bg-white shadow-2xl rounded-lg p-6 bg-opacity-20">

        <!-- Encabezado -->
        <div class="flex justify-between  items-center pb-4 border-b-2 border-blue-700">
            <h1 class="text-3xl font-semibold text-blue-800" style=" font-family: 'Poppins' , sans-serif;"">
                <strong>PATRONES</strong>
            </h1>

            <!-- Barra de búsqueda -->
            <div class=" relative w-1/3">
                <input type="text" id="table-search-users"
                    class="w-full pl-10 pr-4 py-2 border-2 rounded-lg focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-400"
                    placeholder="Buscar por nombre..." style="font-family: 'Poppins', sans-serif;"
                    oninput="filterTable()">
                <svg class="w-5 h-5 text-gray-500 absolute left-3 top-2.5" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.15 6.5a7.5 7.5 0 016.35 10.15z" />
                </svg>
        </div>

        <!-- Botón para agregar patrón -->
        <button id="openModal"
            class="px-6 py-2 ml-4 bg-indigo-900 text-white font-semibold rounded-full shadow-lg hover:bg-blue-700 transition duration-300"
            style="font-family: 'Poppins', sans-serif;">
            + Agregar Patrón
        </button>
    </div>

    <!-- Tabla de patrones de barcos -->
    <div class="mt-6">
        <table id="patronesTable" class="w-full text-sm text-left table-auto shadow-lg rounded-lg"
            style="font-family: 'Poppins', sans-serif;">
            <thead>
                <tr class="text-white bg-blue-600">
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Teléfono</th>
                    <th scope="col" class="px-6 py-3">Dirección</th>
                    <th scope="col" class="px-6 py-3">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tablaPatrones as $patron): ?>
                <tr class="bg-white border-b hover:bg-blue-50 transition duration-200">
                    <td class="px-6 py-4"><?php echo htmlspecialchars($patron['codigo']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($patron['nombre']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($patron['telefono']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($patron['direccion']); ?></td>
                    <td class="px-6 py-4 flex space-x-4">
                        <button class="px-6 py-2 ml-4 bg-green-500 text-white font-semibold rounded-full
                                shadow-lg hover:bg-green-800 transition duration-300"
                            data-id="<?php echo $patron['codigo']; ?>"
                            data-nombre="<?php echo htmlspecialchars($patron['nombre']); ?>"
                            data-telefono="<?php echo htmlspecialchars($patron['telefono']); ?>"
                            data-direccion="<?php echo htmlspecialchars($patron['direccion']); ?>"
                            onclick="openEditModal(this)">Editar</button>
                        <button class="px-6 py-2 ml-4 bg-red-500 text-white font-semibold rounded-full
                                shadow-lg hover:bg-red-700 transition duration-300"
                            onclick="confirmarEliminacion('<?php echo $patron['codigo']; ?>', '<?php echo htmlspecialchars($patron['nombre']); ?>')">Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para registrar o editar patrón -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50"
        style="font-family: 'Poppins', sans-serif;">
        <div
            class="bg-white rounded-lg w-96 p-8 shadow-xl transform transition duration-500 ease-in-out scale-90 opacity-0">
            <h2 id="modalTitle" class="text-2xl font-semibold text-blue-700 mb-4">Registrar Patrón de Barco</h2>

            <!-- Formulario para agregar/editar patrón -->
            <form id="patronForm" action="../scripts/conductores.php" method="post">
                <input type="hidden" id="editCodigo" name="editCodigo">

                <div class="mb-6">
                    <label for="codigo" class="block text-sm font-medium text-gray-600">Código</label>
                    <input type="text" id="codigo" name="codigo"
                        class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-6">
                    <label for="nombre" class="block text-sm font-medium text-gray-600">Nombre</label>
                    <input type="text" id="nombre" name="nombre"
                        class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-6">
                    <label for="telefono" class="block text-sm font-medium text-gray-600">Teléfono</label>
                    <input type="text" id="telefono" name="telefono"
                        class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-6">
                    <label for="direccion" class="block text-sm font-medium text-gray-600">Dirección</label>
                    <input type="text" id="direccion" name="direccion"
                        class="w-full p-3 border-2 border-gray-300 rounded-lg focus:ring focus:ring-blue-200" required>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" id="closeModal"
                        class="px-4 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Formulario oculto para eliminar -->
    <form id="deleteForm" action="../scripts/conductores.php" method="post" style="display: none;">
        <input type="hidden" name="delete" value="1">
        <input type="hidden" name="codigo" id="deleteCode">
    </form>

    </div>

    <script>
    // Abre el modal de registro o edición
    document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
        const modal = document.querySelector('#modal > div');
        modal.classList.remove('scale-90', 'opacity-0');
        modal.classList.add('scale-100', 'opacity-100');
        document.getElementById('modalTitle').textContent = "Registrar Patrón de Barco";
        document.getElementById('editCodigo').value = "";
        document.getElementById('codigo').value = "";
        document.getElementById('nombre').value = "";
        document.getElementById('telefono').value = "";
        document.getElementById('direccion').value = "";
    });

    // Cierra el modal
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('modal').classList.add('hidden');
    });

    // Abre el modal en modo de edición y carga los datos del patrón
    function openEditModal(button) {
        document.getElementById('modal').classList.remove('hidden');
        const modal = document.querySelector('#modal > div');
        modal.classList.remove('scale-90', 'opacity-0');
        modal.classList.add('scale-100', 'opacity-100');
        document.getElementById('modalTitle').textContent = "Editar Patrón de Barco";
        document.getElementById('editCodigo').value = button.dataset.id;
        document.getElementById('codigo').value = button.dataset.id;
        document.getElementById('nombre').value = button.dataset.nombre;
        document.getElementById('telefono').value = button.dataset.telefono;
        document.getElementById('direccion').value = button.dataset.direccion;
    }

    // Eliminar patrón de barco
    function confirmarEliminacion(codigo, nombre) {
        if (confirm(`¿Estás seguro de que quieres eliminar al patrón ${nombre}?`)) {
            document.getElementById('deleteCode').value = codigo;
            document.getElementById('deleteForm').submit();
        }
    }

    // Filtrar la tabla según el texto de búsqueda
    function filterTable() {
        const input = document.getElementById('table-search-users');
        const filter = input.value.toUpperCase();
        const table = document.getElementById("patronesTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName("td");
            let match = false;
            for (let j = 0; j < cells.length; j++) {
                if (cells[j].textContent.toUpperCase().indexOf(filter) > -1) {
                    match = true;
                }
            }
            rows[i].style.display = match ? "" : "none";
        }
    }
    </script>

</body>

</html>