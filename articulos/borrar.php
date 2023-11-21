<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $servidor="localhost";
    $username="root";
    $pwBD="";
    $nomBD="bda";
$bd=mysqli_connect($servidor,$username,$pwBD,$nomBD);
$sql="DELETE FROM ARTICULOS where ID_ARTICULO=$id";
$bd->query($sql);
}
include("admin2.php");
exit;
?>
