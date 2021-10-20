<?php
    session_start();
    unset($_SESSION['users']);
    header('Location:../../admin/auth/login.php');
    
?>