import { makeToastNotification } from "./helper.js";
import { loadLogin } from "./login.js";
import { renderRegister } from "./register.js";

window.onload = () => {

    loadLogin()

    window.onclick = event => {

        const targetId = event.target.getAttribute("id")

        if (targetId === "to-register") {
            if (document.getElementById("register") === null) {
                renderRegister()
            }
        }

        if (targetId === "to-login") {
            if (document.getElementById("login") === null) {
                loadLogin()
            }
        }

        if (event.target.id === "eye-close") {
            const eye = document.getElementById("eye") 
            document.getElementById("eye-close").style.display = "none";
            eye.style.display = "block";
            eye.parentElement.previousElementSibling.setAttribute("type", "text");
        }
        
        if (event.target.id === "eye") {
            const eye = document.getElementById("eye")
            document.getElementById("eye-close").style.display = "block"; 
            eye.style.display = "none";
            eye.parentElement.previousElementSibling.setAttribute("type", "text");
        }
    } 

}