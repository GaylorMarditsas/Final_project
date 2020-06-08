
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

let contact = document.forms['contact'];

if(contact){
//slack
$("#submit").click(function () {
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

});

//contact form

    document.forms['contact'].addEventListener('submit', function (e){
        let inputs = this;
    
        for(let i =0; i < inputs.length; i++){
            console.log(inputs[i]);
            console.log(i);
        }
        
        e.preventDefault();
    })
}


