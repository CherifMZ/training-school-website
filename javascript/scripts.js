
function diapoImage(m) {
    var i;
    var myIndex = 0;
    var x = document.getElementsByClassName(m);
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(diapoImage, 3); //3000 pour 3 secondes
}

//dropdown
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
 //dropdown : fermer le menu quand l'utilisateur clique en dehors
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

