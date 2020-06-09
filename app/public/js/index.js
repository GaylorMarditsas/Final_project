
function searchbar(){

    let search = document.getElementById('search').value;
    let img = document.createElement('img');
    
    if(search != ""){
        
        $.ajax({
            type: 'GET',
            url: 'index.php?action=search',
            data: 'search=' + encodeURIComponent(search),
            success: function(data){
                let result = document.getElementById("result"); // div with the future data
                let god = JSON.parse(data);
                
                if(data != ""){
                    result.innerHTML = ""; //make the div empty
                    //lien
                    let a = document.createElement('a');
                    a.setAttribute('href','index.php?action=god&id='+ god[0]["id"]);
                    //image 
                    let src = document.createAttribute("src");
                    src.value = god[0]["image"];
                    img.setAttributeNode(src);
                    a.appendChild(img);
                    result.appendChild(a);
                    //div for name and descritpion
                    let div = document.createElement('div');
                    result.appendChild(div);
                    //name of the god
                    let h2 = document.createElement('h2'); 
                    h2.setAttribute('class', 'name'); // add class to the h2
                    let name = document.createTextNode(god[0]["name"]); 
                    h2.appendChild(name);// add the name to the h2
                    a.appendChild(h2);
                    div.appendChild(a);
                    // description of the god
                    let p = document.createElement('p');
                    let description = document.createTextNode(god[0]['description']);
                    p.appendChild(description);
                    div.appendChild(p);
                }
            }
        })
    }
}

const CONTACT = document.forms['contact'];

if(CONTACT){
//slack
function slackMsg() {
    let name = $("#name").val();
    let email = $("#email").val();
    let message = $("#message").val();
    


    $.ajax({
            url: 'https://slack.com/api/chat.postMessage',
            type: 'POST',
            data: {
                    "channel": "bot",
                    "text": "Nom : " + name + '\n' + "Mail : " + email + '\n' +
                            "Message : " + message,
                    "token": creds.token
            },
            dataType: 'text',
    }).done(function (response) {
            //when it's done
            console.log(response)
    }).fail(function (error) {
            //when it fail
            console.error(error)
    });

};

//contact form
const EMAILVALID = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const NAMEVALID = /^([a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]{2,})+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]{2,})?$/;
    

document.forms['contact'].addEventListener('submit', function (e){

        let email = document.getElementById('email').value;
        let name = document.getElementById('name').value;

        //erreur
        let erreur;
        let msgError = document.getElementById('erreur');

        if(EMAILVALID.test(email) === false){
            erreur = "Entrez une adresse email valide !";
            e.preventDefault();
        }
        if(NAMEVALID.test(name) === false){
            erreur = "Entrez un nom valide !";
            e.preventDefault();
            
        }
        if(erreur){
            msgError.innerHTML = "<span>" + erreur + "</span>";
        }else{
            msgError.innerHTML = "";
            slackMsg();
            alert("Votre message à été envoyé !")
        }
    })
}


