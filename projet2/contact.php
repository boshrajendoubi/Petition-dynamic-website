<!DOCTYPE html>
<!-- saved from url=(0047)https://www.elite2com.com/siteslamaresponsive/# -->
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://fonts.google.com/">
    <title>Pétitionnet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="images/iconepage.ico">
    <link rel="stylesheet" href="stylecontact.css">

    <link rel="stylesheet" href="style.css">
    <style>
        #container {
            background-image: url() !important;
        }
    </style>
</head>

<body>


    <div id="container">

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

        <div class="subheader">
            <div class="overlay">
                <br>
                <br>
                <h1 class="pagetitle">Contactez-nous</h1>
                <br>
                <p>exprimez-vous librement et devenez acteur de changement</p>
                <br>
                <br>
                <button>page d'acceuil</button>
            </div>
</div>
        <div id="contact ">

            <div class="row ">
                <div class="contact-container">
                    <div class="contact-description ">
                        <h1> Entrer en contact </h1>
                        <br>
                        <br>
                        <h3 class="h3contact"> Posez toutes vos questions et n'hésitez pas à nous renseigner sur support@petitionnet.com </h3>
                        <br>
                        <h4>Par téléphone </h4>
                        <p> Tél : (+216) 72 22 04 15 Fax : (+216) 72 22 16 73 GSM : (+216) 26 22 04 15 / 28 42 04 15 / 28 32 04 15</p>
                        <br>
                        <h4>Par courrier </h4>
                        <p>Siège : Avenue Habib Thameur, Rue Ibn Hazem - 8000 Nabeul Annexe : Rue Sayda - 8000 Nabeul</p>
                    </div>
                    <div class="blue ">
                       <?php
                       if(isset($_GET['error']))
                       {
                        echo '<div class="alert alert-danger text-center">
                    <span>Tous les champs sont obligatoires!</span>
                    </div>';
                    
                       }
                       ?>
                        <form method="post" action="contact-post.php" id="contact">

                            <!--<label for="inputCity " class="form-label formulaire ">Ville</label>-->
                            <input type="text " class="formulaire " placeholder="Nom" id="nom " name="nom">
                            <!--<label for="inputCity " class="form-label formulaire ">Ville</label>-->
                            <input type="text " class="formulaire " placeholder="Prénom" id="prenom" name="prenom">

                            <!--<label for="inputEmail4 " class="form-label formulaire ">Email</label>-->
                            <input type="email " class="formulaire " placeholder="E-mail " id="email " name="email">


                            <!--<label for="inputAddress " class="form-label formulaire ">Addresse</label>-->
                            <input type="text " class="formulaire " id="objet " placeholder="Objet " name="objet">

                            <!--<label for="validationTextarea " class="form-label formulaire ">Message</label>-->
                            <textarea class="formulaire1 margintop20 " id="message " placeholder="Message " width="300px " height="250px " name="message"></textarea>




                            <button type="submit " class="btnnn btnnn-form btn-block ">Soumettre</button>


                        </form>

                    </div>
                </div>



            </div>

        </div>

























        <?php include 'footer.php'?>






</body>

</html>