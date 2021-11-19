<?php

try{
    $conn = mysqli_connect("localhost", "root", "", "php_login_database");
}catch(PDOException $e){
    die("Conected failed " . $e->getMessage());
}
