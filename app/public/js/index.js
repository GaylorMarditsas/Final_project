
function searchbar(){

    let search = document.getElementById('search').value;
    
    if(search != ""){
        let test = document.getElementById("test").innerHTML="";
        $.ajax({
            type: 'GET',
            url: 'index.php?action=gods',
            data: 'search=' + encodeURIComponent(search),
            success: function(data){
                let test = document.getElementById("test");
                console.log(data);
                

                
        
            
            }
            
        })
    }
}

