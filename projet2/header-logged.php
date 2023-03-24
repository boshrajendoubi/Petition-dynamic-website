<?php
require_once 'dbh.php';
define('DBINFO', 'mysql:host=localhost;dbname=petition');
    define('DBUSER','root');
    define('DBPASS','');

    function fetchAll($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->query($query);
        return $stmt->fetchAll();
    }
    function performQuery($query){
        $con = new PDO(DBINFO, DBUSER, DBPASS);
        $stmt = $con->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }


?>

<header>
  <script >

$(function () {
    $(window).on('scroll', function () {
        if ( $(window).scrollTop() > 10 ) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });
});
  </script>   
     
<style>
  @font-face {
    font-family: Poppins-Regular;
    src: url('fonts/poppins/Poppins-Regular.ttf');
}

@font-face {
    font-family: Poppins-Medium;
    src: url('fonts/poppins/Poppins-Medium.ttf');
}

@font-face {
    font-family: Poppins-Bold;
    src: url('fonts/poppins/Poppins-Bold.ttf');
}

@font-face {
    font-family: Poppins-SemiBold;
    src: url('fonts/poppins/Poppins-SemiBold.ttf');
}

@font-face {
    font-family: Montserrat-Bold;
    src: url('fonts/montserrat/Montserrat-Bold.ttf');
}

@font-face {
    font-family: Montserrat-SemiBold;
    src: url('fonts/montserrat/Montserrat-SemiBold.ttf');
}

@font-face {
    font-family: Montserrat-Regular;
    src: url('fonts/montserrat/Montserrat-Regular.ttf');
}
#menuToggle
{
  display: block;
  position: relative;
  top: 2px;
  left: -8px;
  z-index: 1;
  -webkit-user-select: none;
  user-select: none;
}

#menuToggle a
{
  text-decoration: none;
  color: #232323;
  
  transition: color 0.3s ease;
}
#btnunique 
{
  text-decoration: none;
  color: #232323;
  
  transition: color 0.3s ease;
  border: none !important;
  font-family: Montserrat-Regular;
  background-color: transparent;


    outline: none;
    padding-bottom: 20px;
    margin-bottom: 20px;
    
    color: black;
    background: transparent;
    margin-bottom: -12px;
    box-shadow: 0 0 0 0 !important;
}
.btnunique p{
  padding-bottom: 30px;
}

#menuToggle a:hover
{
  color: #23D07E;
}
#btnunique:hover{
  color: #23D07E; 
  border: none;
}


#menuToggle input
{
  display: block;
  width: 50px;
  height: 100px;
  position: absolute;
  top: -4px;
  left: -5px;
  
  cursor: pointer;
  
  opacity: 0; /* hide this */
  z-index: 2; /* and place it over the hamburger */
  
  -webkit-touch-callout: none;
}

/*
 * Just a quick hamburger
 */
#menuToggle span
{
  display: block;
  width: 26px;
  height: 2px;
  margin-bottom: 15px;
  position: relative;
  margin-top: -10px;
  background: transparent;
  border-radius: 3px;
  
  z-index: 1;
  
  transform-origin: 4px 0px;
  
  transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              background 0.5s cubic-bezier(0.77,0.2,0.05,1.0),
              opacity 0.55s ease;
}

#menuToggle span:first-child
{
  transform-origin: 0% 0%;
}

#menuToggle span:nth-last-child(2)
{
  transform-origin: 0% 100%;
}

/* 
 * Transform all the slices of hamburger
 * into a crossmark.
 */
#menuToggle input:checked ~ span
{
  opacity: 1;
  transform: rotate(45deg) translate(-2px, -1px);
  background: #232323;
}

/*
 * But let's hide the middle one.
 */
#menuToggle input:checked ~ span:nth-last-child(3)
{
  opacity: 0;
  transform: rotate(0deg) scale(0.2, 0.2);
}

/*
 * Ohyeah and the last one should go the other direction
 */
#menuToggle input:checked ~ span:nth-last-child(2)
{
  transform: rotate(-45deg) translate(0, -1px);
}

/*
 * Make this absolute positioned
 * at the top left of the screen
 */
#menu
{
  position: absolute;
    width: 289px;
    margin: -100px 0 0 -50px;
    padding: 50px;
    padding-top: 95px;
    background: #ededed;
    list-style-type: none;
    -webkit-font-smoothing: antialiased;
    transform-origin: 0% 0%;
    transform: translate(-100%, 0);
    transition: transform 0.5s cubic-bezier(0.77,0.2,0.05,1.0);
    padding-left: 70px;
    height: max-content;
}

