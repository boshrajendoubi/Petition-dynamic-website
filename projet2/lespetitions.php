<?php 
require_once 'dbh.php';
 $sql='SELECT * FROM petitions where decision="accepte" ORDER BY id DESC';
    $res=$conn->query($sql);
    $conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Les pétitions</title>
    

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="petitions.css">

<style>
  .items{
    display: flex;
    justify-content:space-around;
    flex-wrap: wrap;
    padding: 10px;
  }
  .items li{
  display: inline;
  height: 100%;
  }
</style>
</head>

<body>

<div id="container">
  <!-- header  -->
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
                <h1 class="pagetitle">Les pétitions</h1>
                <br>
                <p>exprimez-vous librement et devenez acteur de changement</p>
                <br>
                <br>
                <button>page d'acceuil</button>
            </div>
</div>

 <div class="filtercontainer"> 
<div class="contain">
  
  <div class="row">

    <!-- interesting stuff starts here -->
    <fieldset class="select-account marginl50">
      <button type="button" id="choose-account" name="choose-account" class="choose-account" aria-haspopup="true" value="credit-cards">filtrer par</button>

      <ul class="account-types" role="menu" >
        <li role="presentation" onclick="triDateDESC()">
          <input type="radio" id="ancienne" name="account-type" value="auth-credit-cards" role="menuitem" aria-checked="true" checked>
          <label for="ancienne"> la plus ancienne</label>
        </li>
        <li role="presentation" onclick="triDateASC()">
          <input type="radio" id="récente" name="account-type" value="auth-bank">
          <label for="récente"> la plus récente</label>
        </li>
        <li role="presentation" onclick="triName()">
          <input type="radio" id="nom" name="account-type" value="auth-auto" role="menuitem" aria-checked="false">
          <label for="nom">Nom</label>
        </li>
        <li role="presentation" onclick="triSignature()">
          <input type="radio" id="nbre" name="account-type" value="auth-dealer" role="menuitem" aria-checked="false">
          <label for="nbre">signatures</label>
        </li>
      </ul>
    </fieldset>
  </div>
