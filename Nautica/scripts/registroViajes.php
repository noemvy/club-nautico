<?php
include "../conexion/bdnautica.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Captura los datos enviados por el formulario
    $numero = $_POST['numero'] ?? null;
    $matribarco = $_POST['matribarco'] ?? null;
    $codpatron = $_POST['codpatron'] ?? null;
    $fecha = $_POST['fecha'] ?? null;
    $hora = $_POST['hora'] ?? null;
    $destino = $_POST['destino'] ?? null;

    // Verifica si los campos no están vacíos
    if ($numero && $matribarco && $codpatron && $fecha && $hora && $destino) {
        try {
            // Inserta los datos en la base de datos
            $insert = "INSERT INTO viaje (numero, matribarco, codpatron, fecha, hora, destino) 
                    VALUES (:numero, :matribarco, :codpatron, :fecha, :hora, :destino)";
            $stmt = $pdo->prepare($insert);
            $stmt->execute([
                'numero' => $numero,
                'matribarco' => $matribarco,
                'codpatron' => $codpatron,
                'fecha' => $fecha,
                'hora' => $hora,
                'destino' => $destino
            ]);

            // Redirige al formulario con alerta de éxito
            echo "<script>
                window.location.href = '../screens/registro.php';
                alert('Registro Exitoso.');
            </script>";
            
        } catch (PDOException $e) {
            // Redirige con alerta de error
            echo "<script>
                window.location.href = '../screens/registro.php';
                alert('Hubo un error al registrar. Inténtalo nuevamente.');
            </script>";
        }
    }
    
}
?>