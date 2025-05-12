<?php
use controllers\CommentController;

$query = new CommentController();


$tipo = $_POST['tipo'];
$id = $_POST['event_id'];
$texto = $_POST['comment_text'];

$newComment = $query->insertarComentario($id, $texto, $tipo);

if ($newComment) {
    header('location:'. $newComment);
    exit();
} else {
    header('location: /home');
    exit();
}
