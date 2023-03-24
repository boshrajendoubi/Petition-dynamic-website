<?php
require_once 'dbh.php';
require_once 'session-verif.php';
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$oldpass=$_POST['password'];
$newpass=$_POST['password2'];
$newpass2=$_POST['password3'];


if($_FILES["image"]['error']===UPLOAD_ERR_NO_FILE)
        {
            $filename=$_SESSION['image'];
        }
else{
         $filename = $_FILES["image"]["name"];
        
        

    $tempname = $_FILES["image"]["tmp_name"];  

        $folder = "profile_imgs/".$filename; 

        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

            $msg = "Failed to upload image";
        } 
        }



if(($oldpass==$_SESSION['password'])and($newpass!="")and($newpass==$newpass2) and ($fname!="")and($lname!=""))
{

	$sql="UPDATE users SET firstname='".$fname."',lastname='".$lname."',password='".$newpass."',image='".$filename."' WHERE id='".$_SESSION['id']."'";
	if ($conn->query($sql) === TRUE) {
	  //echo "Record updated successfully";
	  $_SESSION['password']=$newpass;
	  $_SESSION['firstname']=$fname;
	  $_SESSION['lastname']=$lname;
	  $_SESSION['image']=$filename;
	 // $_SESSION['updated']=true;
		header("Location: modifierprofil.php?succes=true");
	

	}
	else {
 	 	echo "Error updating record: " . $conn->error;
		}
}
elseif (($oldpass=="") and($newpass=="") and ($newpass2=="")and($fname!="")and($lname!="")) {
	$sql="UPDATE users SET firstname='".$fname."',lastname='".$lname."',image='".$filename."' WHERE id='".$_SESSION['id']."'";
	if ($conn->query($sql) === TRUE) {
 	 	//echo "Record updated successfully";
 	 	header("Location: modifierprofil.php");
 	 	$_SESSION['firstname']=$fname;
  		$_SESSION['lastname']=$lname;
  		$_SESSION['image']=$filename;
  		$_SESSION['updated']=true;
	}
	else {
  		echo "Error updating record: " . $conn->error;
		}
}
else {
	
	header("Location: modifierprofil.php?failed=true");
}


//$sql = "UPDATE users SET firstname='".$fname."'";
//update nzydou l where ladresse w nkamlou bkeyet les champs 
// if lpost fergha nupdaty b session


$conn->close();
?>

