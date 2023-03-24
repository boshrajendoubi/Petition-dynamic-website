<?php
require_once 'dbh.php';
session_start();
$_SESSION['id']=53;
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
<!-- notifs-->
        <!-- ca manque juste la partie de span numero -->
         <li class="nav-item">
           <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications
               <?php
                $query = "select count(*) as nbrnotifs from notifications where status='unread' AND idowner='".$_SESSION['id']."' order by date DESC";

$sql = "select count(*) as nbrnotifs from notifications where status='unread' AND idowner='".$_SESSION['id']."' order by date DESC";
$result = mysqli_query($conn, $sql);
$nbracc=mysqli_fetch_assoc($result);
                if($nbracc['nbrnotifs']>0){
                ?>
                <span class="badge badge-light"><?php echo $nbracc['nbrnotifs']; ?></span>
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