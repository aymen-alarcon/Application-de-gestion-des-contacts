let count = 1
let form = document.forms["connectionForm"]
let password = document.querySelector(".password")
let confirmPassword = document.querySelector(".confirm-password")
let contactForm = document.forms["contactForm"]
let editContactForm = document.forms["editContactForm"]
let searchBar = document.getElementById("search")

if (window.location.pathname.includes("contacts.php")) {
    searchBar.addEventListener("change", ()=>{
        document.querySelectorAll(".nameOfContact").forEach(nameOfContact =>{
            let parentElement = nameOfContact.parentElement
            console.log(nameOfContact.textContent);
            console.log(parentElement);
            console.log(searchBar.value);          
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

    document.querySelectorAll(".editContactBtn").forEach(btn => {
        btn.addEventListener("click", function() {
            editContactForm.id.value = this.dataset.id;
            editContactForm.nom.value = this.dataset.fname;
            editContactForm.prenom.value = this.dataset.lname;
            editContactForm.phone.value = this.dataset.phone;
            editContactForm.email.value = this.dataset.email;
            editContactForm.ville.value = this.dataset.city;
            editContactForm.paye.value = this.dataset.country;
            editContactForm.restofaddress.value = this.dataset.rest;
        });
    });
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