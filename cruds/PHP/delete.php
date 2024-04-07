<?php
session_start();

include("php/config.php");

$id = $_GET['id'];
$query = mysqli_query($conn,"DELETE FROM all_users WHERE id = '$id'");

if($query){
    header("Location: home.php");
}else{
    echo "Failed!";
 }

?>
