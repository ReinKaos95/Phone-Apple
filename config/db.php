<?php 


$host="localhost";
$user="root";
$pass="";
$db="phonestore";


try {
    $conn = mysqli_connect($host, $user, $pass, $db);
} catch (Exception $e) {
    echo $e->getMessage();
}


 ?>