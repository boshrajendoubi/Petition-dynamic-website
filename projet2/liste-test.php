<?php
require_once 'dbh.php';
$sql='SELECT * FROM petitions where decision="accepte"';
$res=$conn->query($sql);
$conn->close();


?>
<?php  
include 'adminheadnav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Liste des pétitions</title>
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>

	<link rel="stylesheet" type="text/css" href="liste-test.css">
</head>
<body>

	<main>
		<header>
			<ul class="indicator">
				<li data-filter="all" class="active"><a href="#">Tous</a></li>
				<li data-filter="politique"><a href="#">politique</a></li>
				<li data-filter="sante"><a href="#">sante</a></li>
				<li data-filter="social"><a href="#">social</a></li>
				<li data-filter="animaux"><a href="#">animaux</a></li>
				<li data-filter="sport"><a href="#">sport</a></li>
			</ul>
			<!-- Navbar Search-->
           
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Rechercher" aria-label="Search for..." aria-describedby="btnNavbarSearch" id="recherche" onkeyup="filter()"/>
                    
                </div>
            
<!-- end search -->
<!--tri-->
			<div class="filter-condition">
				<span>Trier par :</span>
				<select name="" id="select">
					<option value="Default">Defaut</option>
					<option value="LowToHigh">DU min au max</option>
					<option value="HighToLow">Du max au min</option>
				</select>
			</div>
		</header>
		<div class="product-field">
			<ul class="items" id="items">
				<?php  
      	while ($rows=$res->fetch_assoc()) 
      	{
      	?>
				<li data-category="" data-price="<?php echo $rows['nbSignatures'];?>" class="box">
					<picture>
						<img src="petition_imgs/<?php echo $rows['image'];?>" alt="" height="300" width="350"> <!-- img changement ici-->
					</picture>
					<form method="post" action="delete.php">
					<div class="detail">

						<p class="icon">
						   
						   <button type="submit" name="affiche" id="affiche"><span><i class="far fa-share-square"></i></span></button>
						   

						   <input type="hidden" name="id_pet" value="<?php echo $rows['id']; ?>">

						   <button type="submit" name="envoie" id="envoie"><span><i class="fa fa-trash" aria-hidden="true"></i></i></span></button>

						  

						  
						    
						</p>
						
						<strong><?php echo $rows['categorie'];?></strong>
						<span><?php
            	echo substr($rows['description'], 0,100)."...";
            ?></span>
						<small><?php echo $rows['titre'];?></small>
					</div>
					</form>
					<h4 id="attr"><?php echo $rows['nbSignatures']." signatures";?></h4>
				</li>
		 <?php
        	}
        ?>
				
			
				
			</ul>
		</div>
	</main>
	<script>
		function filter(){
	input=document.getElementById('recherche');
	filtervalue=input.value.toUpperCase();
	ul=document.getElementById('items');
	li=ul.getElementsByTagName("li");
	for (let i = 0 ; i < li.length ; i++) {
		small = li[i].getElementsByTagName("small")[0];
		if(small.innerHTML.toUpperCase().indexOf(filtervalue) > -1){
            li[i].style.display = "";
            
        }else{
            li[i].style.display = "none";
        }
	}
}
	</script>
</body>
</html>
<script type="text/javascript" src="liste-test.js"></script>