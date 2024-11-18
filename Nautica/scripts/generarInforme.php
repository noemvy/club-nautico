<?php 
include "../conexion/bdnautica.php";
require '../vendor/autoload.php';

use Dompdf\Dompdf;


// Crear contenido HTML para el PDF
$html = "
<h1>Informe de Viajes de Barcos</h1>
<table border='1' cellpadding='10' cellspacing='0'>
    <thead>
        <tr>
            <th>N° de Viaje</th>
            <th>Matrícula de Barco</th>
            <th>Código de Patrón/Conductor</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Destino</th>
        </tr>
    </thead>
    <tbody>";

// Recorrer los datos y agregarlos al HTML
foreach ($tablaViajes as $viaje) {
    $html .= "<tr>
        <td>{$viaje['numero']}</td>
        <td>{$viaje['matribarco']}</td>
        <td>{$viaje['codpatron']}</td>
        <td>{$viaje['fecha']}</td>
        <td>{$viaje['hora']}</td>
        <td>{$viaje['destino']}</td>
    </tr>";
}

$html .= "
    </tbody>
</table>";

// Cargar el HTML en DOMPDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// Opcional: configurar el tamaño de página y la orientación
$dompdf->setPaper('A4', 'landscape');

// Renderizar el PDF
$dompdf->render();

// Descargar el PDF
$dompdf->stream("Informe_Viajes_Barcos.pdf", array("Attachment" => 1));
?>