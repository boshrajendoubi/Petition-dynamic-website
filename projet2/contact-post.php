<?php
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$email=$_POST['email'];
$objet=$_POST['objet'];
$message=$_POST['message'];
require_once 'dbh.php';
session_start();
if(($prenom=="")||($nom=="")||($email=="")||($objet=="")||($message==""))
{
	header("Location: contact.php?error=champ");
}
else{
$requete=$conn->prepare("insert into contact(prenom,nom,email,objet,message)
		values(?,?,?,?,?)");
	$requete->bind_param("sssss",$prenom,$nom,$email,$objet,$message);
	$requete->execute();

	
	$requete->close();
	header("Location: contact.php");
	}