<?php

namespace Core\middleware;

class Middleware{

    const MAP = [
        'guests' => GuestsOnly::class,
        'auth'=>AuthOnly::class
    ];
    

}