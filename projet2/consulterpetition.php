<?php 
require_once 'session-verif.php';
require_once 'dbh.php';
$id=$_SESSION['id'];
$sql="select * from petitions where createur='".$id."'";
$res=mysqli_query($conn,$sql);


?>
<!DOCTYPE html>
<html>

<head>
    <title>Mes Pétitions</title>
   
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="consulterpetitions.css">
    <link rel="stylesheet" href="style.css">
   <!--  -->
</head>

<body>
    <div id="container">
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
        <br>
        <br>
        <br>
        <div class="subheader">
            <div class="overlay">
                <br>
                <br>
                <h1 class="pagetitle">Mes pétitions</h1>
                <br>
                <p>exprimez-vous librement et devenez acteur de changement</p>
                <br>
                <br>
                <button>page d'acceuil</button>
            </div>
</div>
        <br>
        <br>
        <?php
        while($row=$res->fetch_assoc())
                                
            {

            if($row['decision']=="refus"){
                ?>

        <div class="row petition shadow p-3 mb-5 bg-white rounded">
            <div class="row statut">
                <p class="en-attente"></p>
            <br>
           
            </div>
            <div class="row">
                <img src="petition_imgs/<?php echo $row['image']; ?>" class="rounded float-start" width="300px" height="180px" alt="...">
                <div class="col-md-9">

                    <h1 class="titre">
                        <?php echo $row['titre']; ?>
                    </h1>


                    <span class="categorie">
                     <?php echo $row['categorie']; ?>
                    </span>
                    <hr>
                    <p class="description">
                        <?php echo substr($row['description'], 0,600)."..."; ?>
                    </p>
                    <button class="modifierbutton"><a href="creerpetition-final.php?modif=true&id=<?php echo $row['id']; ?>" style="text-decoration: none;"> Modifier </a> </button>
                </div>

            </div>

        </div>
    <?php }
    else{ ?>
        <div class="row petition shadow p-3 mb-5 bg-white rounded">
            <div class="row statut">
                <p class="approuved"></p>
                <br>
            </div>
            <div class="row">
                <img src="petition_imgs/<?php echo $row['image']; ?>" class="rounded float-start" width="300px" height="180px" alt="...">
                <div class="col-md-9">

                    <h1 class="titre">
                        <?php echo $row['titre']; ?>
                    </h1>


                    <span class="categorie">
                     <?php echo $row['categorie']; ?>
                    </span>
                    <hr>
                    <p class="description">
                        <?php echo substr($row['description'], 0,600)."..."; ?>
                    </p>
                    <button class="modifierbutton"><a href="creerpetition-final.php?modif=true&id=<?php echo $row['id']; ?>" style="text-decoration: none;"> Modifier </a></button>
                </div>
            </div>
        </div>
        
<?php }} ?>


















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