</div>
<script>
  $(document).ready(function() {
  var $select = $(".select-account");
  var $choose = $(".choose-account");
  
  // handle KEYPRESS events
  $("body").on("keypress", function(e) {
    var $target = $(e.target);
    var $parent = $target.parents(".select-account");
    if (e.which == 13) {
      if ($target.attr("name") == "account-type") {
        var $whichActive = $("#" + $choose.val());
        $whichActive.focus();
        $(".select-account").removeClass("active");
        
        var $clicked = $("input:checked ~ label");
        var clicked = $clicked.text();
        $choose.val($clicked.attr("for"));
        $choose.text(clicked);
        $select.removeClass("active");
      } else {
        $select.removeClass("active");
      }
    }
  });
  
  // handle random body clicks off-$target
    $("body").on("click", function (e) {
      var $target = $(e.target);
      var isSelect = $target.parents(".select-account").length > 0;
      if (!isSelect) {
        $select.removeClass("active");
      }
    });

  // handle direct BUTTON click
  $choose.on("click", function() {
    var $whichActive = $("#" + $choose.val());
    if ($select.hasClass("active")) {
      $select.removeClass("active");
      $choose.focus();
    } else {
      $select.addClass("active");
      $whichActive.focus();
    }
  });

  // handle direct LABEL clicks
  $select.on("click", "label", function() {
    var clicked = $(this).text();
    $choose.val($(this).attr("for"));
    $choose.text(clicked);
    $select.removeClass("active");
  });

});
</script>	 
<div class="contain">
  
  <div class="row">

    <!-- interesting stuff starts here -->
    <fieldset class="select-account-categorie marginl50 categorie">
      <button type="button" id="choose-account-categorie" name="choose-account-categorie" class="choose-account-categorie" aria-haspopup="true" value="credit-cards">Catégorie</button>

      <ul class="account-types-categorie" role="menu">
        <li role="presentation"  data-filter="politique">
          
          <input type="radio" id="politique" name="account-type-categorie" value="auth-credit-cards" role="menuitem" aria-checked="true" checked>
          <label for="politique">Politique</label>
        
        </li>
        <li role="presentation"  data-filter="animaux">
          <input type="radio" id="Animaux" name="account-type-categorie" value="auth-bank">
          <label for="Animaux">Animaux</label>
        </li>
        <li role="presentation"  data-filter="sport">
          <input type="radio" id="Sport" name="account-type-categorie" value="auth-auto" role="menuitem" aria-checked="false">
          <label for="Sport">Sport</label>
        </li>
        <li role="presentation"  data-filter="social">
          <input type="radio" id="Societe" name="account-type-categorie" value="auth-dealer" role="menuitem" aria-checked="false">
          <label for="Societe">Société</label>
        </li>
        <li role="presentation"  data-filter="sante">
          <input type="radio" id="sante" name="account-type-categorie" value="auth-dealer" role="menuitem" aria-checked="false">
          <label for="sante">Santé</label>
        </li>
      </ul>
    </fieldset>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
  var $select = $(".select-account-categorie");
  var $choose = $(".choose-account-categorie");
  
  // handle KEYPRESS events
  $("body").on("keypress", function(e) {
    var $target = $(e.target);
    var $parent = $target.parents(".select-account-categorie");
    if (e.which == 13) {
      if ($target.attr("name") == "account-type-categorie") {
        var $whichActive = $("#" + $choose.val());
        $whichActive.focus();
        $(".select-account-categorie").removeClass("active");
        
        var $clicked = $("input:checked ~ label");
        var clicked = $clicked.text();
        $choose.val($clicked.attr("for"));
        $choose.text(clicked);
        $select.removeClass("active");
      } else {
        $select.removeClass("active");
      }
    }
  });
  
  // handle random body clicks off-$target
    $("body").on("click", function (e) {
      var $target = $(e.target);
      var isSelect = $target.parents(".select-account-categorie").length > 0;
      if (!isSelect) {
        $select.removeClass("active");
      }
    });

  // handle direct BUTTON click
  $choose.on("click", function() {
    var $whichActive = $("#" + $choose.val());
    if ($select.hasClass("active")) {
      $select.removeClass("active");
      $choose.focus();
    } else {
      $select.addClass("active");
      $whichActive.focus();
    }
  });

  // handle direct LABEL clicks
  $select.on("click", "label", function() {
    var clicked = $(this).text();
    $choose.val($(this).attr("for"));
    $choose.text(clicked);
    $select.removeClass("active");
  });

});
</script>	   



<div class="row align-items-center" id="tous">
  <ul class="items" id="items" >
  <?php
  
  while($rows=$res->fetch_assoc())
  {
    
  ?>
<li data-category="<?php echo $rows['categorie'] ?>" data-price="<?php echo $rows['nbSignatures'];?>" data-id="<?php echo $rows['id']; ?>" data-titre="<?php echo $rows['titre']; ?>">
 
<div class="col">
    <div class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover" style="width: 360px; overflow: hidden; border-radius: 1px;">
        <img src="petition_imgs/<?php echo $rows['image'];?>" alt="Man with backpack"    height="200" width="200"
            class="d-block w-full">

  <div class="px-2 py-2" >
    <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
     <?php echo $rows['categorie'];?>
    </p>

    <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
    <?php echo substr($rows['titre'], 0,50)."...";?>

    </h1>

    <p class="mb-1">
    <?php
              echo substr($rows['description'], 0,100)."...";
      ?>
    </p>

  </div>

  <a href="affpeti.php?id=<?php echo $rows['id'];?>" class="text-uppercase d-inline-block font-weight-medium lts-2px ml-2 mb-2 text-center styled-link">
    Voir Plus
</a>
</div>
    </div>
  </li>
    <?php
    
      }
    ?>
  </ul>
    </div>


    
    </div> <!--end container-->
 





















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



<script src="filter-liste.js"></script>
</body>

</html