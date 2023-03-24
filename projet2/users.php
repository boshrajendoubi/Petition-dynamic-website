<?php include 'adminheadnav.php';?>
<?php
require_once 'dbh.php';
$sql="SELECT * from users";
$res=mysqli_query($conn,$sql);
?>
<?php 


?>

<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>

<style>
  .containerr {
    
  padding-left: 15px;
  padding-right: 15px;
  margin-left: auto;
  margin-right: auto;
}
  .team {
  padding-top: var(--main-padding-top);
  padding-bottom: var(--main-padding-bottom);
  position: relative;
}
.team .containerr {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 30px;
}
.team .box {
  position: relative;

}
.team .box::before,
.team .box::after {
  content: "";
  background-color: #f3f3f3;
  position: absolute;
  right: 0;
  top: 0;
  height: 100%;
  border-radius: 10px;
  transition: var(--main-transition);
}
.team .box::before {
  width: calc(100% - 60px);
  z-index: -2;
}
.team .box::after {
  z-index: -1;
  background-color: #e4e4e4;
  width: 0;
}
.team .box:hover::after {
  width: calc(100% - 60px);

}
.team .box .data {
  display: flex;
  align-items: center;
  padding-top: 60px;
}

.team .box .data img {
  width: calc(100% - 60px);
  transition: var(--main-transition);
  border-radius: 10px;
  height: 250px;
}
.team .box:hover img {
  filter: grayscale(100%);
}
.team .box .data .social {
  width: 60px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}
.team .box .data .social button {
  width: 60px;
  height: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
}
.team .box .data .social button:hover i {
  color: var(--main-color);
}
.team .box .data .social i {
  color: #777;
  transition: var(--main-transition);
}
.team .box .info {
  padding-left: 80px;
}
.team .box .info h3 {
  margin-bottom: 0;
  color: var(--main-color);
  font-size: 22px;
  transition: var(--main-transition);
}
.team .box .info p {
  margin-top: 10px;
  margin-bottom: 25px;
}
.team .box:hover .info h3 {
  color: #777;

}
button{
 
  border: none;
  background-color: transparent;
  cursor: pointer;
}

.modal{
  position: fixed;
  top:0;
  left:0;
  right:0;
  bottom:0;
  z-index: 2;
  display: none;
  background-color: black;
}


/*popup last try*/



</style>






 <div class="team" id="team">
      
      <div class="containerr">
      	<?php
        $i=0;
      	while($rows=$res->fetch_assoc())
  {
    
  ?>

 
        <div class="box" data-category="<?php echo $rows['user_type']; ?>">
        	
          <div class="data">


            <img src="profile_imgs/<?php echo $rows['image']; ?>" alt="" />
            <div class="social">
              <a href="update.php?id=<?php echo $rows['id']; ?>" id="selector">
                <i class="fa fa-eye" aria-hidden="true"></i>
                
              </a>
              <form method="post" action="delete-user.php">
            <button type="submit">  
                
                <i class="fa fa-ban" aria-hidden="true"></i>
              
              </button>
              <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                </form>
              
            </div>

          </div>

          <div class="info">
            <h3><?php echo $rows['firstname']." ".$rows['lastname']; ?></h3>
            <p><?php echo $rows['email']; ?></p>
            <strong><?php echo $rows['user_type']; ?></strong>
          </div>
        </div>
      <?php } ?>
         


        </div>

    </div>





