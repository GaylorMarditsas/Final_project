// function search(){
//     let str = document.getElementById("search").value;
//     let gods= document.querySelectorAll(".name");
//     let godsName = [];
//     //je récupère les noms des dieux
//     Array.from(gods).forEach(function (name) { 
//         return godsName.push(name.innerText)
        
//         }); 
//     let found = godsName.find(element => element == str);
    
//     console.log(godsName.includes(found))
//     if(godsName.includes(found) == true){
//        document.getElementById('test').style.backgroundColor ="yellow";
//     }
//     else{
//         console.log("no match")
//     }

    
// }

//retourne un booleen si l'input match avec un nom de dieu (Case sensitive) mais pour la manipulation du dom , c'est undefined