<?php
    $counter=0;
    require_once 'dbh.php';
    $sql='SELECT * FROM petitions where decision="accepte" ORDER BY id DESC limit 6';
    $res=$conn->query($sql);
    $conn->close();

  ?>
<!DOCTYPE html>
<html>

<head>
    <title>Pétition'net</title>
    

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

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
<!-- bannière  -->
<div id="banner">
<img src="images\Untitled design.png"   alt="...">

<div class="row">
    <div class="col-md-6 offset-md-3">
    <h1>Découvrez toutes les pétitions les plus récentes <br> </h1>
    </div>
</div>
<div class="row">
    <div class="col-md-6 offset-md-3"><h2>
        <br> Mobilisez-vous, signez pour devenir acteur du changement.</h2>
    </div>
</div>

</div>
<!-- timeline -->
<div class="row g-0">
  <div class="col-sm-6 col-md-8">

  <div class="">
  <div class="container">
    <h2 class="pb-3 pt-2 border-bottom mb-5">Nos citoyens au sein du notre processus</h2>
    <!--first section-->
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center bottom d-inline-flex justify-content-center align-items-center">
        <div class="circle font-weight-bold">1</div>
      </div>
      <div class="col-6">
        <h5>Écrivez de manière claire et concise</h5>
        <p>Les signataires potentiels n'ont souvent pas beaucoup de temps. Il est important d'énoncer votre objectif principal de manière concise et au début de la pétition.</p>
      </div>
    </div>
    <!--path between 1-2-->
    <div class="row timeline">
      <div class="col-2">
        <div class="corner top-right"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner left-bottom"></div>
      </div>
    </div>
    <!--second section-->
    <div class="row align-items-center justify-content-end how-it-works d-flex">
      <div class="col-6 text-right">
        <h5>Publiez votre pétition en ligne</h5>
        <p>Il existe de nombreuses façons pour les signataires de trouver votre pétition, mais la publicité aide toujours. La publicité sur Google, Overture et d'autres moteurs de recherche est une étape évidente.</p>
      </div>
      <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">
        <div class="circle font-weight-bold">2</div>
      </div>
    </div>
    <!--path between 2-3-->
    <div class="row timeline">
      <div class="col-2">
        <div class="corner right-bottom"></div>
      </div>
      <div class="col-8">
        <hr/>
      </div>
      <div class="col-2">
        <div class="corner top-left"></div>
      </div>
    </div>
    <!--third section-->
    <div class="row align-items-center how-it-works d-flex">
      <div class="col-2 text-center top d-inline-flex justify-content-center align-items-center">
        <div class="circle font-weight-bold">3</div>
      </div>
      <div class="col-6">
        <h5>Obtenez une couverture médiatique</h5>
        <p>Les pétitions réussies attirent également souvent l'attention des médias. Cela ne signifie pas que votre pétition doit être couverte dans le New York Times.</p>
      </div>
    </div>
  </div>
</div>
  </div>

  <!-- compteur + catégorie  -->
  <div class="col-6 col-md-4">
  <span class="compteur" id="compteur">291173</span>
     <h3 id="compteurh3"> signatures collectées </h3>
     <br>
     <br>
      <h3 id="categorie"> Les Catégories</h3>
      <ul style="  list-style-type:none;">
          <li><a href="#" class=" categorieli">Sport</a></li>
          <li><a href="#" class=" categorieli">Politique</a></li>
          <li><a href="#" class=" categorieli">Les animaux</a></li> 
          <li><a href="#" class=" categorieli">Santé</a></li>  
          <li><a href="#" class=" categorieli">société</a></li>   
      </ul>
    

     </div>
     <script> 
       var i = 291173;

function augmenter() {
    i += 2;
    document.getElementById("compteur").innerHTML = i;
}
setInterval("augmenter()", 1000);
 </script>
  </div>
</div>
<br>
<br>
<h2 class="pb-3 pt-2 border-bottom mb-5">Nos citoyens au sein de notre processus</h2>
<!-- les pétitions  -->
<div class="row align-items-center">
  <?php
  
  while($rows=$res->fetch_assoc())
  {
    
  ?>
<div class="col">
    <div class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover" style="width: 360px; overflow: hidden; border-radius: 1px;">
        <img src="petition_imgs/<?php echo $rows['image'];?>" alt="Man with backpack"    height="200" width="200"
            class="d-block w-full">

  <div class="px-2 py-2">
    <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
      <?php echo $rows['categorie'];?>
    </p>

    <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
    <?php echo substr($rows['titre'], 0,50)."...";?>

    </h1>

    <p class="mb-1">
      <?php
              echo substr($rows['description'], 0,100)."...";
      ?>
    </p>

  </div>
  <!-- on a ajouté l id de la petition a lurl afin de le recuperer ulterieurement-->
  <a href="affpeti.php?id=<?php echo $rows['id'];?>" class="text-uppercase d-inline-block font-weight-medium lts-2px ml-2 mb-2 text-center styled-link">
    Voir Plus
</a>
</div>
    </div>
    <?php
    $counter=$counter+1;
      }
    ?>

  </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  <?php include 'footer.php'?>


















</div>   

</body>

</html>