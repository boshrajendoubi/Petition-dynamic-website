<?php
require_once 'dbh.php';
$id=$_GET['id'];
$sql="SELECT * from petitions where id ='".$id."'";
 $res=mysqli_query($conn,$sql);

 $row=mysqli_fetch_assoc($res);
 $sql1="SELECT * from users where id='".$row['createur']."'";
  $res1=mysqli_query($conn,$sql1);
  
 $row1=mysqli_fetch_assoc($res1);

 $sql2="SELECT * from signature where idPetition='".$id."' and commentaire not like ''";
  $res2=mysqli_query($conn,$sql2);
  
 

 
 $sql3="select count(*) as nb_peti from petitions where createur='".$row1['id']."'";
 $res3=mysqli_query($conn,$sql3);
 $nbpeti=mysqli_fetch_assoc($res3);

$sql4="select count(*) as nbmsg from message where id_user='".$row1['id']."'";
$res4=mysqli_query($conn,$sql4);
$nbmsg=mysqli_fetch_assoc($res4);


 $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:400,500,600%7CTeko:300,400,500%7CMaven+Pro:500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>

   <style>
      
      :root {
  --main-color: #2196f3;
  --main-color-alt: #1787e0;
  --main-transition: 0.3s;
  --main-padding-top: 100px;
  --main-padding-bottom: 100px;
  --section-background: #ececec;
}
*{
  scroll-behavior: smooth;
}
.testimonials {
  padding-top: var(--main-padding-top);
  padding-bottom: var(--main-padding-bottom);
  position: relative;
  background-color: var(--section-background);
}
.testimonials .container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 40px;

}
.testimonials .box {
  padding: 20px;
  background-color: white;
  box-shadow: 0 2px 4px rgb(0 0 0 / 7%);
  border-radius: 6px;
  position: relative;
}
.testimonials .box img {
  position: absolute;
  right: -10px;
  top: -50px;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 10px solid var(--section-background);
}
.testimonials .box h3 {
  margin: 0 0 10px;
}
.testimonials .box .title {
  color: #777;
  margin-bottom: 10px;
  display: block;
}
.testimonials .box .rate .filled {
  color: #ffc107;
}
.testimonials .box p {
  line-height: 1.5;
  color: #777;
  margin-top: 10px;
  margin-bottom: 0;
}


    </style>
    <style>
      
      .chartsBx{
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: 1fr 2fr;
  grid-gap: 30px;
}

.chartsBx .chart{
  position: relative;
  background: #fff;
  padding: 20px;
  width: 100%;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
  border: 1px solid var(--blue);
}
.main-title {
  text-transform: uppercase;
  margin: 0 auto 80px;
  border: 2px solid black;
  padding: 10px 20px;
  font-size: 30px;
  width: fit-content;
  position: relative;
  z-index: 1;
  transition: var(--main-transition);
}
.main-title::before,
.main-title::after {
  content: "";
  width: 12px;
  height: 12px;
  background-color: var(--main-color);
  position: absolute;
  border-radius: 50%;
  top: 50%;
  transform: translateY(-50%);
}
.main-title::before {
  left: -30px;
}
.main-title::after {
  right: -30px;
}
.main-title:hover::before {
  z-index: -1;
  animation: left-move 0.5s linear forwards;
}
.main-title:hover::after {
  z-index: -1;
  animation: right-move 0.5s linear forwards;
}
.main-title:hover {
  color: var(--main-color);
  border: 2px solid white;
  transition-delay: 0.5s;
}

/*pop up style*/
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;

}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
    </style>
</head>
<body>
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

