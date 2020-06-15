// cookies

Window.onload = cookie()
//execution de la function cookie au chargement de la page
function cookie() {

    let cookiebar = document.querySelector(".cookie");
    let hideCookie = document.getElementById('hideCookie');

    //écouteur sur le bouton
    hideCookie.addEventListener('click', function () {
        cookiebar.style.display = 'none';
        //ajout de la valeur dans localStorage
        localStorage.setItem("AcceptCookie", true)
    });

    //verification que la valeur est bien présente dans localStorage
    if (!localStorage.getItem("AcceptCookie")) {
        cookiebar.style.display = 'flex';
    }
}