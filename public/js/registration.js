function checkForm() {
    Object.keys(formStatus).length !== 6 || 
    Object.values(formStatus).includes(false);
}

function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}



function checkName(event) {
    const input = event.currentTarget;
    
    if (formStatus[input] = input.value.length > 0) {
        input.parentNode.parentNode.querySelector('span').textContent = "";
        input.parentNode.parentNode.classList.remove('error');
    } else {
        input.parentNode.parentNode.querySelector('span').textContent = "Errore: campo vuoto";
        input.parentNode.parentNode.classList.add('error');
    }
    checkForm();
}



function checkUsername(event) {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,20}$/.test(input.value)) {
        input.parentNode.parentNode.querySelector('span').textContent = "Username non valido: usare massimo 20 caratteri (numeri e lettere e _)";
        input.parentNode.parentNode.classList.add('error');
        formStatus.username = false;
        checkForm();
    } else { // Passo al controllo in php la stringa inserita
        fetch(REGISTRATION_ROUTE+"/username/"+encodeURIComponent(input.value)).then(onResponse).then(jsonCheckUsername);
    }
}

function jsonCheckUsername(json){
    // json = true se username esiste già, false altrimenti
    if (formStatus.username = !json) {
        document.querySelector('.username').classList.remove('error');
        document.querySelector('.username span').textContent = "";
    } else {
        document.querySelector('.username span').textContent = "Username già in uso";
        document.querySelector('.username').classList.add('error');
    }
    checkForm();
}



function checkEmail(event) {
    const emailInput = document.querySelector('.email input');

    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('error');
        formStatus.email = false;
        checkForm();
    } else { // Passo al controllo in php la stringa inserita
        fetch(REGISTRATION_ROUTE+"/email/"+encodeURIComponent(String(emailInput.value).toLowerCase())).then(onResponse).then(jsonCheckEmail);
    }
}

function jsonCheckEmail(json) {
    // json = true se email esiste già, false altrimenti
    if (formStatus.email = !json) {
        document.querySelector('.email').classList.remove('error');
        document.querySelector('.email span').textContent = "";
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('error');
    }
    checkForm();
}



function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('error');
        document.querySelector('.password span').textContent = "";
    } else {
        document.querySelector('.password').classList.add('error');
        document.querySelector('.password span').textContent = "Password non valida: usare minimo 8 caratteri";
    }
    checkForm();
}

function checkConfirmPassword(event) {
    const confermaPasswordInput = document.querySelector('.conf_password input');
    if (formStatus.confermaPassord = confermaPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.conf_password').classList.remove('error');
        document.querySelector('.conf_password span').textContent = "";
    } else {
        document.querySelector('.conf_password').classList.add('error');
        document.querySelector('.conf_password span').textContent = "Le password non coincidono";
    }
    checkForm();
}



const formStatus = {'upload': true};
checkForm();
document.querySelector('.name input').addEventListener('blur', checkName); // blur => il focus esce dalla casella di testo
document.querySelector('.surname input').addEventListener('blur', checkName);
document.querySelector('.username input').addEventListener('blur', checkUsername); 
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.conf_password input').addEventListener('blur', checkConfirmPassword);

if (document.querySelector('.error') !== null) {
    checkName()
    checkUsername();
    checkEmail();
    checkPassword();
    checkConfirmPassword();
}