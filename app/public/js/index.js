
function searchbar(){

    let search = document.getElementById('search').value;
    let img = document.createElement('img');
    
    if(search != ""){
        
        $.ajax({
            type: 'GET',
            url: 'index.php?action=search',
            data: 'search=' + encodeURIComponent(search),
            success: function(data){
                let test = document.getElementById("test");
                console.log(JSON.parse(data));
                let god = JSON.parse(data);
                
                if(data != ""){
                    let src = document.createAttribute("src");
                    src.value = god[0]["image"];
                    img.setAttributeNode(src);
                   test.append(img);
                }else{
                    test.innerHTML = "<p>Aucune correspondance trouvée</p>"
                }

            }
        })
    }
}


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
            console.log(error)
    });

});

