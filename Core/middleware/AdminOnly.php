<?php

namespace Core\middleware;

class AdminOnly
{
    public function handle()
    {
        if (isset($_SESSION['id_usuario'])) {
            if ($_SESSION['tipo'] !== 'Administrador') {
                header('location: /403');
                exit();
            }
        } else {
            header('location: /login');
            exit();
        }
    }
}
