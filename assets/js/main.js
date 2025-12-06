let count = 1
let form = document.forms["connectionForm"]

document.querySelector("#password").addEventListener("click", ()=>{
    count++;
    if (count % 2 == 0) {        
        document.querySelector("#password").innerHTML ='<i class="bi bi-unlock-fill"></i>'
        form.password.setAttribute("type", "text")
    } else{
        document.querySelector("#password").innerHTML ='<i class="bi bi-lock-fill"></i>'
        form.password.setAttribute("type", "password")
    }
})