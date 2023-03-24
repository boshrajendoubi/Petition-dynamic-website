<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	

    

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="stylelogin.css">
    <link rel="stylesheet" href="util.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">


	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title> - jsFiddle demo</title>
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.js'></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
							
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
            
				<form class="login100-form-signup validate-form" id="mainForm form1" runat="server" action="signup-post.php" method="post" enctype="multipart/form-data" name="signup">
					<span class="login100-form-title p-b-20">
						S'inscrire
					</span>


                   <?php
                        session_start();
                        if(isset($_SESSION['exists']))
                        {
                            echo '<div class="alert alert-danger text-center">
                    <span>'.$_SESSION['exists'].'</span>
                    </div>';
                            unset($_SESSION['exists']);
                        }
                        ?>
		
    							
<div class="container">
    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' name="imageUpload" id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url('images/Thinking face-pana.svg');">
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
<div class="wrapper">
 <input type="radio" name="select" id="option-1" value="etudiant" checked >
 <input type="radio" name="select" id="option-2" value="enseignant">
 <input type="radio" name="select" id="option-3" value="administrateur">
   <label for="option-1" class="option option-1">
     <div class="dot"></div>
      <span>Student</span>
      </label>
   <label for="option-2" class="option option-2">
     <div class="dot"></div>
      <span>Teacher</span>
   </label>
   <label for="option-3" class="option option-3">
     <div class="dot"></div>
      <span>Admin</span>
   </label>
</div>
<br>
<br>



					<div class="wrap-input100 validate-input" data-validate = "veuillez insérer une adresse valide: ex@abc.xyz">
						<input class="input100" type="email" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
                        <p id="control-mail"> </p>
					</div>
                    <div class="wrap-input100-1">
                    <div class="wrap-input100 validate-input m-l-10" data-validate = "veuillez insérer un nom valide">
						<input class="input100" type="text" name="nom">
						<span class="focus-input100"></span>
						<span class="label-input100">Nom</span>
					</div>
                    <br>
                    <p id="control-nom"> </p>
                    <div class="wrap-input100 validate-input m-l-10" data-validate = "veuillez insérer un prénom valide">
						<input class="input100" type="text" name="prenom">
						<span class="focus-input100"></span>
						<span class="label-input100">Prénom</span>
                        <p id="control-prenom"> </p>
                        
					</div>
                </div>

					<div class="wrap-input100 validate-input" data-validate="veuillez insérer un mot de passe">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Mot de passe</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate="veuillez insérer un mot de passe">
						<input class="input100" type="password" name="passconfirm">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirmer le mot de passe</span>
					</div>

				    <br>

                <div class="g-recaptcha" data-sitekey="6Lc4-b4fAAAAACLt3uT_nVv0zNsff-EZE0a8Xov7"></div>
<br>

			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" value="submit" name="submit">
							S'inscrire
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt3">
							Déjà un membre ?
						</span>
                        <a href="login.php" style=" text-decoration: none ;"> 
                        <span class="txt4">
							S'identifier
						</span>
                        </a>
					</div>

					
				</form>

				<div class="login100-more-signup" >
				</div>
                <style>
                    .login100-more-signup
                    {
                        
                        background-image: url("images/Untitled design.png");
                    }
                </style>
			</div>
		</div>
	</div>
				
	<script src="main.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	







</body>
</html>