const button = document.querySelector("#button");
const popup = document.querySelector(".pop") ;
const closes = document.querySelector(".fa-xmark") ;


button.onclick = () =>{
    popup.classList.add("active")
    ensemble.classList.add("newe");
}

closes.onclick = () =>{
    popup.classList.remove("active")
    
}





