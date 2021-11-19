<?php
// Se inica la sesion
    session_start();
// Se remueve la sesion
    session_unset();
// Se destruye la sesion
    session_destroy();
// Se redirecciona al login
    header("Location: login.php");