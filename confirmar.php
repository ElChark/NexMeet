<?php
require_once './model/MainModel.php';
use model\MainModel;

$token = $_GET['token'] ?? '';

if ($token) {
    $conn = new MainModel();

    $stmt = $conn->ejecutarConsulta("SELECT * FROM Confirmacion WHERE token = '$token' AND confirmado = 0");
    $row = $stmt->fetch();

    if ($row) {
        $conn->ejecutarConsulta("UPDATE Confirmacion SET confirmado = 1 WHERE token = '$token'");

        $userId = $row['id_usuario'];
        $eventId = $row['id_evento'];

        $conn->ejecutarConsulta("INSERT INTO Usuarios_eventos (id_usuario, id_evento) VALUES ($userId, $eventId)");

        echo "<h1>¡Asistencia confirmada! <br> Ya puedes cerrar esta pagina. Te vemos en el evento</h1>";
    } else {
        echo "<h1>Token inválido o ya confirmado.</h1>";
    }
}