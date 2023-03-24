<?php
include 'session-verif.php';
require_once 'dbh.php';
if(isset($_GET['modif']))
{
  $id=$_GET['id'];
  $sql="SELECT * from petitions where id='".$id."'";
  $res=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php if(isset($row)) 
  {
    echo "<title>Modifier une pétition</title>";
  }else{
    echo" <title>Créer une pétition</title>";
}
    ?>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="creerpetition-final.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    

</head>

<body>

<div id="containerr">
  <!-- header  -->
<?php 

if(isset($_SESSION['logged']))
{
require_once 'header-logged.php';
}
else
{
require_once 'header.php';
}

?>

<div class="subheader">
            <div class="overlay">
                <br>
                <br>
                <h1 class="pagetitle">Lancer une pétition</h1>
                <br>
                <p>exprimez-vous librement et devenez acteur de changement</p>
                <br>
                <button>page d'acceuil</button>
            </div>
        </div>
<br>
<br>
<br>
<form class="row g-3 needs-validation align-items-center" id="form-container"novalidate method="post" action="creer-post.php" enctype="multipart/form-data">
<div class="bglight">
  <?php  
  if(isset($row))
  {
    echo '<input type="hidden" name="idmodif" value="'.$row['id'].'"/>';
  }
  ?>

 <?php
                        
                        if(isset($_SESSION['create_success']))
                        {
                            echo '<div class="alert alert-success text-center">
          <span>'.$_SESSION['create_success'].'</span>
          </div>';
                            unset($_SESSION['create_success']);
                        }
                        if(isset($_SESSION['modif_success']))
                        {
                            echo '<div class="alert alert-success text-center">
          <span>'.$_SESSION['modif_success'].'</span>
          </div>';
                            unset($_SESSION['modif_success']);
                        }
                        ?>

<h1>Ajouter une photo qui décrit bien la pétition</h1>
<div class="containerrr">
    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" class="form-control input-lg"  accept=".png, .jpg, .jpeg" name="imageUpload"/>
            <label for="imageUpload"  class="form-label"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" 
            style="
            <?php if(isset($row)){
              echo "background-image: url('petition_imgs/".$row['image']."')";
            }
            else{
             echo "background-image: url('images/petimg.jpg')";
            }
            ?>
            ;">
            </div>
        </div>
    </div>
</div>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
  </script>
<div class="contain">
  
  <div class="row">

    <!-- interesting stuff starts here -->
    <h1 style="margin-left: 20px;">Catégorie</h1>
    <fieldset class="select-account marginl50">
      <?php if(isset($row)) 
     { echo '<button type="button" id="choose-account" name="choose-account" class="choose-account" aria-haspopup="true" value="credit-cards">'.$row['categorie'].'</button>';
       }
       else
       {
     echo' <button type="button" id="choose-account" name="choose-account" class="choose-account" aria-haspopup="true" value="credit-cards">Catégorie</button>

      <ul class="account-types" role="menu">
        <li role="presentation">
          <input type="radio" id="credit-cards" name="categorie" value="politique" role="menuitem" aria-checked="true" checked>
          <label for="credit-cards">Politique</label>
        </li>
        <li role="presentation">
          <input type="radio" id="banking" name="categorie" value="animaux">
          <label for="banking">Animaux</label>
        </li>
        <li role="presentation">
          <input type="radio" id="auto" name="categorie" value="sport" role="menuitem" aria-checked="false">
          <label for="auto">Sport</label>
        </li>
        <li role="presentation">
          <input type="radio" id="auto" name="categorie" value="social" role="menuitem" aria-checked="false">
          <label for="auto">Social</label>
        </li>
        <li role="presentation">
          <input type="radio" id="auto" name="categorie" value="sante" role="menuitem" aria-checked="false">
          <label for="auto">Santé</label>
        </li>
      </ul>';
    }?>
    </fieldset>
  </div>
</div>
<script>
  $(document).ready(function() {
  var $select = $(".select-account");
  var $choose = $(".choose-account");
  
  // handle KEYPRESS events
  $("body").on("keypress", function(e) {
    var $target = $(e.target);
    var $parent = $target.parents(".select-account");
    if (e.which == 13) {
      if ($target.attr("name") == "account-type") {
        var $whichActive = $("#" + $choose.val());
        $whichActive.focus();
        $(".select-account").removeClass("active");
        
        var $clicked = $("input:checked ~ label");
        var clicked = $clicked.text();
        $choose.val($clicked.attr("for"));
        $choose.text(clicked);
        $select.removeClass("active");
      } else {
        $select.removeClass("active");
      }
    }
  });
  
  // handle random body clicks off-$target
    $("body").on("click", function (e) {
      var $target = $(e.target);
      var isSelect = $target.parents(".select-account").length > 0;
      if (!isSelect) {
        $select.removeClass("active");
      }
    });

  // handle direct BUTTON click
  $choose.on("click", function() {
    var $whichActive = $("#" + $choose.val());
    if ($select.hasClass("active")) {
      $select.removeClass("active");
      $choose.focus();
    } else {
      $select.addClass("active");
      $whichActive.focus();
    }
  });

  // handle direct LABEL clicks
  $select.on("click", "label", function() {
    var clicked = $(this).text();
    $choose.val($(this).attr("for"));
    $choose.text(clicked);
    $select.removeClass("active");
  });

});
</script>    

   
     <br>
     <div class="mb-3 formsign form-group-lg" >
       <label for="validationCustom01" class="form-label"><h1>Titre</h1></label>
      <input type="text" class="form-control input-lg" id="validationCustom01" placeholder="Titre" required name="titre" <?php if (isset($row)) {
        echo 'value="'.$row['titre'].'"';
      } ?>>
        
       </div>
       <div class="invalid-feedback">
         veuillez saisir un titre valide
       </div>
     
     <br>
     
     <br>
     <div class="mb-3 formsign">
       <label for="validationTextarea" class="form-label"><h1>Description</h1>
       </label>
       <textarea class="form-control input-lg" id="validationTextarea" placeholder="Description" required name="description" ><?php if (isset($row)) {
        echo $row['description'];
      } ?></textarea>
       <div class="invalid-feedback">
         veuillez remplir le champ. 
       </div>
     </div>
     <div class="col-12 formsign" >
       <div class="form-check">
         <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
         <label class="form-check-label" for="invalidCheck" style="color: white;">
           Accepter les termes et les conditions
         </label>
         <br>
         <a href="politiqueConfidentialite.php" >Les termes et les conditions</a>
         <div class="invalid-feedback">
           Veuillez accepter les termes et les conditions
         </div>
         </div>
       </div>
     
     <br>
     <br>
     <br>
     <div class="col-3 formsign ">
      <?php
       if(isset($row))
       {
        echo '<button class="bttn" type="submit" name="modification">Modifier la pétition</button>';
       }
       else{
       echo '<button class="bttn" type="submit">Lancer une pétition</button>';
     }
       ?>
     </div>
   
   </form>
   </div>
</div>
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

<br>
<br>
<br>








<?php include 'footer.php'?>
</div>
</body>
</html>

