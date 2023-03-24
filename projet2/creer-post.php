<?php
require_once 'dbh.php';
session_start();
if(!$conn){
	 die("Connection failed: " . mysqli_connect_error());
}
else{
$titre=$_POST['titre'];

$description=$_POST['description'];
$image = $_FILES["imageUpload"]["name"];
$tempname = $_FILES["imageUpload"]["tmp_name"]; 


        $folder = "petition_imgs/".$image; 

        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

            $msg = "Failed to upload image";
        } 
        //code modifier pet
        if (isset($_POST['idmodif'])) {
          $ids=$_POST['idmodif'];
          $text=mysqli_real_escape_string($conn,$description);
          if(isset($image)){
          $update="UPDATE petitions SET titre='$titre',description='$text',image='$image', decision='refus' WHERE id='$ids';";}
          else {
            $update="UPDATE petitions SET titre='$titre',description='$text', decision='refus' WHERE id='$ids';";
          }

          $res=mysqli_query($conn,$update);
          if($res===TRUE){
          $_SESSION['modif_success']="votre pétition a été modifiée avec succès et elle est en attente de vérification par un des admins";
header("Location: creerpetition-final.php");
}
        }
        else{
          $categorie=$_POST['categorie'];
          $user_id=$_SESSION['id']; 
   $requete=$conn->prepare("insert into petitions(titre,categorie,description,image,createur)
		values(?,?,?,?,?)");
   $requete->bind_param("sssss",$titre,$categorie,$description,$image,$user_id);
	$requete->execute();

	
	$requete->close();
	
  $_SESSION['create_success']="votre pétition a été créée avec succès et elle est en attente de vérification par un des admins";
header("Location: creerpetition-final.php");
}



 }