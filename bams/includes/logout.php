<?php
    require 'security.php';
    session_destroy();
    unset($_SESSION['email']);
    unset($_SESSION['accno']);
    unset($_SESSION['user']);
    header("location:../index.php");
?>