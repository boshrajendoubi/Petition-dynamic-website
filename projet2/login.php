<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Se connecter</title>
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
   <!-- <link rel="stylesheet" href="util.css">-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">



<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="login-post.php" id="form" name="loginform">
					<span class="login100-form-title p-b-43">
						S'identifier
					</span>
					
						<?php
						
						if(isset($_SESSION['success']))
						{
							echo '<div class="alert alert-success text-center">
					<span>'.$_SESSION['success'].'</span>
					</div>';
							unset($_SESSION['success']);
						}
						?>
                            
                        
						<?php
						
						if(isset($_SESSION['failed']))
						{
							echo '<div class="alert alert-danger text-center">
					<span>'.$_SESSION['failed'].'</span>
					</div>';
							unset($_SESSION['failed']);
						}
						?>
					

					
					<div class="wrap-input100 validate-input" data-validate = "veuillez insérer une adresse valide: ex@abc.xyz">
						<input class="input100" type="text" name="email" id="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="veuillez insérer un mot de passe">
						<input class="input100" type="password" name="pass" id="pass" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Mot de passe</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32 flexx">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Rester connecté(e)
							</label>
						</div>

						<div>
							<a href="mdps-oublie.php" class="txt1">
								Mot de passe oublié?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							S'identifier
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt3">
							Nouveau membre ?
						</span>
                        <a href="signup.php" style=" text-decoration: none ;"> 
                        <span class="txt4">
							S'inscrire
						</span>
                        </a>
					</div>

					
				</form>

				<div class="login100-more" >
				</div>
                <style>
                    .login100-more
                    {
                        background-image: url("images/Untitled design.png");
                    }
                </style>
			</div>
		</div>
	</div>
	
	<script src="main.js"></script>

	
	


</body>
<!--check ken user clicked remember me-->

<!--end check-->
</html>