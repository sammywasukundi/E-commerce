<?php
    try{
        $pdo=new PDO('mysql: host=localhost;dbname=resto_management','root','');
    }
    catch(PDOException $e){
        die("Connection failed". $e->getMessage());
    }
?>