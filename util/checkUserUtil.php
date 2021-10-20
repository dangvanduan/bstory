<?php
    if(isset($_SESSION['admin'])){
        
    } else {
        header("Location: ../auth/login.php");
    }
?>