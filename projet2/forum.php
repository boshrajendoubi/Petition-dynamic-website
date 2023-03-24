
<?php

require 'dbh.php';
require_once 'session-verif.php';

//if(isset($_SESSION['login']) and isset($_SESSION['mp']))

  //include("connexion.php");
?>
<?php
if(isset($_POST['envoyer']))
{

  $id=$_SESSION['id'];
  $msg=$_POST['message'];
  $date=date('Y-m-d');
  $heure=date('H:i');
  $req1=mysqli_query($conn,"insert into message (message,date,heure,id_user) values ('$msg','$date','$heure','$id')"); 
//header("Location:forum.php");
}


?>
<html>
<head>
	<title>Forum</title>
 <meta charset="utf-8">
	<link rel="stylesheet" href="communiquer.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
require_once 'header-logged.php';
?>
<div class="subheader">
            <div class="overlay">
                <br>
                <br>
                <h1 class="pagetitle">Forum</h1>
                <br>
                <p>exprimez-vous librement et devenez acteur de changement</p>
                <br>
                <button>page d'acceuil</button>
            </div>
        </div>

<section id="sect1">
<?php
  /* changer le format de la date en français*/
function changedate($dt)

{
$tab = explode("-",$dt);
$nd = $tab[2]."-".$tab[1]."-".$tab[0];
return $nd;
}
$sql="select * from users,message where users.id=message.id_user ";
//order by message.id_message DESC
$res=$conn->query($sql);
$id=$_SESSION['id'];
/*$res=mysqli_query($conn,"select * from users,message where users.id=message.id_user order by id_message DESC"); */
while($row=mysqli_fetch_assoc($res))
{
  if ($id == $row['id_user'])
  {
  echo '<div class="div1 floatR"><p class="nom1">'.$row['lastname'].' '.$row['firstname'].'</p>';
  echo '<img src="profile_imgs/'.$row['image'].'" class="photo" width="30px" height="30px"></div>';
  echo '<div class="dateheure"><p class="date">'.$row['heure'].'<br>'.changedate($row['date']).'</p></div>';
  
   echo '<div id="div22">';
  $i = 0;
$nbr = strlen($row['message']);
$ch=$row['message'];
while ($i < $nbr){
  
   if (($i % 56) == 0)
   {
    echo '<br>';
   }
   echo $ch[$i] ;
  $i++;
}
echo '</p></div><br><br>' ;
}
else
{
  echo '<div class="div1 floatL"><img src="profile_imgs/'.$row['image'].'" class="photo" width="30px" height="30px"></div>';
  echo '<p class="nom">'.$row['lastname'].' '.$row['firstname'].'</p></div>';
  echo '<div class="dateheure"><p class="date1">'.$row['heure'].'<br>'.changedate($row['date']).'</p></div>';
  
   echo '<div id="div2">';
  $i = 0;
$nbr = strlen($row['message']);
$ch=$row['message'];
while ($i < $nbr){
  
   if (($i % 56) == 0)
   {
    echo '<br>';
   }
   echo $ch[$i] ;
  $i++;
}
echo '</p></div><br><br>' ;
}
}

?>

<form action="forum.php" method="post">
<textarea name="message"  placeholder="Votre message" id="zmessage"></textarea>

<!--<input type="submit" name="envoyer" value="Envoyer" class="btnfinal">-->
<button type="submit" name="envoyer" value="Envoyer" class="btnfinal">Envoyer</button>

</form>
</section>



</body>
</html>
