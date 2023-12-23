<?php
    session_start();
    include_once '../config.php';
    include_once '../view/header.php';
    include_once '../model/my-account.php';
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch ($page) {
            case 'my-account':
                $page = 'my-account';
                break;
            case 'saved':
                $page = 'saved';
                break;
            case 'logout':
                $page = 'logout';
                break;
            default:
                $page = 'my-account';
                break;
        }
    }else{
        $page = 'my-account';
    }
    include_once '../view/'.$page.'.php';
    include_once '../view/footer.php';
?>