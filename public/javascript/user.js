
let profile = document.getElementById("showprofil");
let show = document.getElementById("showcommandes")

function mesCommandes(){
    profile.style.display = "none";
    show.style.display = "block";
}
function monProfile(){
    profile.style.display = "block";
    show.style.display = "none";
}

window.addEventListener('load', function() {
show.style.display = 'none';
}); 

