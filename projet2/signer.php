<?php
require_once 'dbh.php';
$email=$_POST['email'];
$id_pet=$_POST['id_pet'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$comment=$_POST['comment'];
$vote=$_POST['vote'];




//requete pour verifier si ce mail a deja signé cette pétition
$sql="SELECT * from signature where idPetition='".$id_pet."' and mail='".$email."'";
$res=mysqli_query($conn,$sql);
if (mysqli_num_rows($res)>0)
{
	header("Location: affpeti.php?id=$id_pet&signed=false");
}
else {
	if(!$comment)
	{
		// insertion
		$requete=$conn->prepare("insert into signature(idPetition,mail,nomUser,prenomUser)
		values(?,?,?,?)");
	$requete->bind_param("ssss",$id_pet,$email,$nom,$prenom,);
	$requete->execute();
	$requete->close();

	//recuperer nbr de signatures et ajouter 1
	if($vote=="pour"){
	$sql1="SELECT nbSignatures from petitions where id='".$id_pet."'";
	$res1=mysqli_query($conn,$sql1);
	$resultat=mysqli_fetch_assoc($res1);
	$nbr=$resultat['nbSignatures'];
	$nbr=$nbr+1;

	//update nbr signatures
	$sql2="UPDATE petitions set nbSignatures='".$nbr."' where id='".$id_pet."'";
	$res2=mysqli_query($conn,$sql2);
	}
	else{

		$sql1="SELECT nbOpp from petitions where id='".$id_pet."'";
	$res1=mysqli_query($conn,$sql1);
	$resultat=mysqli_fetch_assoc($res1);
	$nbr=$resultat['nbOpp'];
	$nbr=$nbr+1;

	//update nbr signatures
	$sql2="UPDATE petitions set nbOpp='".$nbr."' where id='".$id_pet."'";
	$res2=mysqli_query($conn,$sql2);
	}

	//header("Location: index.php");
	}
	else{
	$requete=$conn->prepare("insert into signature(idPetition,mail,nomUser,prenomUser,commentaire)
		values(?,?,?,?,?)");
	$requete->bind_param("sssss",$id_pet,$email,$nom,$prenom,$comment);
	$requete->execute();
	$requete->close();

	//recuperer nbr de signatures et ajouter 1
	if($vote=="pour"){
	$sql1="SELECT nbSignatures from petitions where id='".$id_pet."'";
	$res1=mysqli_query($conn,$sql1);
	$resultat=mysqli_fetch_assoc($res1);
	$nbr=$resultat['nbSignatures'];
	$nbr=$nbr+1;

	//update nbr signatures
	$sql2="UPDATE petitions set nbSignatures='".$nbr."' where id='".$id_pet."'";
	$res2=mysqli_query($conn,$sql2);
	}
	else{

		$sql1="SELECT nbOpp from petitions where id='".$id_pet."'";
	$res1=mysqli_query($conn,$sql1);
	$resultat=mysqli_fetch_assoc($res1);
	$nbr=$resultat['nbOpp'];
	$nbr=$nbr+1;

	//update nbr signatures
	$sql2="UPDATE petitions set nbOpp='".$nbr."' where id='".$id_pet."'";
	$res2=mysqli_query($conn,$sql2);
	}


	//header("Location: index.php");
	}
	/*
	essai avec notifications
    */
	$sql11='select * from petitions where id="'.$id_pet.'"';
	$res11=mysqli_query($conn,$sql11);
	$row11=mysqli_fetch_assoc($res11);
	$createur=$row11['createur'];
	$id=$row11['id'];
	$type="signature";
	$message=" a signé votre pétition";
	$name=$prenom." ".$nom;
	$requete=$conn->prepare("insert into notifications(name,type,message,idowner,idpetition)
		values(?,?,?,?,?)");
	$requete->bind_param("sssss",$name,$type,$message,$createur,$id);
	$requete->execute();
	if($comment)
	{
		$type="commentaire";
	$message=" a commenté votre pétition";
	$requete=$conn->prepare("insert into notifications(name,type,message,idowner,idpetition)
		values(?,?,?,?,?)");
	$requete->bind_param("sssss",$name,$type,$message,$createur,$id);
	$requete->execute();
	}

	
	$requete->close();
    /* end of notifications*/
    header("Location: index.php");
}