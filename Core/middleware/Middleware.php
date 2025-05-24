<?php

namespace Core\middleware;

class Middleware
{

    const MAP = [
        'guests' => GuestsOnly::class,
        'auth' => AuthOnly::class,
        'admin' => AdminOnly::class,
        'active' => ActiveOnly::class,
        'userFriendly' => UserFriendlyOnly::class
    ];
}
