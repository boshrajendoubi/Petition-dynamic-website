
function alphatest(ch)
{
	 return /^[a-zA-Z]+$/.test(ch); //regx function
}

function strength(ch)
{
	return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/.test(ch);

}
let updateform=document.getElementById('registrationForm');
updateform.addEventListener("submit",(e)=>{
	let fname=document.getElementById('first_name');
	let lname=document.getElementById('last_name');
	let psw=document.getElementById('password');
	let psw2=document.getElementById('password2');
	let psw3=document.getElementById('password3');
	if(fname.value==""){

		e.preventDefault();
		document.getElementById("errorfname").style.color="red";
		document.getElementById("errorfname").innerHTML="Champ obligatoire";

		//tekhdeeeeeeeeeeem
	}
	else if(!alphatest(fname.value)){
		e.preventDefault();
		document.getElementById("errorfname").style.color="red";
		document.getElementById("errorfname").innerHTML="Votre prénom doit contenir  uniquement des lettres";

	}
	else if(lname.value=="")
	{
		e.preventDefault();
		document.getElementById('errorlname').style.color="red";
		document.getElementById("errorlname").innerHTML="Champ obligatoire";
	}
	else if(!alphatest(lname.value))
	{
		e.preventDefault();
		document.getElementById("errorlname").style.color="red";
		document.getElementById("errorlname").innerHTML="Votre nom doit contenir  uniquement des lettres";
	}
	// mash tansa .valueeee
	else if((psw2.value!="")&&(psw.value==""))
	{
		e.preventDefault();
		document.getElementById("errorpsw").style.color="red";
		document.getElementById("errorpsw").innerHTML="Votre devez taper votre ancien mot de passe";	
	}
	else if ((psw2.value!="")&&(psw3.value!=""))
	 {
	 	if(!strength(psw2.value))
	 	{
	 		e.preventDefault();
			document.getElementById("errorpsw2").style.color="red";
			document.getElementById("errorpsw2").innerHTML="Vous devez tapez un mot de passe plus sécurisé";
	 	}
	 }



	



});


var pass = document.getElementById("psw2");
      pass.addEventListener('keyup',function(){
          checkPassword(pass.value)
      });
      function checkPassword(password) {
          var strengthBar = document.getElementById("strength");
          var strength = 0;
          if(password.match(/(?=.*[0-9])+/)){
              strength +=1;
          }
          if(password.match(/(?=.*[a-z])+/)){
              strength +=1;
          }
          if(password.match(/(?=.*[A-Z])+/)){
              strength +=1;
          }
          if(password.match(/[!@£$%^&*()]+/)){
              strength +=1;
          }
          if(password.length>8){
              strength +=1;
          }
          switch (strength) {
              case 0:
                  strengthBar.value = 0;
                  break;
              case 1:
                  strengthBar.value = 20;
                  break;
              case 2:
                  strengthBar.value = 40;
                  break;
              case 3:
                  strengthBar.value = 60;
                  break;
              case 4:
                  strengthBar.value = 80;
                  break;
              case 5:
                  strengthBar.value = 100;
                  break;
          }

      }