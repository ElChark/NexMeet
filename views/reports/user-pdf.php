<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Actividad - <?php echo htmlspecialchars($userInfo['nombre'] ?? 'Usuario '); ?></title>
    <style>
        :root {
            --primary-color: #ff5a5f;
            --secondary-color: #00a699;
            --text-color: #484848;
            --light-gray: #f7f7f7;
            --medium-gray: #e4e4e4;
            --dark-gray: #767676;
            --white: #ffffff;
            --shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
        }

        @page {
            margin: 25mm 15mm 20mm 15mm;
        }

        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 10pt;
            color: var(--text-color);
            line-height: 1.5;
        }

        #header {
            position: fixed;
            top: -25mm;
            left: 0mm;
            right: 0mm;
            height: 20mm;
            background-color: var(--white);
            border-bottom: 1.5px solid var(--primary-color);
            padding: 0 15mm;
            box-sizing: border-box;
        }

        #header .logo {
            float: left;
            max-height: 16mm;
            margin-top: 2mm;
        }

        #header .report-info {
            float: right;
            text-align: right;
            font-size: 9pt;
            color: var(--dark-gray);
            margin-top: 2mm;
        }

        #header .report-info h1 {
            margin: 0 0 2px 0;
            font-size: 11pt;
            font-weight: bold;
            color: var(--primary-color);
        }

        #header .report-info p {
            margin: 0;
            font-size: 8pt;
        }

        #footer {
            position: fixed;
            bottom: -20mm;
            left: 0mm;
            right: 0mm;
            height: 15mm;
            border-top: 1px solid var(--medium-gray);
            font-size: 8pt;
            color: var(--dark-gray);
            padding: 5mm 15mm 0 15mm;
            box-sizing: border-box;
        }

        #footer .page-number {
            float: right;
        }

        #footer .company-info {
            float: left;
        }

        #footer .page-number:after {
            content: "Página " counter(page) " de " counter(pages);
        }

        .user-info-box {
            background-color: var(--light-gray);
            padding: 12px 15px;
            margin-bottom: 10mm;
            border-left: 4px solid var(--secondary-color);
            border-radius: 0 4px 4px 0;
        }

        .user-info-box h2 {
            margin-top: 0;
            margin-bottom: 8px;
            font-size: 14pt;
            color: var(--secondary-color);
        }

        .user-info-box p {
            margin: 3px 0;
            font-size: 10pt;
        }

        .user-info-box strong {
            color: var(--text-color);
        }

        .content-section {
            margin-bottom: 10mm;
        }

        .content-section h3 {
            font-size: 13pt;
            color: var(--primary-color);
            border-bottom: 1px solid var(--medium-gray);
            padding-bottom: 5px;
            margin-bottom: 5mm;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: var(--shadow);
            border: 1px solid var(--medium-gray);
        }

        .data-table th {
            background-color: var(--secondary-color);
            color: var(--white);
            text-align: left;
            padding: 9px 11px;
            font-weight: 500;
            font-size: 9pt;
            border: 1px solid #008a7d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-table td {
            padding: 8px 11px;
            border: 1px solid var(--medium-gray);
            font-size: 8.5pt;
            vertical-align: top;
        }

        .data-table tr:nth-child(even) td {
            background-color: #fdfdfd;
        }

        .data-table .date-column {
            text-align: center;
            white-space: nowrap;
        }

        .data-table .title-column {
            font-weight: 500;
        }

        .data-table .description-column {
            white-space: pre-wrap;
        }

        .no-data {
            padding: 15px;
            text-align: center;
            color: var(--dark-gray);
            background-color: var(--light-gray);
            border: 1px dashed var(--medium-gray);
            border-radius: 4px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>

<body>

    <div id="footer" class="clearfix">
        <div class="company-info">NexMeet &copy; <?php echo date('Y'); ?> - Reporte Individual</div>
        <div class="page-number"></div>
    </div>

    <?php if (!empty($userInfo)): ?>
        <div class="user-info-box">
            <h2><?php echo htmlspecialchars($userInfo['nombre']); ?></h2>
            <p><strong>ID de Usuario:</strong> <?php echo htmlspecialchars($userInfo['id_usuario']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($userInfo['email']); ?></p>
        </div>
    <?php endif; ?>

    <div class="content-section">
        <h3>Publicaciones Realizadas</h3>
        <?php if (!empty($posts)): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Contenido</th>
                        <th class="date-column">Fecha de Publicación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td class="title-column"><?php echo htmlspecialchars($post['titulo']); ?></td>
                            <td class="description-column"><?php echo htmlspecialchars($post['contenido']); ?></td>
                            <td class="date-column"><?php echo htmlspecialchars(date("d/m/Y", strtotime($post['fecha_publicacion']))); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">Este usuario no tiene publicaciones registradas.</p>
        <?php endif; ?>
    </div>

    <div class="content-section">
        <h3>Eventos Creados/Asociados</h3>
        <?php if (!empty($events)): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Título del Evento</th>
                        <th>Descripción</th>
                        <th>Lugar</th>
                        <th class="date-column">Fecha del Evento</th>
                        <th>Categoría</th>
                        <th class="date-column">Fecha Publicación Evento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td class="title-column"><?php echo htmlspecialchars($event['titulo']); ?></td>
                            <td class="description-column"><?php echo htmlspecialchars($event['descripcion']); ?></td>
                            <td><?php echo htmlspecialchars($event['nombreLugar']); ?></td>
                            <td class="date-column"><?php echo htmlspecialchars(date("d/m/Y", strtotime($event['fecha_evento']))); ?></td>
                            <td><?php echo htmlspecialchars($event['categoria']); ?></td>
                            <td class="date-column"><?php echo htmlspecialchars(date("d/m/Y H:i", strtotime($event['fecha_publicacion']))); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">Este usuario no tiene eventos registrados.</p>
        <?php endif; ?>
    </div>

</body>

</html>
<?php
$html = ob_get_clean();

require_once 'vendor/autoload.php'; 

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('defaultFont', 'Helvetica');

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream($userInfo['nombre'], ['Attachment' => false]);
exit;
