<?php

namespace Core\middleware;

class GuestsOnly
{
    public function handle()
    {
        if(isset($_SESSION['id_usuario']))
        {
            header('location: /home');
            exit();
        }   
    }
}