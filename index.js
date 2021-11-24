const target = document.querySelectorAll(".produto");
console.log(target);
window.addEventListener("scroll",()=>{
    //  console.log(window.pageYOffset)
    target.forEach(element => {
        //console.log(element.offsetTop);
        if(window.pageYOffset +400 > element.offsetTop){
            element.classList.add('animate')
        }
    });

});