<section class="section section-sm section-first bg-default text-center" id="services">
        <div class="container">
          <div class="row row-30 justify-content-center">
            
            <div class="col-md-7 col-lg-5 col-xl-6 text-lg-left wow fadeInUp"><img src="petition_imgs/<?php echo $row['image']; ?>" alt="" width="700" height="700"/>
              <p><strong>Description : </strong><?php echo $row['description']; ?></p>
            </div>
            <div class="col-lg-7 col-xl-6">
              <div class="row row-30">
                <div class="col-sm-6 wow fadeInRight">
                  <article class="box-icon-modern box-icon-modern-custom">
                    <div>
                      <h3 class="box-icon-modern-big-title"><?php echo $row['titre']; ?></h3>
                      <div class="box-icon-modern-decor"></div><a class="button button-primary button-ujarak" href="#comments">Voir les commentaires</a>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-delay=".1s">
                  <article class="box-icon-modern box-icon-modern-2">
                    <div class="box-icon-modern-icon linearicons-user"></div>
                    <h5 class="box-icon-modern-title"><a href="#" onclick="myFunction()">informations<br>du créateur</a></h5>
                    <div class="box-icon-modern-decor"></div>
                    <p class="box-icon-modern-text"><?php echo $row1['firstname']." ".$row1['lastname']; ?> <br> <?php echo $row1['email']; ?><br><?php echo $row1['user_type']; ?></p>
                  </article>
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-delay=".2s">
                  <article class="box-icon-modern box-icon-modern-2">
                    <div class="box-icon-modern-icon linearicons-list"></div>
                    <h5 class="box-icon-modern-title"><a href="#">Catégorie</a></h5>
                    <div class="box-icon-modern-decor"></div>
                    <p class="box-icon-modern-text"><?php echo $row['categorie']; ?></p>
                  </article>
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-delay=".3s">
                  <article class="box-icon-modern box-icon-modern-2">
                   <div class="chart"> <canvas id="chart-1"></canvas> </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="comments">
            
        </div>
      </section>

<!-- comments on this peti-->
      <section>
        <div class="testimonials" id="testimonials">
      <h2 class="main-title">Avis de ceux qui ont signés</h2>
      <div class="container">
         <?php
  
  while($row2=$res2->fetch_assoc())
  {
    
  ?>
        <div class="box">
          <!--<img src="avatar1.png" alt="" />-->
          <h3><?php echo $row2['prenomUser']." ".$row2['nomUser']; ?></h3>
          <span class="title"><?php echo $row2['mail']; ?></span>
         
          <p>
            <?php echo $row2['commentaire']; ?>
          </p>
        </div>
    <?php } ?>
    </div>
</div>
</section>
<!-- end comments section-->


<!--pop up profile-->
<div class="popup" id="popup">
  <div class="popuptext" id="myPopup">
   
<style >
  
