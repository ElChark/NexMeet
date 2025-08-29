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
        :root {
            --primary-color: #ff5a5f;
            --secondary-color: #00a699;
            --text-color: #484848;
            --light-gray: #f7f7f7;
            --medium-gray: #e4e4e4;
            --dark-gray: #767676;
            --white: #ffffff;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        @page {
            margin: 20mm 15mm;
            /* Margen superior, horizontal, inferior */
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 10pt;
            color: var(--text-color);
            line-height: 1.4;
        }


        #footer {
            position: fixed;
            bottom: -15mm;
            /* Empuja fuera del margen inferior inicial */
            left: 0mm;
            right: 0mm;
            height: 10mm;
            /* Altura del pie de página */
            text-align: center;
            border-top: 1px solid var(--medium-gray);
            font-size: 8pt;
            color: var(--dark-gray);
            padding: 0 15mm;
            /* Para alinear con los márgenes de @page */
        }

        #footer .page-number:before {
            content: "Página " counter(page) " de " counter(pages);
        }

        .report-main-title {
            text-align: center;
            font-size: 18pt;
            color: var(--primary-color);
            margin-bottom: 15px;
            margin-top: 5mm;
            /* Espacio después del header fijo */
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: var(--shadow);
        }

        .data-table th {
            background-color: var(--secondary-color);
            color: var(--white);
            text-align: left;
            padding: 10px 12px;
            font-weight: 500;
            font-size: 9pt;
            border: 1px solid #008a7d;
            /* Un tono más oscuro de secondary */
        }

        .data-table td {
            padding: 8px 12px;
            border: 1px solid var(--medium-gray);
            font-size: 9pt;
        }

        .data-table tr:nth-child(even) td {
            background-color: var(--light-gray);
        }

        .data-table tr:hover td {
            background-color: #e0f2f1;
            /* Un hover sutil */
        }

        .data-table .reactions-column {
            text-align: right;
        }

        .data-table .date-column {
            text-align: center;
            min-width: 80px;
            /* Evita que la fecha se parta mucho */
        }

        .content-cell {
            max-width: 300px;
            /* Ajusta según necesidad */
            word-wrap: break-word;
        }

        .status-publicado {
            color: #388e3c;
            /* Verde */
            font-weight: bold;
        }

        .status-archivado {
            color: #f57c00;
            /* Naranja */
            font-weight: bold;
        }

        .status-borrador {
            color: var(--dark-gray);
        }

        /* Clase para limpiar flotantes */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>

<body>
    <h1>Usuarios registrados en NexMeet</h1>

    <div id="footer">
        <div class="page-number"></div>
        <div>NexMeet &copy; <?php echo date('Y'); ?> - Reporte Interno</div>
    </div>
    <table>
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
