<?php 
include "../conexion/bdnautica.php";

// Consulta SELECT para obtener todos los patrones
$sql = "SELECT * FROM conductor_patron";
$stmt = $pdo->query($sql);
$tablaPatrones = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Manejar la eliminación
if (isset($_POST['delete'])) {
    $codigoEliminar = $_POST['codigo'];
    $sqlDelete = "DELETE FROM conductor_patron WHERE codigo = :codigo";
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->execute(['codigo' => $codigoEliminar]);
    
    echo "<script>
        alert('Patrón eliminado exitosamente.');
        window.location.href = '../screens/conductores.php';
    </script>";
    exit;
}

// Manejar la inserción/actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $telefono = $_POST['telefono'] ?? null;
    $direccion = $_POST['direccion'] ?? null;
    $editCodigo = $_POST['editCodigo'] ?? null;

    if ($editCodigo) {
        // Actualizar patrón existente
        $sql = "UPDATE conductor_patron SET nombre = :nombre, telefono = :telefono, direccion = :direccion WHERE codigo = :codigo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'codigo' => $editCodigo,
            'nombre' => $nombre,
            'telefono' => $telefono,
            'direccion' => $direccion,
        ]);
    } else {
        // Insertar nuevo patrón
        $sql = "INSERT INTO conductor_patron (codigo, nombre, telefono, direccion) VALUES (:codigo, :nombre, :telefono, :direccion)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'codigo' => $codigo,
            'nombre' => $nombre,
            'telefono' => $telefono,
            'direccion' => $direccion,
        ]);
    }

    echo "<script>
        window.location.href = '../screens/conductores.php';
        alert('Operación exitosa.');
    </script>";
}
?>