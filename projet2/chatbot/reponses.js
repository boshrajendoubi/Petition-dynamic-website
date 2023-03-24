function getBotResponse(input){
    if(/oui|OUI|Oui/.test(input)) //regex tester s'il sagit du mot oui ou pas
    {
        let txt=document.getElementById('textInput');
        txt.disabled=true; // ici ca va
        

        return "d\'accord";
    }
    else if (/non|NON|Non/.test(input))
    {
        return "ok mais si vous avez besoin n\'hesitez pas a nous le dire";
    }
    else {
        setTimeout(() => {
            let botHtml1='<p class="botText"><span>Merci, on va essayer de vous contacter des que possible</span></p>';   
            $("#chatbox").append(botHtml1);  
        }, 1000)
        let txt=document.getElementById('textInput');
        txt.disabled=true;
    }
   
}
function question1(){
    let botHtml = '<p class="botText"><span>Afin de supprimer une petition vous devez aller sur votre profil puis petition cree  , vous selectionnez la petition a supprimer et ensuite vous confirmez votre choix!</span></p>';
    $("#chatbox").append(botHtml);
    let list= '<select size="3" id="testselection" class="botText"><option onclick="question1()">comment supprimer une petition</option><option onclick="question2()">les reponses sont elles anonymes</option><option onclick="question3()">Comment signer une petition?</option><option onclick="question4()">Comment creer un compte?</option><option onclick="question5()">comment ajouter une petition</option><option onclick="question6()">Autre question</option></select>';
    $("#chatbox").append(list); 

}
function question2(){
    let botHtml = '<p class="botText"><span>Afin d\'assurer la securite des visiteurs de notre site et par respect a leur vie privee et a leurs propres choix et avis , les reponses ainsi que les signatures seront anonymes aux createurs des petitions ainsi qu\'aux autres personnes ayant signe la meme petition que vous .<br>Finalement il faut dire que vos donnees qu\'on collecte  a travers votre inscription dans le site sont juste pour des raisons statistiques et vont rester toujours anonymes et pour s\'assurer qu\'il ne s\'agit pas de bots.<br>Merci pour votre comprehension!</span></p>';
    $("#chatbox").append(botHtml);
    let list= '<select size="3" id="testselection" class="botText"><option onclick="question1()">comment supprimer une petition</option><option onclick="question2()">les reponses sont elles anonymes</option><option onclick="question3()">Comment signer une petition?</option><option onclick="question4()">Comment creer un compte?</option><option onclick="question5()">comment ajouter une petition</option><option onclick="question6()">Autre question</option></select>'
    $("#chatbox").append(list); 

}
function question3(){
    let botHtml = '<p class="botText"><span>Pour signer une petition vous devez avoir un compte tout d\'abord, puis vous cherchez la petition qui vous plait, assurez vous de lire attentivement la description de la petition puis vous cliquez le boutton signez!</span></p>';
    $("#chatbox").append(botHtml);
    let list= '<select size="3" id="testselection" class="botText"><option onclick="question1()">comment supprimer une petition</option><option onclick="question2()">les reponses sont elles anonymes</option><option onclick="question3()">Comment signer une petition?</option><option onclick="question4()">Comment creer un compte?</option><option onclick="question5()">comment ajouter une petition</option><option onclick="question6()">Autre question</option></select>'
    $("#chatbox").append(list); 

}
function question4(){
    let botHtml = '<p class="botText"><span>Vous devez tout simplement visiter la rubrique "Creer un compte" ensuite vous tapez les informations necessaires en s\'assurant de saisir un mail qui n\'appartient a aucun compte</span></p>';
    $("#chatbox").append(botHtml);
    let list= '<select size="3" id="testselection" class="botText"><option onclick="question1()">comment supprimer une petition</option><option onclick="question2()">les reponses sont elles anonymes</option><option onclick="question3()">Comment signer une petition?</option><option onclick="question4()">Comment creer un compte?</option><option onclick="question5()">comment ajouter une petition</option><option onclick="question6()">Autre question</option></select>'
    $("#chatbox").append(list); 

}
function question5(){
    let botHtml = '<p class="botText"><span>Pour ajouter une petition vous devez avoir un compte actif, si c\'est le cas vous devez juste aller dans la rubrique d\'ajout d\'une petition, puis vous tapez le titre de cette derniere  ainsi que le sujet et vous importez une image si vous voulez et tout simplement cliquez sur creer la petition</span></p>';
    $("#chatbox").append(botHtml);
    let list= '<select size="3" id="testselection" class="botText"><option onclick="question1()">comment supprimer une petition</option><option onclick="question2()">les reponses sont elles anonymes</option><option onclick="question3()">Comment signer une petition?</option><option onclick="question4()">Comment creer un compte?</option><option onclick="question5()">comment ajouter une petition</option><option onclick="question6()">Autre question</option></select>'
    $("#chatbox").append(list); 

}
function question5(){
    let botHtml = '<p class="botText"><span>Pour ajouter une petition vous devez avoir un compte actif, si c\'est le cas vous devez juste aller dans la rubrique d\'ajout d\'une petition, puis vous tapez le titre de cette derniere  ainsi que le sujet et vous importez une image si vous voulez et tout simplement cliquez sur creer la petition</span></p>';
    $("#chatbox").append(botHtml);
    let list= '<select size="3" id="testselection" class="botText"><option onclick="question1()">comment supprimer une petition</option><option onclick="question2()">les reponses sont elles anonymes</option><option onclick="question3()">Comment signer une petition?</option><option onclick="question4()">Comment creer un compte?</option><option onclick="question5()">comment ajouter une petition</option><option onclick="question6()">Autre question</option></select>'
    $("#chatbox").append(list); 

}
function question6(){
    let userHtml = '<p class="userText"><span>Autre question</span></p>';

    //$("#textInput").val("");
    $("#chatbox").append(userHtml);
    let botHtml='<p class="botText"><span>Priere de poser votre question ici et un admin vous contactera des que possible</span></p>';
    $("#chatbox").append(botHtml);
    
    let txt=document.getElementById('textInput');
    txt.disabled=false; // jusqua ici ca marche  ely baadou fyh moshkla
  /*  getResponse();
    botHtml='<p class="botText"><span>Merci, on va essayer de vous contacter des que possible</span></p>';   
    $("#chatbox").append(botHtml);*/

    let userText = $("#textInput").val();
    if(userText!=""){
    //let userText=txt.innerHTML; //essai
    userHtml = '<p class="userText"><span>' + userText + '</span></p>';
    $("#chatbox").append(userHtml);
    $("#textInput").val("");
    document.getElementById("chat-bar-bottom").scrollIntoView(true);}
   /* let botHtml1= '<p class="botText"><span>Merci, on va essayer de vous contacter des que possible</span></p>';   
    $("#chatbox").append(botHtml1);

    setTimeout(() => {
        botHtml1='<p class="botText"><span>Merci, on va essayer de vous contacter des que possible</span></p>';   
        $("#chatbox").append(botHtml1);  
    }, 1000)
   
    txt.disabled=true;

}
    //$("#chatbox").append(userHtml);
    /*
    document.getElementById("chat-bar-bottom").scrollIntoView(true);

    setTimeout(() => {
        botHtml='<p class="botText"><span>Merci, on va essayer de vous contacter des que possible</span></p>';     
    }, 1000)
   
    txt.disabled=true;*/


}
