<?php
    $dsn = 'mysql:host=localhost;dbname=scribesdeskdatabase';
    $username = 'Scribe';
    $password = 'w3t_br0sh-32';
    /*
    $username = 'Scribe';
    $password = 'w3t_br0sh-32';
    $username = 'root';
    $password = 'p2Dw1dw3b-gam3';
    */

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>