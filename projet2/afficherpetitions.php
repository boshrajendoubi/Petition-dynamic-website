
<!DOCTYPE html>
<html>

<head>
    <title>Cours PHP & MySQL</title>
    <title>vente d'electro menager slema </title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="afficherpetitions.css">
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
<div id="container">
<!-- header  -->
<?php include 'header.php'?>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="row ">
    <div class="col-8 align-self-center">
      <h1 class="titre">  TUNISIE : UN APPEL AU GOUVERNEMENT FRANÇAIS </h1>
      <div class="nbsignature"> <p class="nb">100 personnes</p> <p class="postnb">ont signé cette pétition. (50% des utilisateurs)</p></div>
      <br>
      <div class="slidecontainer">
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
</div>
<script>
  var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
      <img src="images\4.png" width="100%"/>
      <br>
      <br>
      <p> La révolte du peuple tunisien, qui dure maintenant depuis un mois, s’est soldée à ce jour par la mort de plus de cinquante personnes tombées sous les balles de la police du régime. Cette révolte, initialement cantonnée à des revendications sociales, s’est vite transformée à la surprise de tous en une révolte ouvertement politique. Les manifestants, plus nombreux chaque jour, ont provoqué le départ du président Ben Ali et de sa famille, et réclament l’avènement d’un régime démocratique.
Face à cette situation dramatique dont les enjeux n’échappent à personne, le gouvernement français a d’abord réagi par un silence assourdissant. Puis ont suivi un certain nombre de déclarations sidérantes : celles du ministre de l’Agriculture Bruno Le Maire qui estimant que le président Ben Ali était « souvent mal jugé » ; celle du ministre de la Culture, Frédéric Mitterrand, osant affirmer : « dire que la Tunisie est une dictature univoque, comme on le fait si souvent, me semble tout à fait exagéré » ; celle de François Baroin, porte-parole du gouvernement, déclarant que « déplorer les violences, appeler à l’apaisement, faire part de ses préoccupations, c’est une position équilibrée que défend aujourd’hui la France au regard de la situation tunisienne » ; enfin, celle de la ministre des Affaires étrangères, Michèle Alliot-Marie, appelant devant l’Assemblée nationale à « déplorer les violences », ajoutant que « la priorité doit aller à l’apaisement après des affrontements qui ont fait des morts », suggérant enfin que « le savoir faire, reconnu dans le monde entier, de nos forces de sécurité, permette de régler des situations sécuritaires de ce type ». « C’est la raison pour laquelle nous proposons effectivement aux deux pays [Algérie et Tunisie] de permettre dans le cadre de nos coopérations d’agir pour que le droit de manifester puisse se faire en même temps que l’assurance de la sécurité. » Une proposition si stupéfiante qu’elle a disparu de la version finale du communiqué transmis par le ministère des Affaires étrangères.
Marquée par une déshonorante tradition de complaisance à l’égard de la dictature tunisienne, la position du gouvernement français est devenue intenable. Tous les arguments mobilisés depuis vingt ans par la France avec la plus grande mauvaise foi (« le régime de Ben Ali n’est pas une vraie dictature », « il est un rempart contre l’islamisme », « il n’y a pas d’opposition, ni d’alternative politique »), ont volé en éclat en l’espace de quelques semaines. Le peuple tunisien se bat pour ses libertés civiles et réclame son droit à vivre dans une démocratie.
Pour cette raison, nous appelons toutes et toutes à faire part publiquement de leur soutien aux revendications du peuple tunisien, et nous exigeons du gouvernement et de la diplomatie française, comptables devant les citoyens français et devant nos concitoyens franco-tunisiens, ainsi que les Tunisiens vivant en France, de prendre acte de la légitimité de ces revendications et d’agir en conséquence, en affirmant enfin, et de façon claire, un soutien au peuple tunisien en lutte contre un régime violemment répressif. Il ne s’agit pas seulement là d’une question de principe : il est également dans l’intérêt de tous que le gouvernement français cesse de soutenir un régime honni et fortement ébranlé, et qu’il saisisse cette occasion historique de contribuer à l’avènement d’une démocratie authentique dans le monde arabe.

Premiers signata
</p>

    </div>
    <div class="col-4 sign align-self-start">
        <br>
        <br>
        <h2 class="marginl20"> Signer cette pétition </h2>
        
    
<form class="row g-3 needs-validation align-items-center" id="form-container"novalidate>
  <br>
  
<div class="mb-3 formsign"  >
    
    
    <div class="form-check form-check-inline">
    <input class="form-check-input vote" type="radio" name="vote" id="pour" value="pour">
  <label for="pour" id="pour"> Je suis pour </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input vote" type="radio" name="vote" id="contre" value="contre">
  <label for="contre" id="contre"> Je suis contre </label>
</div>
    <div class="valid-feedback">
    </div>
    <div class="invalid-feedback">
      veuillez saisir votre mail
    </div>
  </div>



<div class="mb-3 formsign"  >
    <label for="validationMail" class="form-label">Adresse mail</label>
    <input type="email" name="email"  class="email form-control" id="validationMail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="nom@exemple.com" required>
    <div class="valid-feedback">
      
    </div>
    <div class="invalid-feedback">
      veuillez saisir votre mail
    </div>
  </div>
  <br>
  <div class="mb-3 formsign " >
    <label for="validationCustom01" class="form-label">Nom</label>
    <input type="text" class="form-control" id="validationCustom01" placeholder="Nom" required>
    <div class="valid-feedback">
     
    </div>
    <div class="invalid-feedback">
      veuillez saisir votre nom
    </div>
  </div>
  <br>
  <div class="mb-3 formsign"  >
    <label for="validationCustom02" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="validationCustom02" placeholder="Prénom"  required>
    <div class="valid-feedback">
     
    </div>
    <div class="invalid-feedback">
      veuillez saisir votre prénom
    </div>
  </div>
  <br>
  <div class="mb-3 formsign"  >
    <label for="validationTextarea" class="form-label">Commentaires
    </label>
    <textarea class="form-control " id="validationTextarea" placeholder="Exemple"></textarea>
    <div class="invalid-feedback">
      veuillez remplir le champ. 
    </div>
  </div>
  <div class="col-12 formsign" >
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Accepter les termes et les conditions
      </label>
      <br>
      <a href="politiqueConfidentialite.php" > les termes et les conditions</a>
      <div class="invalid-feedback">
        Veuillez accepter les termes et les conditions
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <div class="col-12 formsign ">
    <button class="bttn" type="submit">Envoyer</button>
  </div>

</form>
<script>

    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>
  </div>
        
    </div>




</div>
<br>
 <br>
 <br>
 <br>
 <?php include 'footer.php'?>
  </div>
</div>




















</div>
</body>
</html>