.frame {
  position: fixed;
  z-index: 5;
  top: 50%;
  left: 50%;
  width: 400px;
  height: 400px;
  margin-top: -200px;
  margin-left: -200px;
  border-radius: 2px;
  box-shadow: 1px 2px 10px 0px rgba(0, 0, 0, 0.3);
  background: #CA7C4E;
  background: -webkit-linear-gradient(bottom left, #EEBE6C 0%, #CA7C4E 100%);
  background: linear-gradient(to top right, #EEBE6C 0%, #CA7C4E 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#EEBE6C', endColorstr='#CA7C4E',GradientType=1 );
  color: #786450;
  font-family: 'Open Sans', Helvetica, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}



.center {
  position: absolute;
  top: 50px;
  left: 40px;
  height: 299px;
  width: 320px;
  background: #fff;
  border-radius: 3px;
  overflow: hidden;
  box-shadow: 10px 10px 15px 0 rgba(0, 0, 0, 0.3);
}

.profile {
  float: left;
  width: 200px;
  height: 320px;
  text-align: center;
}
.profile .image {
  position: relative;
  width: 70px;
  height: 70px;
  margin: 38px auto 0 auto;
}
.profile .image .circle-1, .profile .image .circle-2 {
  position: absolute;
  box-sizing: border-box;
  width: 76px;
  height: 76px;
  top: -3px;
  left: -3px;
  border-width: 1px;
  border-style: solid;
  border-color: #786450 #786450 #786450 transparent;
  border-radius: 50%;
  -webkit-transition: all 1.5s ease-in-out;
  transition: all 1.5s ease-in-out;
}
.profile .image .circle-2 {
  width: 82px;
  height: 82px;
  top: -6px;
  left: -6px;
  border-color: #786450 transparent #786450 #786450;
}
.profile .image img {
  display: block;
  border-radius: 50%;
  background: #F5E8DF;
}
.profile .image:hover {
  cursor: pointer;
}
.profile .image:hover .circle-1, .profile .image:hover .circle-2 {
  -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
}
.profile .image:hover .circle-2 {
  -webkit-transform: rotate(-360deg);
          transform: rotate(-360deg);
}
.profile .name {
  font-size: 15px;
  font-weight: 600;
  margin-top: 20px;
}
.profile .job {
  font-size: 11px;
  line-height: 15px;
}
.profile .actions {
  margin-top: 33px;
}
.profile .actions .btn {
  display: block;
  width: 120px;
  height: 30px;
  margin: 0 auto 10px auto;
  background: none;
  border: 1px solid #786450;
  border-radius: 15px;
  font-size: 12px;
  font-weight: 600;
  box-sizing: border-box;
  -webkit-transition: all .3s ease-in-out;
  transition: all .3s ease-in-out;
  color: #786450;
}
.profile .actions .btn:hover {
  background: #780a08;
  color: #fff;
}

.stats {
  float: left;
}
.stats .box {
  box-sizing: border-box;
  width: 120px;
  height: 99px;
  background: #F5E8DF;
  text-align: center;
  padding-top: 28px;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}
.stats .box:hover {
  background: #E1CFC2;
  cursor: pointer;
}
.stats .box:nth-child(2) {
  margin: 1px 0;
}
.stats span {
  display: block;
}
.stats .value {
  font-size: 18px;
  font-weight: 600;
}
.stats .parameter {
  font-size: 11px;
}


.main-footer {
  background: black;
  padding: 50px;
  
  font-family: "Montserrat", sans-serif;
}

.main-footer span{
  color: beige;
  margin-left: 450px;
}

.im:hover{
  box-shadow: 5px 5px 5px #0b8b86;
}

.edit{
  width: 30px;
}

.no{
  text-decoration: none;
}

.edit2{
  width: 12px;
  margin-left: 5px;
}
.frame button {
  float: right;
}


</style>
<div class="frame" id="frame">
  <button id="close"><i class="fa fa-times" aria-hidden="true"></i></button>
    <div class="center">

        <div class="profile">
            <div class="image">
                <div class="circle-1"></div>
                <div class="circle-2"></div>
                <img src="profile_imgs/<?php echo $row1['image']; ?>" width="70" height="70" alt="photo de profile" title="photo de profil">
            </div>

            <div class="name" title="nom"><?php echo $row1['firstname']." ".$row1['lastname']; ?></div>
            <div class="job" title="email"><?php echo $row1['email']; ?></div>

            <div class="actions">
                <b><center><?php echo $row1['user_type']; ?></center></b>
            </div>
        </div>

        <div class="stats">
            <div class="box">
                <span class="value">Inscrit le :</span>
                <span class="parameter"><?php echo $row1['inscription']; ?></span>
            </div>
            <div class="box">
                <span class="value"><?php echo $nbpeti['nb_peti']; ?></span>
                <span class="parameter">Nombre de pétitions lancée</span>
            </div>
            <div class="box">
                <span class="value"><?php echo $nbmsg['nbmsg']; ?></span>
                <span class="parameter">Messages dans le forum</span>
            </div>
        </div>
    </div>
</div>
  </div>
</div>
<!-- end pop up profile-->

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>

<script>
    
     const ctx1 = document.getElementById("chart-1").getContext("2d");

const myChart = new Chart(ctx1, {
  type: "polarArea",
  data: {
    labels: ["Signatures", "Oppositions"],
    datasets: [
      {
        label: "# of Votes",
        data: [<?php echo $row['nbSignatures'];?>,<?php echo $row['nbOpp'];?>],
        backgroundColor: [
         
          "rgba(255, 99, 132, 1)",
          "rgba(255, 206, 86, 1)",
          
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
    labels: ["Signatures", "Opposition"],
    datasets: [
      {
        label: "Nombre de signatures",
        data: [<?php echo $row['nbSignatures'];?>,<?php echo $row['nbOpp'];?>],
        backgroundColor: [
          "rgba(54, 162, 235, 1)",
          "rgba(255, 99, 132, 1)",
          
        ],
      },
    ],
  },
  options: {
    responsive: true,
  },
});

// When the user clicks on button, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
  //script close frame
  /*let btn=document.getElementById('close');
  //let popup=document.getElementById('popup');
  btn.addEventListener('click',function(){
    popup.classList.toggle("hide");
  });*/
  /*if(popup.style.visibility==="visible")
  {
    let btn=document.getElementById('close');
  //let popup=document.getElementById('popup');
  btn.addEventListener('click',function(){
    popup.classList.visibility="hidden";
  });
  }*/
}
</script>
</body>
</html>