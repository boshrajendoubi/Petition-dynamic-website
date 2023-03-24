<?php 



require 'session-verif.php';
require_once 'dbh.php';
$id=$_GET['id'];
$sql="select * from users where id='".$id."'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);


?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
     <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap-4.6.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/new_project/test.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
</head>
<body>

    <div class="container-xl px-4 mt-4">
   
    
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Image de profil</div>
                <div class="upload">
       <!-- tekhdem-->
            <img src="profile_imgs/<?php echo $row['image']; ?>" width = 125 height = 125 title="">
            <b><center><?php echo $row['user_type']; ?></center></b>
            
                

                
        </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Details du compte</div>
                <div class="card-body">
                    
                        
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Prenom</label>
                                <input class="form-control" name="fname" id="inputFirstName" type="text" placeholder="Entrez votre prenom" value="<?php echo $row['firstname'];?>" readonly>
                                
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Nom</label>
                                <input class="form-control" id="inputLastName" name="lname" type="text" placeholder="Entrez votre nom" value="<?php echo $row['lastname'];?>" readonly>
                            
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="psw">Mot de passe</label>
                                <input class="form-control" 
                                name ="psw" id="psw" type="text" value="<?php echo $row['password']; ?>" readonly>
                              
                                    
                                        
                                </p>
                                
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="psw2">Date d'inscription</label>
                                <input class="form-control" id="psw2"  name="psw2" type="text" value="<?php echo $row['inscription']; ?>" readonly>
                                
                              
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" name="email" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo $row['email'];?>" readonly>
                            
                        </div>
                        <!-- Form Row-->
                        
                        <!--  return button-->
                        <a href="users.php"><button class="btn btn-primary" type="submit">Retour</button></a>
                        <form method="post" action="delete-user.php">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="annuler">
                        <button class="btn btn-danger" type="submit">Supprimer utilisateur</button>
                        </div>
                        </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://localhost/new_project/update.js"></script>
<!--<script src="http://localhost/jquery-3.6.0.min.map"></script>-->
<script>
    let btn = document.getElementById('annul');
    btn.addEventListener('click',function(){
     
    });
</script>

</body>
</html>
