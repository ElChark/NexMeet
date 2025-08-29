<?php

namespace Core\middleware;

class ActiveOnly
{
    public function handle()
    {
        if($_SESSION['estado'] === 0)
        {
            header('location: /403');
            exit();
        }
    }
}