<?php
require_once 'dbh.php';

 $id_petition=$_GET['id'];
 $sql="SELECT * FROM petitions where id='".$id_petition."'";

 //echo $actual_link[-1];
 $res=mysqli_query($conn,$sql);

 $row=mysqli_fetch_assoc($res);


 /* for notifs */
 if(isset($_GET['notif']))
 {
  $query="UPDATE notifications SET status='read' WHERE id='".$_GET['notif']."'";
  $conn->query($query);
 }
  $conn->close();
$nbsig=$row['nbSignatures'];
$nbopp=$row['nbOpp'];
$nbtot=$nbopp+$nbsig;
if($nbtot==0){
  $pourcentage=0;
}else{
$pourcentage=($nbsig*100)/$nbtot;}
$pourcentage=round($pourcentage);
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $row['titre']; ?></title>
    

   <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="afficherpetitions.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div id="container">
<!-- header  -->
<?php 
session_start();
if(isset($_SESSION['logged']))
{
require_once 'header-logged.php';
}
else
{
require_once 'header.php';
}

?>
<br>
<br>
<br>
<br>
<div class="container">

       
  <div class="row ">
    <div class="col-8 align-self-center">
      <h1 class="titre">  <?php echo $row['titre'];?></h1>
       <div class="nbsignature"> <p class="nb"><?php echo $nbsig; ?> personnes</p> <p class="postnb">ont signé cette pétition. (<?php echo $pourcentage; ?>% des éditeurs)</p></div>
      <br>
      <div class="slidecontainer">
  <input type="range" min="1" max="100" value="<?php echo $pourcentage; ?>" class="slider" id="myRange">
</div>
<script>
  var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
      <img src="petition_imgs/<?php echo $row['image']; ?>" width="100%"/>
      <br>
      <br>
      <p> 
         <?php echo $row['description']; ?>
</p>

    </div>
    <div class="col-4 sign align-self-start">
        <br>
          <!--error msg to say that pet was already signed by this mail-->
        <p>
          <?php
            if(isset($_GET['signed']))
            {
              if($_GET['signed']=="false")
              {
                echo '<div class="alert alert-danger text-center"><span>Vous avez déjà signé cette pétition! Vous n\'avez pas le droit de le refaire.</span></div>';
              }
              
            }
          ?>
          </p>

        <br>
        <h2 class="marginl20"> Signer cette pétition </h2>
        
    
<form class="row g-3 needs-validation align-items-center" id="form-container"novalidate method="post" action="signer.php">
  <br>
  <input type="hidden" name="id_pet" value="<?php echo $id_petition; ?>">
  
<div class="mb-3 formsign"  >
    
    
    <div class="form-check form-check-inline">
    <input class="form-check-input vote" type="radio" name="vote" id="pour" value="pour" checked>
  <label for="pour" id="pour"> Je suis pour </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input vote" type="radio" name="vote" id="contre" value="contre" >
  <label for="contre" id="contre"> Je suis contre </label>
</div>
    <div class="valid-feedback">
    </div>
    <div class="invalid-feedback">
      veuillez saisir votre mail
    </div>
  </div>



<div class="mb-3 formsign"  >
    <label for="validationMail" class="form-label">Adresse mail</label>
    <input type="email" name="email"  class="email form-control" id="validationMail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="nom@exemple.com" required>
    <div class="valid-feedback">
      
    </div>
    <div class="invalid-feedback">
      veuillez saisir votre mail
    </div>
  </div>
  <br>
  <div class="mb-3 formsign " >
    <label for="validationCustom01" class="form-label">Nom</label>
    <input type="text" class="form-control" id="validationCustom01" placeholder="Nom" required name="nom">
    <div class="valid-feedback">
     
    </div>
    <div class="invalid-feedback">
      veuillez saisir votre nom
    </div>
  </div>
  <br>
  <div class="mb-3 formsign"  >
    <label for="validationCustom02" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="validationCustom02" placeholder="Prénom"  required name="prenom">
    <div class="valid-feedback">
     
    </div>
    <div class="invalid-feedback">
      veuillez saisir votre prénom
    </div>
  </div>
  <br>
  <div class="mb-3 formsign"  >
    <label for="validationTextarea" class="form-label">Commentaires
    </label>
    <textarea class="form-control " id="validationTextarea" placeholder="Exemple" name="comment"></textarea>
    <div class="invalid-feedback">
      veuillez remplir le champ. 
    </div>
  </div>
  <div class="col-12 formsign" >
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Accepter les termes et les conditions
      </label>
       <br>
      <a href="politiqueConfidentialite.php" > les termes et les conditions</a>
      <div class="invalid-feedback">
        Veuillez accepter les termes et les conditions
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div class="col-12 formsign ">
    <button class="bttn" type="submit">Envoyer</button>
  </div>

</form>
<script>

    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>
  </div>
        
    </div>




</div>
<br>
 <br>
 <br>
 <br>
 <?php include 'footer.php'?>
  </div>
</div>




















</div>
</body>
</html>