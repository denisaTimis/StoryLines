<?php
    $host = 'localhost';
    $db='storylines';
    $user='root';
    $password='';
    $charset='utf8mb4';

    $dns= "mysql:host=$host;dbname=$db;charset=$charset";

    try{
        $pdo=new PDO($dns,$user,$password);
    }catch(PDOException $e )
    {
        throw new PDOException($e->getMessage());
    }
?>