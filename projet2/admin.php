<?php
require_once 'dbh.php';

include 'session-verif.php';
// count nb accounts dispo
$sql = "Select count(*) as nbracc from users";
$result = mysqli_query($conn, $sql);
$nbracc=mysqli_fetch_assoc($result);
// count nb etudiants dispo
$sql1="select count(*) as nbretud from users where user_type='etudiant'";
$result1=mysqli_query($conn,$sql1);
$nb_etud=mysqli_fetch_assoc($result1);
// count nbr d'enseignants
$sql2="select count(*) as nbrens from users where user_type='enseignant'";
$result2=mysqli_query($conn,$sql2);
$nb_ens=mysqli_fetch_assoc($result2);
$sql3="select count(*) as nbrmsgs from message";
$result3=mysqli_query($conn,$sql3);
$nb_msgs=mysqli_fetch_assoc($result3);
$sql4="select * from users order by id DESC";
$result4=mysqli_query($conn,$sql4);
$sql5='select * from petitions where decision="accepte" order by id DESC';
$result5=mysqli_query($conn,$sql5);

$sql6="select count(*) as nbpol from petitions where categorie='politique'";
$result6=mysqli_query($conn,$sql6);
$pol_js=mysqli_fetch_assoc($result6);
$sql7="select count(*) as nbsan from petitions where categorie='sante'";
$result7=mysqli_query($conn,$sql7);
$san_js=mysqli_fetch_assoc($result7);
$sql8="select count(*) as nbsoc from petitions where categorie='social'";
$result8=mysqli_query($conn,$sql8);
$soc_js=mysqli_fetch_assoc($result8);
$sql9="select count(*) as nbani from petitions where categorie='animaux'";
$result9=mysqli_query($conn,$sql9);
$anim_js=mysqli_fetch_assoc($result9);
$sql10="select count(*) as nbspo from petitions where categorie='sport'";
$result10=mysqli_query($conn,$sql10);
$spo_js=mysqli_fetch_assoc($result10);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Petition'net</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="admin.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
    <style>
        button{
            border: none;
            background-color: transparent;
        }
    </style>
    
</head>

<body>
 
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                       
                        <span class="title">Petition'net</span>
                    </a>
                </li>

                <li>
                    <a href="admin.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="pending.php">
                        <span class="icon">
                            <ion-icon name="timer-outline"></ion-icon>
                        </span>
                        <span class="title">Pétitions en attente</span>
                    </a>
                </li>

                <li>
                    <a href="liste-test.php">
                        <span class="icon">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </span>
                        <span class="title">Liste des pétitions </span>
                    </a>
                </li>

                <li>
                    <a href="users.php">
                        <span class="icon">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </span>
                        <span class="title">Liste des utilisateurs</span>
                    </a>
                </li>

                <li>
                    <a href="contact-admin.php">
                        <span class="icon">
                             <i class="fa fa-comments" aria-hidden="true"></i>
                        </span>
                        <span class="title">Contact messages</span>
                    </a>
                </li>

                <li><form method="post" action="logout.php">
                        <button type="submit">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        
                        <span class="title">Se déconnecter</span>
                       
                    </a>
                    </button>
                     </form>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main" id="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                

                <div class="user">
                    <img src="profile_imgs/<?php echo $_SESSION['image'];?>" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->


            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $nbracc['nbracc'];?></div>
                        <div class="cardName">Nombre total des comptes</div>
                    </div>

                    <div class="iconBx">
                        
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $nb_etud['nbretud'];?></div>
                        <div class="cardName">Nombre d'étudiants</div>
                    </div>

                    <div class="iconBx">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $nb_ens['nbrens'];?></div>
                        <div class="cardName">Nombre d'enseignants</div>
                    </div>

                    <div class="iconBx">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $nb_msgs['nbrmsgs'];?></div>
                        <div class="cardName">Messages dans le forum</div>
                    </div>

                    <div class="iconBx">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                    </div>
                </div>

                
            </div>

            <!-- ================ Add Charts JS ================= -->
            <div class="chartsBx">
                <div class="chart"> <canvas id="chart-1"></canvas> </div>
                <div class="chart"> <canvas id="chart-2"></canvas> </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Pétitions récemment approuvées</h2>
                        <a href="liste-test.php" class="btn">Voir tout</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Titre de la petition</td>
                                <td>nom du createur</td>
                                <td>catégorie</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i=0;
                            while($row=$result5->fetch_assoc())
                                
                            {
                            ?>
                            <tr>
                                <td><?php
                                 echo $row['titre'];

                                 ?></td>
                                <?php
                                
                                $temp='SELECT * FROM users WHERE id="'.$row['createur'].'"';
                                $res=mysqli_query($conn,$temp);
                                $createur=mysqli_fetch_assoc($res);
                                ?>
                                <td><?php 
                               echo $createur['firstname']." ".$createur['lastname'];
                                ?></td>
                                <td><span class="status delivered"><?php echo $row['categorie'];?></span></td>
                            </tr>

                            <?php
                            $i=$i+1;
                            if($i>7)
                                {break;}
                        }
                            ?>
                            <!-- status pending/return/inProgress  nestaamelhom fel page mtaa messages-->
                            

                            
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Utilisateurs récemment inscrits</h2>
                    </div>

                    <table>
                        <?php
                        $count=0;
                        while($rows=$result4->fetch_assoc())
                        {
                        ?>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="profile_imgs/<?php echo $rows['image'];?>" alt=""></div>
                            </td>
                            <td>
                                <h4><?php echo $rows['firstname'];?> <br> <span><?php echo $rows['user_type'];?></span></h4>
                            </td>
                        </tr>
                        <?php
                        $count=$count+1;
                        if ($count>7) {
                            break;
                        }
                    }
                        ?>

                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="admin.js"></script>

    <!-- ======= Charts JS ====== -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
   

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

       <!--start script chart js-->
    <script>
        const ctx1 = document.getElementById("chart-1").getContext("2d");

const myChart = new Chart(ctx1, {
  type: "polarArea",
  data: {
    labels: ["Social", "Politique", "santé","Animaux","Sports"],
    datasets: [
      {
        label: "# of Votes",
        data: [<?php echo $soc_js['nbsoc'];?>, <?php echo $pol_js['nbpol'];?>, <?php echo $san_js['nbsan'];?>,<?php echo $anim_js['nbani']; ?>,<?php echo $spo_js['nbspo']; ?>],
        backgroundColor: [
          "rgba(54, 162, 235, 1)",
          "rgba(255, 99, 132, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(132, 245, 39, 1)",
          "rgba(14, 15, 13, 1)",
        ],
      },
    ],
  },
  options: {
    responsive: true,
  },
});

const ctx2 = document.getElementById("chart-2").getContext("2d");
const myChart2 = new Chart(ctx2, {
  type: "bar",
  data: {
    labels: ["Social", "Politique", "santé","Animaux","Sports"],
    datasets: [
      {
        label: "Nombre de pétitions",
        data: [<?php echo $soc_js['nbsoc'];?>, <?php echo $pol_js['nbpol'];?>, <?php echo $san_js['nbsan'];?>,<?php echo $anim_js['nbani']; ?>,<?php echo $spo_js['nbspo']; ?>],
        backgroundColor: [
          "rgba(54, 162, 235, 1)",
          "rgba(255, 99, 132, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(132, 245, 39, 1)",
          "rgba(14, 15, 13, 1)",
        ],
      },
    ],
  },
  options: {
    responsive: true,
  },
});
    </script>

    <!-- end script chart js-->
</body>

</html>