<?php
require '../vendor/autoload.php';
require_once '../config/app.php'; 
require_once '../model/MainModel.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use model\MainModel;

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

$token = bin2hex(random_bytes(16)); // Token seguro
$link = APP_URL . "confirmar.php?token=$token";

$user = $data['user'];
$evento = $data['evento'];
$correo = $data['correo'];

$conn = new MainModel();

$conn->ejecutarConsulta("INSERT INTO Confirmacion (id_usuario, id_evento, token) VALUES ($user, $evento, '$token')");

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'santiago.troconis@udem.edu';
    $mail->Password = 'dmgf znaz bvcy bvud';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('noreply@NexMeet.com', 'Eventos NexMeet');
    $mail->addAddress($correo);

    $mail->isHTML(true);
    $mail->Subject = 'Confirma tu asistencia al evento';
    $mail->Body = "
        <h2>¡Gracias por registrarte!</h2>
        <p>Para confirmar tu asistencia al evento, por favor haz clic en el botón de abajo:</p>
        <a href='$link' style='padding: 10px 20px; background: #0088cc; color: white; text-decoration: none; border-radius: 5px;'>Confirmar asistencia</a>
        ";

    $mail->send();
    $alerta = [
        "tipo" => "success",
        "titulo" => "El correo ha sido enviado",
        "texto" => "Dirigite a tu correo para confirmar tu asistencia",
        "icono" => "success"
    ];
    echo json_encode($alerta);
    exit();
} catch (Exception $e) {

    $alerta = [
        "tipo" => "error",
        "titulo" => "Error",
        "texto" => "Error al enviar correo: {$mail->ErrorInfo}",
        "icono" => "error"
    ];
    echo json_encode($alerta);
    exit();
}
