<?php
    if(isset($_SESSION['user'])){
        session_destroy();
        echo "<script>window.location.href = '".$url."home';</script>";
    }   
    else{
        echo "<script>window.location.href = '".$url."home';</script>";
    }

?>
