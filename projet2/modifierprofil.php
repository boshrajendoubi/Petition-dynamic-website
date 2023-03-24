<?php
include 'session-verif.php';
require_once 'dbh.php';

?>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
<title>Modifier profil</title>
   

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
    <link rel="stylesheet" href="modifierprofil.css">
    
</head>

<body>

<div id="container">
  <!-- header  -->
<?php include 'header-logged.php'?>
<div class="subheader">
            <div class="overlay">
                <br>
                <br>
                <h1 class="pagetitle">Modifier le profil</h1>
                <br>
                <p>exprimez-vous librement et devenez acteur de changement</p>
                <br>
                <button>page d'acceuil</button>
            </div>
        </div>



<br>
<br>
<br>

<div class=" containerrrr bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1 class="marginh1"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></h1></div>
    	
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
       


      <div class="text-center">
        <form class="form" action="update-post.php" method="post" id="registrationForm" enctype="multipart/form-data">
        <!--<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">-->
        <img src="profile_imgs/<?php echo $_SESSION['image']; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
        
        <div class="avatar-upload">
        <div class="avatar-edit">
        <input type="file" class="text-center center-block file-upload" id="imageUpload" name="image">
            <label for="imageUpload"></label>
        </div>
</div>
      </div></hr><br>

               
          
          
        </div><!--/col-3-->
    	<div class="col-sm-9 paddingform">

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  
                      <div class="form-group">
                          
                        <?php
                        if(isset($_GET['failed']))
                        {
                          echo '<div class="alert alert-danger text-center">
                    <span>les champs nom et prénom sont obligatoires. <br>Si vous voulez changer de mot de passe vous devez taper correctement l\'ancien mot de passe et vérifier la saisier du nouveau.</span>
                    </div>';
                        }
                       if(isset($_GET['succes']))
                        {
                          echo '<div class="alert alert-success text-center">
          <span>Vos coordonnées ont été modifiées avec succès.</span>
          </div>';
                        }

                        ?>

                          <div class="col-xs-6">
                              <label for="first_name"><h5 class="coordonnes">Prénom</h5></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Prénom" title="Entrer votre prénom" value="<?php echo $_SESSION['firstname']; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h5 class="coordonnes">Nom</h5></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Nom" title="Entrer votre nom" value="<?php echo $_SESSION['lastname']; ?>">
                          </div>
                      </div>
          
                      
          
                     
                     
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h5 class="coordonnes">Ancien mot de passe</h5></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="ancien mot de passe" title="Entrer votre ancien mot de passe">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h5 class="coordonnes">Nouveau mot de passe</h5></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="nouvrau mot de passe" title="confirmer votre mot de passe">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h5 class="coordonnes">Confirmer votre nouveau mot de passe</h5></label>
                              <input type="password" class="form-control" name="password3" id="password3" placeholder="confirmer votre nouveau mot de passe" title="confirmer votre nouveau mot de passe">
                          </div>
                          <p id="errorpsw2"></p>
                      </div>
                      <div class="form-group">
                           <div class="col-md-6 divbtn">
                                <br>
                              	<button class="btn btn-lg btn-success " type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Mettre à jour</button>
                               	
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
            
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
    <script>
        $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});
});
        </script>






















<br>
<br>
<br>
<br>
<br>


 


















</div>  
<?php include 'footer.php'?> 
</body>

</html>
