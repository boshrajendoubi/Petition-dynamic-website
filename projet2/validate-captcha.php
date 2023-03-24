<?php


if (count($_POST)>0)
{
    if(empty($_POST['prenom']))
    {
        echo '<h4> please enter your first name</h4>';
    }
    if(empty($_POST['email']))
    {
        echo '<h4> please enter your email </h4>';
    }

    if(empty($_POST['g-recaptcha-response']))
    {
        echo '<h4> please solve reCAPTCHA </h4>';
    }

    if((isset($_POST['g-recaptcha-response']) ) && (!empty($_POST['g-recaptcha-response'])))
    {
        $secret='6Lc4-b4fAAAAAKefh-j6wv68Dfp_wZtmBBJbr5xQ';
        $response= file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret'.$secret.'&response='.$_POST['g-recaptcha-response']);
        $data=json_decode($response);

        if($data->success)
        {
            
include_once 'dbh.php';
 

$firstname=$_POST['prenom'];
$lastname=$_POST['nom'];
$email=$_POST['email'];
$psw=$_POST['pass'];
$user_type=$_POST['select'];



  
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else {
    // to check if mail mawjoud exists in DB
  $sql = "Select * from users where email='$email'";
    
    $result = mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);
    // check if user exist
    if ($num >0) {
        
    session_start();
        $_SESSION['exists']="Cet email est déjà utilisé dans un autre compte!";
    header("Location: signup.php");
    }
    
    else{
        
        /*img upload start*/
        //check if no img has been uploaded then we put the default img
        if($_FILES["imageUpload"]['error']===UPLOAD_ERR_NO_FILE)
        {
            $filename="default.png";
        }
        // else traitement de limage uploaded
        else{
         $filename = $_FILES["imageUpload"]["name"];
        
        

    $tempname = $_FILES["imageUpload"]["tmp_name"];  

        $folder = "profile_imgs/".$filename; 

        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

            $msg = "Failed to upload image";
        } 
        } 
        /* end img*/

        //préparation de la requete  sql et execution
    $requete=$conn->prepare("insert into users(firstname,lastname,email,password,user_type,image)
        values(?,?,?,?,?,?)");
    $requete->bind_param("ssssss",$firstname,$lastname,$email,$psw,$user_type,$filename);
    $requete->execute();

    
    $requete->close();


    //insertion dans la table first psw pour pouvoir utiliser la fonctionnalité d'oubli du pswrd
    //pour recupere l'id affecté au user
    $sqlfinal = "Select * from users where email='$email'";
    
    $resultfinal = mysqli_query($conn, $sqlfinal);
    $rowfinal=mysqli_fetch_assoc($resultfinal);
    $idfinal=$rowfinal['id'];

    $requetefinal=$conn->prepare("insert into firstpsw(id,password)
        values(?,?)");
    $requetefinal->bind_param("ss",$idfinal,$psw);
    $requetefinal->execute();

    
    $requetefinal->close();
    //fin insertion table firstpsw
    session_start();
    $_SESSION['success']="votre compte a été créé avec succes";
    header("Location: login.php"); 
}

}
//success insertion
 
        }
        else 
        {
            echo'<h2> try again ';
        }
    }

}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Cours PHP & MySQL</title>
    <title>vente d'electro menager slema </title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="politiqueConfidentialite.css">
    <link rel="stylesheet" href="style.css">
    

</head>

<body>

<div id="container">
<div class="subheader">
            <div class="overlay">
                <br>
                <br>
                <h1 class="pagetitle">Inscription effectuée</h1>
                <br>
                <p>exprimez-vous librement et devenez acteur de changement</p>
                <br>
                <button > <a href="login.php">S'identifier</a></button>
            </div>
        </div>