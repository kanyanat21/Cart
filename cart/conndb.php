<meta charset="utf-8">
<?php
$host = "127.0.0.1";
$urs = "root";
$pwd = "12345678";
$dbName = "pharmacy";

$conn = mysqli_connect($host, $urs, $pwd) or die ("เชื่อมต่อฐานข้อมูลไม่ได้") ;
mysqli_select_db($conn, $dbName) ;
mysqli_query($conn, "set names utf8");
?>

