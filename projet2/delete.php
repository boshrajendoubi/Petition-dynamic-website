<?php
require_once 'dbh.php';
if(isset($_POST['envoie']))
{
	$id=$_POST['id_pet'];
	$sql="DELETE FROM petitions where id='".$id."'";
	$res=mysqli_query($conn,$sql);
    header("Location: liste-test.php");
}
if (isset($_POST['affiche']))
{
	$id=$_POST['id_pet'];
	header("Location: afficher.php?id=$id");
}