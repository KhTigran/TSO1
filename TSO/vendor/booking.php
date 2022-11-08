<?php

    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $audnum = $_POST['audnum'];
    $date = $_POST['date'];


        mysqli_query($connect, "INSERT INTO `booking` (`Id`, `fio`, `number`, `cabinetnum`, `date`) VALUES (NULL, '$name', '$tel', '$audnum', '$date')");


        header('Location: ../index.html');
?>
