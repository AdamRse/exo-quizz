if(document.querySelector("#btMenu")){
    let btMenu = document.querySelector("#btMenu");
    let divMenu = document.querySelector('#divMenu');
    btMenu.addEventListener("click", function(){
        divMenu.classList.toggle('hidden');
    })
}