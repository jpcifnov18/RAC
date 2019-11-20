<?php 
    session_start();
    
    if(!isset($_SESSION['Id_personal'])){
        if ($_SESSION['Id_personal']==0){
            header("Location: index.php");
            exit();
        }
    }else{
        if ($_SESSION['Id_cargo']==4){
            header("Location: Principal2.php");
            exit();
        }
    }
?>
