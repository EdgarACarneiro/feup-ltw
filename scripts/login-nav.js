function loginNavDisplay(){

    let parent = document.getElementsByTagName("ul")[0];
    
    let searchChild = document.getElementById("search");
    parent.removeChild(searchChild);

    let userChild = document.getElementById("user");
    parent.removeChild(userChild);

    //document.getElementById("search").style.display = "none";
    //document.getElementById("user").style.display = "none";
}