const bares = document.querySelector(".bares");
const buttonOpen = document.querySelector(".fa-bars");
const text = document.querySelector(".text");
const buttonClose = document.querySelector(".fa-xmark");




buttonOpen.onclick = () =>{
    bares.classList.toggle("active")
    
}


buttonClose.onclick = () =>{
    bares.classList.remove("active")
}

