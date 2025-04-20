<?php
require_once '../../config/app.php'; 


session_name(APP_SESSION_NAME);
session_start(); 
session_destroy(); 
header("Location: /"); 
exit();
