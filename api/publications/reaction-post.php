<?php
require_once '../../controllers/PublicacionesController.php';


use controllers\PublicacionesController;

$newPost = new PublicacionesController();

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

$postId = $data['postId'];
$accion = $data['accion'];

if ($accion === 'Like') {
    $reactionCreated = $newPost->handleReaction($postId, $accion);
} elseif ($accion === 'QuitarLike') {
    $reactionCreated = $newPost->handleReaction($postId, $accion);
}

if ($reactionCreated) {
    echo json_encode([
        "status" => "ok"
    ]);
    exit();
} else {
    echo json_encode([
        "status" => "error"
    ]);
    exit();
}
