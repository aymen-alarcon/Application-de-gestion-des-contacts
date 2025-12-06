let count = 1
let form = document.forms["connectionForm"]

document.querySelector(".password").addEventListener("click", ()=>{
    count++;
    if (count % 2 == 0) {  
        document.querySelector(".password").innerHTML ='<i class="bi bi-unlock-fill"></i>'
        form.password.setAttribute("type", "text")
    } else if (count % 2 == 1){
        document.querySelector(".password").innerHTML ='<i class="bi bi-lock-fill"></i>'
        form.password.setAttribute("type", "password")
    }
})

document.querySelector(".confirm-password").addEventListener("click", ()=>{
    count++;
    if (count % 2 == 0) {  
        document.querySelector(".confirm-password").innerHTML ='<i class="bi bi-unlock-fill"></i>'
        form.confirmPassword.setAttribute("type", "text")
    } else if (count % 2 == 1){
        document.querySelector(".confirm-password").innerHTML ='<i class="bi bi-lock-fill"></i>'
        form.confirmPassword.setAttribute("type", "password")
    }
})