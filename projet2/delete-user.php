<?php
require_once 'dbh.php';
$id=$_POST['id'];
$sql="DELETE from users where id='".$id."'";
$res=mysqli_query($conn,$sql);
header("Location: users.php");