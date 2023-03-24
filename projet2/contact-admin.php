<?php
require_once 'dbh.php';
include "adminheadnav.php";
$sql="select * from contact order by id asc";
$res=mysqli_query($conn,$sql);
?>
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
.box h1{
	 border: 1px solid black;
}
.box{
	border-radius: 50%;
	margin: 50px;
}

    </style>
<section>
        <div class="testimonials" id="testimonials">
      <h2 class="main-title">Messages provenant du contact form</h2>
      <div class="container">
         <?php
  
  while($row=$res->fetch_assoc())
  {
    
  ?>
        <div class="box">
        	<h1><center><?php echo $row['objet']; ?></center></h1>
          <!--<img src="avatar1.png" alt="" />-->
          <p>Créateur :</p>
          <h3><?php echo $row['prenom']." ".$row['nom']; ?></h3>
          <span class="title"><?php echo $row['email']; ?></span>
         
          <p>
            <?php echo $row['message']; ?>
          </p>
          <br>
          <p><?php echo $row['date']; ?></p>
        </div>
    <?php } ?>
    </div>
</div>
</section>
<!-- end comments section-->