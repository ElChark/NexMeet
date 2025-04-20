<?php

namespace Core\middleware;

class AuthOnly
{
    public function handle()
    {
        if(!isset($_SESSION['id_usuario']))
        {
            header('location: /login');
            exit();
        }
    }
}