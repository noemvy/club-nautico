<?php 
$host = "localhost";
$dbname = "bdnautico";
$username = "parcial3";
$password = "1234";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

}catch (PDOException $e){
    echo "error de conexion: ".$e->getMessage();
}
?>