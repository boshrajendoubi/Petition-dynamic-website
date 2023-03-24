<?php
require_once 'dbh.php';
$sql='SELECT * FROM petitions where decision="accepte"';
$res=$conn->query($sql);
$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Liste de petitions</title>
  
  <link rel="stylesheet" type="text/css" href="lstepet.css">
  <link rel="stylesheet" type="text/css" href="liste-test.css">
  <!--style tajryby ll menu-->
    
  <!-- end tajrba-->
</head>
<body>

  <header>
      <ul class="indicator">
        <li data-filter="all" class="active"><a href="#">Tous</a></li>
        <li data-filter="politique"><a href="#">politique</a></li>
        <li data-filter="sante"><a href="#">sante</a></li>
        <li data-filter="social"><a href="#">social</a></li>
        <li data-filter="animaux"><a href="#">animaux</a></li>
        <li data-filter="sport"><a href="#">sport</a></li>
      </ul>
      <div class="filter-condition">
        <span>View As a</span>
        <select name="" id="select">
          <option value="Default">Default</option>
          <option value="LowToHigh">Low to high</option>
          <option value="HighToLow">High to low</option>
        </select>
      </div>
    </header>
  
<div class="articles" id="articles">
      
      <div class="container">
        <?php  
        while ($rows=$res->fetch_assoc()) 
        {
        ?>
        <div class="box" data-category="<?php echo $rows['categorie']; ?>" data-price="<?php echo $rows['nbSignatures'];?>">
          <img src="petition_imgs/<?php echo $rows['image'];?>" alt="" height="200" width="200"/>
          <div class="content">
            <h3><?php echo $rows['titre'];?></h3>
            <p><?php
              echo substr($rows['description'], 0,100)."...";
            ?></p>
          </div>
          
          <strong><?php echo $rows['nbSignatures']." Signatures"; ?></strong>
          <div class="info">
            <a href="">Read More</a>
            <i class="fas fa-long-arrow-alt-right"></i>
          </div>
        </div>
        <?php
          }
        ?>
        
      </div>
    </div>
    <div class="spikes"></div>



<script src="lstepet.js"></script>
</body>
</html>