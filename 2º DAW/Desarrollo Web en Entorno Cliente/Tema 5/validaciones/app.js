"use strict"

let formu1=document.getElementById("formu1");

formu1.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu1.children[2];
        let span=formu1.children[4];

        if(/r/i.test(input.value.trim())){
            span.classList.remove("mal");
            span.classList.add("bien");
            span.innerText="";
        }else{
            span.classList.remove("bien");
            span.classList.remove("mal");
            span.innerHTML="No tiene una r";
        }
    }
)

let formu2=document.getElementById("formu2");

formu2.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu2.children[2];
        let span=formu2.children[4];

        if(/^[0-9]$/.test(input.value.trim())){
            span.classList.remove("mal");
            span.classList.add("bien");
            span.innerText="";
        }else{
            span.classList.remove("bien");
            span.classList.remove("mal");
            span.innerHTML="No tiene números";
        }
    }
)

let formu3=document.getElementById("formu3");

formu3.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu3.children[2];
        let span=formu3.children[4];

        if(/^[0-9].*[a-z].*[0-9]$/.test(input.value.trim())){
            span.classList.remove("mal");
            span.classList.add("bien");
            span.innerText="";
        }else{
            span.classList.remove("bien");
            span.classList.remove("mal");
            span.innerHTML="No cumple con la expresión";
        }     
    }
)

let formu4=document.getElementById("formu4");

formu4.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu4.children[2];
        let span=formu4.children[4];

        
    }
)

let formu5=document.getElementById("formu5");

formu5.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu5.children[2];
        let span=formu5.children[4];

        span.classList.add("bien");
    }
)

let formu6=document.getElementById("formu6");

formu6.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu6.children[2];
        let span=formu6.children[4];

        
    }
)

let formu7=document.getElementById("formu7");

formu7.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu7.children[2];
        let span=formu7.children[4];

        span.classList.add("bien");
    }
)

let formu8=document.getElementById("formu8");

formu8.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu8.children[2];
        let span=formu8.children[4];

        
    }
)

let formu9=document.getElementById("formu9");

formu9.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu9.children[2];
        let span=formu9.children[4];
    
        
        if(/^[A-Za-z][0-9A-Za-z]{4,19}$/.test(input.value.trim())){
            span.classList.remove("mal");
            span.classList.add("bien");
            span.innerText="";
        }else{
            span.classList.remove("bien");
            span.classList.remove("mal");
            span.innerHTML="No cumple con la expresión";
        }     
    }
)

let formu10=document.getElementById("formu10");

formu9.addEventListener("submit",
    (evento)=>{
        evento.preventDefault();
        let input=formu10.children[2];
        let span=formu10.children[4];
    
    }
)