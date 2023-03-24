<?php
require_once 'dbh.php';
if (isset($_POST['approuver'])) {
    $sql='UPDATE petitions SET decision="accepte" where id="'.$_POST['id'].'"';
    $res=mysqli_query($conn,$sql);
    /*
	essai avec notifications
    */
	$sql1='select * from petitions where id="'.$_POST['id'].'"';
	$res1=mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($res1);
	$createur=$row1['createur'];
	$id=$_POST['id'];
	$type="approuved";
	$message="un admin a approuvé votre pétition";

	$requete=$conn->prepare("insert into notifications(type,message,idowner,idpetition)
		values(?,?,?,?)");
	$requete->bind_param("ssss",$type,$message,$createur,$id);
	$requete->execute();

	
	$requete->close();
    /* end of notifications*/
    header("Location: pending.php");
}
if (isset($_POST['delete'])) {
	$sql='DELETE from petitions  where id="'.$_POST['id'].'"';
	$res=mysqli_query($conn,$sql);
    header("Location: pending.php");
}