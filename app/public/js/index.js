function searchbar() {

    let search = document.getElementById('search').value;
    let img = document.createElement('img');

    if (search != "") {

        $.ajax({
            type: 'GET',
            url: 'index.php?action=search',
            data: 'search=' + encodeURIComponent(search),
            success: function (data) {
                let result = document.getElementById("result"); // div with the future data
                let god = JSON.parse(data);

                if (data != "") {
                    result.innerHTML = ""; //reset de la div
                    //lien
                    let a = document.createElement('a');
                    a.setAttribute('href', 'dieu-' + god[0]["id"]);
                    //image 
                    let src = document.createAttribute("src");
                    src.value = god[0]["image"];
                    img.setAttributeNode(src);
                    a.appendChild(img);
                    result.appendChild(a);
                    //div pour le nom et la description
                    let div = document.createElement('div');
                    result.appendChild(div);
                    //Nom du dieu
                    let h2 = document.createElement('h2');
                    h2.setAttribute('class', 'name'); // Ajout de la classe au h2
                    let name = document.createTextNode(god[0]["name"]);
                    h2.appendChild(name); // Ajout du nom dans le h2
                    a.appendChild(h2);
                    div.appendChild(a);
                    // description du dieu
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

if (CONTACT) {
    //slack
    function slackMsg() {
        let name = $("#name").val();
        let email = $("#email").val();
        let message = $("#message").val();
        console.log(phpVars);

        $.ajax({
            url: 'https://slack.com/api/chat.postMessage',
            type: 'POST',
            data: {
                "channel": "bot",
                "text": "Nom : " + name + '\n' + "Mail : " + email + '\n' +
                    "Message : " + message,
                "token": phpVars.API_KEY
                
            },
            dataType: 'text',
        }).done(function (response) {
            //Si c'est ok
            console.log(response)
        }).fail(function (error) {
            //Si c'est pas ok
            console.error(error)
        });

    };
    // Plusieurs duplications ci-dessous, refactorisation prévues
    //contact form
    const EMAILVALID = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const NAMEVALID = /^([a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]{2,})+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]{2,})?$/;


    document.forms['contact'].addEventListener('submit', function (e) {

        let email = document.getElementById('email').value;
        let name = document.getElementById('name').value;

        //erreur
        let erreur;
        let msgError = document.getElementById('erreur');

        if (EMAILVALID.test(email) === false) {
            erreur = "Entrez une adresse email valide !";
            e.preventDefault();
        }
        if (NAMEVALID.test(name) === false) {
            erreur = "Entrez un nom valide !";
            e.preventDefault();

        }
        if (erreur) {
            msgError.innerHTML = "<span>" + erreur + "</span>";
        } else {
            msgError.innerHTML = "";
            alert("Votre message à été envoyé !")
            slackMsg();
        }
    })
}


const GODCREATE = document.forms['create-god'];

if (GODCREATE) {
    GODCREATE.addEventListener('submit', function (e) {

        let msgError = document.getElementById('erreur');
        let erreur;

        let ext = ['jpg', 'jpeg', 'png'];
        let image = this['image'].value;
        image = image.split('.');

        //récupération de l'extension de l'image
        if (ext.includes(image.pop()) != true) {
            erreur = "Le format de votre image n'est pas pris en charge";
            console.log(ext.includes(image.pop()))
        }

        //champs vide
        for (let i = 0; i < this.length; i++) {
            if (this[i].value == "") {
                erreur = "Tous les champs sont obligatoire";
            }
        }
        //affichage de l'erreur
        if (erreur) {
            msgError.innerHTML = "<span>" + erreur + "</span>";
            e.preventDefault();
        } else {
            msgError.innerHTML = "";
        }

    })
}
const GODUPDATE = document.forms['update-god'];

if (GODUPDATE) {
    GODUPDATE.addEventListener('submit', function (e) {

        let msgError = document.getElementById('erreur');
        let erreur;

        let ext = ['jpg', 'jpeg', 'png'];
        let image = this['image'].value;
        image = image.split('.');


        if (this['image'].value != "" && ext.includes(image.pop()) != true) {
            erreur = "Le format de votre image n'est pas pris en charge";
        }

        //champs vide
        if (this['name'].value, this['description'].value, this['content'].value == "") {
            erreur = 'Les champs "Nom" , "Description" et "Contenu" sont requis !';
        }

        if (erreur) {
            msgError.innerHTML = "<span>" + erreur + "</span>";
            e.preventDefault();
        } else {
            msgError.innerHTML = "";
        }

    })
}
const GALLERYCREATE = document.forms['create-gallery'];

if (GALLERYCREATE) {
    GALLERYCREATE.addEventListener('submit', function (e) {

        let msgError = document.getElementById('erreur');
        let erreur;

        let ext = ['jpg', 'jpeg', 'png'];
        let image = this['image'].value;
        image = image.split('.');

        if (image == "") {
            erreur = "Veuillez séléctionner une image !"
        } else if (ext.includes(image.pop()) != true) {
            erreur = "Le format de votre image n'est pas pris en charge";
        }



        if (erreur) {
            msgError.innerHTML = "<span>" + erreur + "</span>";
            e.preventDefault();
        } else {
            msgError.innerHTML = "";
        }

    })
}
