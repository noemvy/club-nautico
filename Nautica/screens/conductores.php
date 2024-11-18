<?php  
include "../scripts/conductores.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Patrones de Barcos</title>
</head>

<body class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white">

    <div class="flex justify-center py-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full max-w-7xl bg-white rounded-lg">

            <!-- Título y barra de búsqueda -->
            <div class="flex justify-between items-center p-4 bg-blue-800 rounded-t-lg text-white">
                <h1 class="text-xl font-semibold">Patrones de Barcos</h1>

                <!-- Barra de búsqueda con ícono de lupa -->
                <label for="table-search" class="sr-only">Buscar</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nombre..." oninput="filterTable()">
                </div>

                <!-- Botón Agregar Patrón -->
                <button id="openModal"
                    class="px-6 py-2 ml-4 text-white bg-blue-600 hover:bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-300 font-medium text-sm">Agregar
                    Patrón</button>
            </div>

            <!-- Tabla de patrones de barcos -->
            <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400" id="patronesTable">
                <thead class="text-xs text-gray-700 uppercase bg-blue-800 dark:bg-blue-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Código</th>
                        <th scope="col" class="px-6 py-3">Nombre</th>
                        <th scope="col" class="px-6 py-3">Teléfono</th>
                        <th scope="col" class="px-6 py-3">Dirección</th>
                        <th scope="col" class="px-6 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tablaPatrones as $patron): ?>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4"><?php echo htmlspecialchars($patron['codigo']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($patron['nombre']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($patron['telefono']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($patron['direccion']); ?></td>
                        <td class="px-6 py-4">
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium"
                                data-id="<?php echo $patron['codigo']; ?>"
                                data-nombre="<?php echo htmlspecialchars($patron['nombre']); ?>"
                                data-telefono="<?php echo htmlspecialchars($patron['telefono']); ?>"
                                data-direccion="<?php echo htmlspecialchars($patron['direccion']); ?>"
                                onclick="openEditModal(this)">Editar</a> |
                            <a href="#" class="text-red-600 hover:text-red-800 font-medium"
                                onclick="confirmarEliminacion('<?php echo $patron['codigo']; ?>', '<?php echo htmlspecialchars($patron['nombre']); ?>')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Modal para registrar o editar patrón -->
            <div id="modal"
                class="fixed inset-0 flex items-center justify-center z-50 hidden bg-gray-900 bg-opacity-50">
                <div class="bg-white rounded-lg w-96 p-6">
                    <h2 id="modalTitle" class="text-xl font-semibold text-gray-900 mb-4">Registrar Patrón de Barco</h2>

                    <!-- Formulario para agregar/editar patrón -->
                    <form action="../scripts/conductores.php" method="post">
                        <input type="hidden" id="editCodigo" name="editCodigo" value="">

                        <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
                        <input type="text" id="codigo" name="codigo"
                            class="block w-full p-2 mt-1 border border-gray-300 text-black rounded-lg" required>

                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" id="nombre" name="nombre"
                                class="block w-full p-2 mt-1 border border-gray-300 text-black rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input type="text" id="telefono" name="telefono"
                                class="block w-full p-2 mt-1 border border-gray-300 text-black rounded-lg" required>
                        </div>

                        <div class="mb-4">
                            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                            <input type="text" id="direccion" name="direccion"
                                class="block w-full p-2 mt-1 border border-gray-300 text-black rounded-lg" required>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <button type="button" id="closeModal"
                                class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg">Cancelar</button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Guardar</button>
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
    </div>

    <script>
    // Abre el modal
    document.getElementById('openModal').addEventListener('click', function() {
        document.getElementById('modal').classList.remove('hidden');
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

    // Filtra la tabla
    function filterTable() {
        const searchTerm = document.getElementById("table-search-users").value.toLowerCase();
        const table = document.getElementById("patronesTable");
        const rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName("td");
            let nombre = cells[1].textContent.toLowerCase();
            if (nombre.includes(searchTerm)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

    // Abre el modal de edición
    function openEditModal(element) {
        const codigo = element.getAttribute('data-id');
        const nombre = element.getAttribute('data-nombre');
        const telefono = element.getAttribute('data-telefono');
        const direccion = element.getAttribute('data-direccion');

        document.getElementById('modalTitle').textContent = "Editar Patrón de Barco";
        document.getElementById('editCodigo').value = codigo;
        document.getElementById('codigo').value = codigo;
        document.getElementById('nombre').value = nombre;
        document.getElementById('telefono').value = telefono;
        document.getElementById('direccion').value = direccion;

        document.getElementById('modal').classList.remove('hidden');
    }

    // Función para confirmar eliminación
    function confirmarEliminacion(codigo, nombre) {
        if (confirm(`¿Estás segura de que deseas eliminar al patrón "${nombre}"?`)) {
            document.getElementById('deleteCode').value = codigo;
            document.getElementById('deleteForm').submit();
        }
    }
    </script>

</body>

</html>