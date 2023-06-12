<?php
   session_start();
    if ($_SESSION['role'] != 'user') {
        header('Location: index.php');
        exit;
    }
?>
