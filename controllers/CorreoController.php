<?php 
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Suponiendo que ya tienes $userId y $eventId definidos

$token = bin2hex(random_bytes(16)); // Token seguro
$link = "https://tusitio.com/confirmar.php?token=$token";

// Guardar token temporal en la base de datos
$conn->query("INSERT INTO event_confirmations (user_id, event_id, token) VALUES ($userId, $eventId, '$token')");

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // o tu servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'tu_correo@gmail.com';
    $mail->Password = 'tu_app_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('noreply@tusitio.com', 'Eventos NexMeet');
    $mail->addAddress($emailDelUsuario); // correo del usuario

    $mail->isHTML(true);
    $mail->Subject = 'Confirma tu asistencia al evento';
    $mail->Body = "
        <h2>¡Gracias por registrarte!</h2>
        <p>Para confirmar tu asistencia al evento, por favor haz clic en el botón de abajo:</p>
        <a href='$link' style='padding: 10px 20px; background: #0088cc; color: white; text-decoration: none; border-radius: 5px;'>Confirmar asistencia</a>
    ";

    $mail->send();
    echo "Correo de confirmación enviado.";
} catch (Exception $e) {
    echo "Error al enviar correo: {$mail->ErrorInfo}";
}