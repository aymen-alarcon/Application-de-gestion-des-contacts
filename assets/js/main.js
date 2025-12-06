let count = 1
let form = document.forms["connectionForm"]
let password = document.querySelector(".password")
let confirmPassword = document.querySelector(".confirm-password")

password.addEventListener("click", ()=>{
    count++;
    if (count % 2 == 0) {  
        password.innerHTML ='<i class="bi bi-unlock-fill"></i>'
        form.password.setAttribute("type", "text")
    } else if (count % 2 == 1){
        password.innerHTML ='<i class="bi bi-lock-fill"></i>'
        form.password.setAttribute("type", "password")
    }
})

confirmPassword.addEventListener("click", ()=>{
    count++;
    if (count % 2 == 0) {  
        confirmPassword.innerHTML ='<i class="bi bi-unlock-fill"></i>'
        form.confirmPassword.setAttribute("type", "text")
    } else if (count % 2 == 1){
        confirmPassword.innerHTML ='<i class="bi bi-lock-fill"></i>'
        form.confirmPassword.setAttribute("type", "password")
    }
})

form.confirmPassword.addEventListener("input", ()=>{
    if (form.confirmPassword.value.toLowerCase().trim() !== form.password.value.toLowerCase().trim()) {
        document.querySelector(".password-check-container").innerHTML = "<div class='text-danger'>your password doesn't match</div>"
    }else{
        document.querySelector(".password-check-container").innerHTML = ""
    }
})