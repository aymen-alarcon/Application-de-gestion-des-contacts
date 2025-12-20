let count = 1
let form = document.forms["connectionForm"]
let password = document.querySelector(".password")
let confirmPassword = document.querySelector(".confirm-password")
let contactForm = document.forms["contactForm"]
let searchBar = document.getElementById("search")

if (window.location.pathname.includes("contacts.php")) {
    let clickCount = 0
    document.querySelector('.editContactBtn').addEventListener("click", function () {
        clickCount++
        if (clickCount % 2 == 0) {            
            contactForm.submit.value = "createContact";
            contactForm.id.value = "";
            contactForm.nom.value = "";
            contactForm.prenom.value = "";
            contactForm.phone.value = "";
            contactForm.email.value = "";
            contactForm.address.value = "";
        } else {
            contactForm.submit.value = "updateContact";
            contactForm.id.value = this.dataset.id;
            contactForm.nom.value = this.dataset.fname;
            contactForm.prenom.value = this.dataset.lname;
            contactForm.phone.value = this.dataset.phone;
            contactForm.email.value = this.dataset.email;
            contactForm.address.value = this.dataset.address;
        }
    });

    document.querySelector('.deleteContactBtn').addEventListener("click", ()=>{
        contactForm.submit.value = "updateContact";
    })

    searchBar.addEventListener("change", ()=>{
        document.querySelectorAll(".nameOfContact").forEach(nameOfContact =>{
            let parentElement = nameOfContact.parentElement
            if (searchBar.value.includes(nameOfContact.textContent)) {
                parentElement.classList.remove("d-none")
            }else{
                parentElement.classList.add("d-none")
                console.log(2);
            }
        })
    })

    contactForm.clearButton.addEventListener("click", ()=>{
        contactForm.reset();
        contactForm.name.focus();
    })

    document.querySelectorAll(".deleteContactBtn").forEach(deleteBtn =>{
        deleteBtn.addEventListener("click", function(){
            document.getElementById("idContact").value = this.dataset.id;
        })
    })
}

if (window.location.pathname.includes("register.php") || window.location.pathname.includes("login.php")) {
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
}