#menu li 
{
  padding-top: 10px;
  font-size: 17px;
  margin-bottom: 5px;

}

.borderr
{
  border-bottom: solid 1px #232323;
    height: 44px;
    margin: 20px 13px;
  
}
hr
{}

/*
 * And let's slide it in from the left
 */
#menuToggle input:checked ~ ul
{
  transform: none;
}
.imageprofil
{
  border-radius: 50%;
  width: 120px;
  height: 120px;
}
.pdpsmall
{
  border-radius: 50%;
  width: 40px;
  height: 40px;
}
.username
{
  font-size: 30px;
  margin: 10px 0;
  font-weight: bold;

}
.username:hover
{
  color: #23D07E  !important;
}
.roleuser
{
  font-size:17px;
  color: cadetblue;

}
.deconnect
{
  margin-top: 45px;
}
input[type="submit"] {
    display: none !important;
}
  </style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="height: 80px;">
  <div id="menuToggle">
    <!--
    A fake / hidden checkbox is used as click reciever,
    so you can use the :checked selector on it.
    -->
    <input type="checkbox" />
    
    <!--
    Some spans to act as a hamburger.
    
    They are acting like a real hamburger,
    not that McDonalds stuff.
    -->

    <img class="pdpsmall" src="profile_imgs/<?php echo $_SESSION['image']; ?>"/>
    
    <span></span>
    <span></span>
    <span></span>


    <!--
    Too bad the menu has to be inside of the button
    but hey, it's pure CSS magic.
    -->
    <ul id="menu">
      <a href="#"><li>
        <img class="imageprofil" src="profile_imgs/<?php echo $_SESSION['image']; ?>"/>
        <br>
        <p class="username"> <?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?> </p>
        <p class="roleuser"> <?php echo $_SESSION['user_type']; ?></p>
        <br>
        <hr>
      </li></a>
      <a href="consulterpetition.php"><li class="borderr"><p>Mes Pétitions</p></li></a>
      <a href="modifierprofil.php"><li class="borderr"><p>modifier le profil</p></li></a>
      <a href="contact.php"><li class="borderr"><p>Contact</p></li></a>
      
      <br>
      <form method="post" action="logout.php">
      
         <button id="btnunique"><li class="deconnect">
            
            <input type="submit" name="logout">
           <p>se déconnecter</p>
         
          
        </li></button>
      
      
      </form><!-- position form -->
    </ul>
    
  </div>   
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Pétition'net</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        

        <!-- notifs-->
        <!-- ca manque juste la partie de span numero -->
         <li class="nav-item">
           <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications
               <?php
                $query = "select  *  from notifications where status='unread' AND idowner='".$_SESSION['id']."' order by date DESC";

                if(count(fetchAll($query))>0){
                ?>
                <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
              <?php
                }
              ?>
              
            </a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <?php
                $query = "select * from notifications where idowner='".$_SESSION['id']."' order by date DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                  ?>



                       <a style ="
                         <?php
                            if($i['status']=='unread'){
                                echo "font-weight:bold;";
                            }
                         ?>
                         " class="dropdown-item" href="affpeti.php?id=<?php echo $i['idpetition']."&notif=".$i['id']; ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                  <?php
                  if (isset($i['name'])) {
                     echo $i['name']." ".$i['message'];
                   } 
                   else{
                    echo $i['message'];
                   }

                  
                /*if($i['type']=='comment'){
                    echo "Someone commented on your post.";
                }else if($i['type']=='like'){
                    echo ucfirst($i['name'])." liked your post.";
                }*/
                  
                  ?>
                </a>
                 <div class="dropdown-divider"></div>
                <?php
                     }
                 }
                 else{
                     echo "Aucune notification pour l'instant.";
                 }
                     ?>






          </li></ul></div>





        </li>
        <!-- end notifs-->

        <li class="nav-item ">
          <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active" href="lespetitions.php">Les Pétitions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="apropos.php" tabindex="-1" >A propos</a>
        </li>
       
        
        
        <li class="nav-item">
        <!--  <a class="nav-link bouton" style="margin-left: 120px;" href="#">S'authentifier</a> -->
          <a href="creerpetition-final.php"><button class="btnnav">lancer</button></a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
        </header>
