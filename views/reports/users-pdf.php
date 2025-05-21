<?php
ob_start();
require_once './views/partials/load.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <style>
            .data-table {
        width: 100%;
        border-collapse: collapse;
    }

    .data-table th {
        text-align: left;
        padding: 12px 15px;
        border-bottom: 1px solid #e4e6eb;
        color: var(--medium-gray);
        font-weight: 500;
    }

    .data-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #e4e6eb;
    }

    .data-table tr:last-child td {
        border-bottom: none;
    }

    .data-table tr:hover {
        background-color: #f9f9f9;
    }
    </style>
</head>

<body>
    <table class="data-table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Email</th>
                <th>Fecha registro</th>
                <th>Último acceso</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <div>
                                <div style="font-weight: 500;"><?php echo $usuario['nombre'] ?></div>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $usuario['email'] ?></td>
                    <td><?php echo $usuario['fecha_reigstro'] ?></td>
                    <td>Hace 2 horas</td>
                    <td>

                        <span class="status-badge <?php echo $usuario['estado'] == 1 ? 'active' : 'inactive' ?>"><?php echo $usuario['estado'] == 1 ? 'Activo' : 'Inactivo' ?></span>
                    </td>
                </tr>
            <?php } ?>


        </tbody>
    </table>
</body>

</html>

<?php $html = ob_get_clean() ?>


<?php
require 'vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'Portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('ejemplo.pdf', ['Attachment' => false]);
