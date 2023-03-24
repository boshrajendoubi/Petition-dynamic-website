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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="height: 80px;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Pétition'net</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link active" aria-current="page" href="index.php">Acceuil</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active" href="lespetitions.php">Les Pétitions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="apropos.php" tabindex="-1" >A propos</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
        <!--  <a class="nav-link bouton" style="margin-left: 120px;" href="#">S'authentifier</a> -->
          <a href="login.php"><button class="btnnav">S'authentifier</button></a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
        </header>
