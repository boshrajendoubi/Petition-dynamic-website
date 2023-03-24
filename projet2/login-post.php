<?php

include 'http://localhost/projet%20web2/chatbot/chatbot.php';
require_once 'dbh.php';

$email=$_POST['email'];
$psw=$_POST['pass'];


$sql = "SELECT * FROM users where email='".$email."' and password='".$psw."'";
$result = $conn->query($sql);

// si la requete a retourné plus que 0 resultat .. dans notre cas ca doit obligatoirement  etre soit 1 soit 0  email (unique)
if ($result->num_rows > 0) {
        $row=mysqli_fetch_assoc($result);
        $id=$row['id'];
		session_start();
        $_SESSION['id']=$id;
        $_SESSION['email']=$email;
        $_SESSION['password']=$psw;

        $_SESSION['firstname']=$row["firstname"];
        $_SESSION['lastname']=$row["lastname"];
     
        $_SESSION['logged']=true;
        $_SESSION['updated']=true;
        $_SESSION['image']=$row['image'];
        $_SESSION['user_type']=$row['user_type'];
        //remember me code
        if(isset($_POST['remember-me']))
        {
            /*setcookie('email',$email,time()+7*24*60*60);
            setcookie('password',$psw,time()+7*24*60*60);*/
            setcookie('email', $email, [
    'expires' => time() + 86400,
    'path' => '/final_project/projet2',
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'None',
]);
            setcookie('password', $psw, [
    'expires' => time() + 86400,
    'path' => '/final_project/projet2',
    'domain' => 'localhost',
    'secure' => true,
    'httponly' => true,
    'samesite' => 'None',
]);
        }
            //end remember me code
        
        // si tout est bien on renvoie lutilisateur a la page suivante 
        if($_SESSION['user_type']=="administrateur")
        {
            header("Location: admin.php");
        }
        else {
            //renvoie 
            header("Location: index.php");
        }
       
	}
else{
	session_start();
    $_SESSION['failed']="Coordonnées invalides";
    header("Location: login.php");
	
}




?>