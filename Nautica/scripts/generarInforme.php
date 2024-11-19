<?php
include "../conexion/bdnautica.php";
require '../vendor/autoload.php';

use Dompdf\Dompdf;

$viaje_id = $_POST['viaje_id'];

// Consulta para obtener el viaje específico con el nombre del barco
$sql = "SELECT v.numero,v.matribarco, v.codpatron , v.fecha, v.hora, v.destino, b.nombre_barco 
        FROM viaje v
        INNER JOIN barco b ON v.matribarco = b.matricula
        WHERE v.numero = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$viaje_id]);
$viaje = $stmt->fetch(PDO::FETCH_ASSOC);

if ($viaje) {
   
    $html = "
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #004085;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 14px;
        }
        .info-table th, .info-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .info-table th {
            background-color: #004085;
            color: white;
            font-weight: bold;
        }
        .info-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #555;
        }
    </style>

    <div class='title'>Informe de Viaje</div>
    
    <table class='info-table'>
        <tr>
            <th>N° de Viaje</th>
            <td>{$viaje['numero']}</td>
        </tr>
        <tr>
            <th>Matrícula de Barco</th>
            <td>{$viaje['matribarco']}</td>
        </tr>
        <tr>
            <th>Código de Patrón</th>
            <td>{$viaje['codpatron']}</td>
        </tr>
        <tr>
            <th>Nombre del Barco</th>
            <td>{$viaje['nombre_barco']}</td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td>{$viaje['fecha']}</td>
        </tr>
        <tr>
            <th>Hora</th>
            <td>{$viaje['hora']}</td>
        </tr>
        <tr>
            <th>Destino</th>
            <td>{$viaje['destino']}</td>
        </tr>
    </table>

    <div class='footer'>
        Informe generado automáticamente | Empresa Náutica
    </div>";

    // Cargar el HTML en DOMPDF
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');


    $dompdf->render();

    // Descargar el PDF
    $dompdf->stream("Informe_Viaje_{$viaje['numero']}.pdf", array("Attachment" => 1));
} else {
    echo "No se encontró el viaje seleccionado.";
}
?>