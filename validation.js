const form = document.querySelector("form");
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");
const nickname = document.getElementById("nickname");
const adress = document.getElementById("adress");
const email = document.getElementById("email");
const phone = document.getElementById("phone");
const cin = document.getElementById("cin");
const datebirth = document.getElementById("datebirth");
const pass = document.getElementById("pass");
const cpass = document.getElementById("cpass");

const btn = document.querySelector(".sign");
let arr = [];
form.addEventListener('submit', (e) => {
    checkInputs();

    if (arr.length != 4) e.preventDefault();
});
function checkInputs() {
    const firstnameValue = firstname.value.trim();
    const lastnameValue = lastname.value.trim();
    const nicknameValue = nickname.value.trim();
    const adressValue = adress.value.trim();
    const phoneValue = phone.value.trim();
    const emailValue = email.value.trim();
    const cinValue = cin.value.trim();
    const datebirthValue = datebirth.value.trim();
    const passValue = pass.value.trim();
    const cpassValue = cpass.value.trim();

    if (firstnameValue === '') {
        setErrorFor(firstname, 'firstname cannot be blank');
    } else if ((firstname.value.lenght <= 3) | (firstname.value.lenght > 30)) {
        setErrorFor(firstname, "firstname is invalide");
    } else {
        setSuccessFor(firstname, "good");
        arr.push(true);
    }
    if (lastnameValue === '') {
        setErrorFor(lastname, 'lastname cannot be blank');
    } else if ((firstname.value.lenght <= 3) | (lastname.value.lenght > 30)) {
        setErrorFor(lastname, "lastname is invalide");
    } else {
        setSuccessFor(lastname, "good");
        arr.push(true);
    }
    if (nicknameValue === '') {
        setErrorFor(nickname, 'nickname cannot be blank');
    } else if ((nickname.value.lenght <= 3) | (nickname.value.lenght > 30)) {
        setErrorFor(nickname, "nickname is invalide");
    } else {
        setSuccessFor(nickname, "good");
        arr.push(true);
    }
    if (adressValue === '') {
        setErrorFor(adress, 'adress cannot be blank');
    } else if ((adress.value.lenght <= 3) | (adress.value.lenght > 30)) {
        setErrorFor(adress, "adress is invalide");
    } else {
        setSuccessFor(adress, "good");
        arr.push(true);
    }
    if (emailValue === '') {
        setErrorFor(email, 'email cannot be blank');
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, "Not a valid email")
    }
    else {
        setSuccessFor(email, "good");
        arr.push(true);
    }
    if (phoneValue === '') {
        setErrorFor(phone, 'phone cannot be blank');
    } else if ((phone.value.lenght <= 3) | (phone.value.lenght > 30)) {
        setErrorFor(phone, "phone is invalide");
    } else {
        setSuccessFor(phone, "good");
        arr.push(true);
    }
    if (cinValue === '') {
        setErrorFor(cin, 'cin cannot be blank');
    } else if ((cin.value.lenght <= 3) | (cin.value.lenght > 30)) {
        setErrorFor(cin, "cin is invalide");
    } else {
        setSuccessFor(cin, "good");
        arr.push(true);
    }
    if (datebirthValue === '') {
        setErrorFor(datebirth, 'date of birth cannot be blank');
    } else if ((datebirth.value.lenght <= 3) | (datebirth.value.lenght > 30)) {
        setErrorFor(datebirth, "date of birth is invalide");
    } else {
        setSuccessFor(datebirth, "good");
        arr.push(true);
    }

    if (passValue === '') {
        setErrorFor(pass, 'password cannot be blank');
    } else if (!ispass(passValue)) {
        setErrorFor(pass, "Not a valid password")
    }
    else {
        setSuccessFor(pass, "good");
        arr.push(true);
    }
    if (cpassValue === '') {
        setErrorFor(cpass, 'password cannot be blank');
    } else if (!ispass(cpassValue)) {
        setErrorFor(cpass, "Not a valid password")
    }
    else {
        setSuccessFor(cpass, "good");
        arr.push(true);
    }
}


function validatefirstname() {
    if (firstname.value.trim() === '') {
        setErrorFor(firstname, 'firstname cannot be blank');
    } else if ((firstname.value.lenght <= 3) | (firstname.value.lenght > 30)) {
        setErrorFor(firstname, "firstname is invalide");
    }
    else {
        setSuccessFor(firstname, "good");
    }
}
function validatelastname() {
    if (lastname.value.trim() === '') {
        setErrorFor(lastname, 'lastname cannot be blank');
    } else if ((lastname.value.lenght <= 3) | (lastname.value.lenght > 30)) {
        setErrorFor(lastname, "lastname is invalide");
    } else {
        setSuccessFor(lastname, "good");
        arr.push(true);

    }
}
function validatenickname() {
    if (nickname.value.trim() === '') {
        setErrorFor(nickname, 'nickname cannot be blank');
    } else if ((nickname.value.lenght <= 3) | (nickname.value.lenght > 30)) {
        setErrorFor(nickname, "nickname is invalide");
    } else {
        setSuccessFor(nickname, "good")
    }
}
function validateadress() {
    if (adress.value.trim() === '') {
        setErrorFor(adress, 'adress cannot be blank');
    } else if ((adress.value.lenght <= 3) | (adress.value.lenght > 30)) {
        setErrorFor(adress, "adress is invalide");
    } else {
        setSuccessFor(adress, "good")
    }
}
function validateemail() {
    if (email.value.trim() === '') {
        setErrorFor(email, 'email cannot be blank');
    } else if (!isEmail(email.value.trim())) {
        setErrorFor(email, "Not a valid email");
    }
    else {
        setSuccessFor(email, "good");
    }
}

function validatephone() {
    if (phone.value.trim() === '') {
        setErrorFor(phone, 'phone cannot be blank');
    } else if ((phone.value.lenght <= 3) | (phone.value.lenght > 30)) {
        setErrorFor(phone, "phone is invalide");
    } else {
        setSuccessFor(phone, "good")
    }
}
function validatecin() {
    if (cin.value.trim() === '') {
        setErrorFor(cin, 'cin cannot be blank');
    } else if ((cin.value.lenght <= 3) | (cin.value.lenght > 30)) {
        setErrorFor(cin, "cin is invalide");
    } else {
        setSuccessFor(cin, "good");
        arr.push(true);

    }
}
function validatedatebirth() {
    if (datebirth.value.trim() === '') {
        setErrorFor(datebirth, 'date of birth cannot be blank');
    } else if ((datebirth.value.lenght <= 3) | (datebirth.value.lenght > 30)) {
        setErrorFor(datebirth, "date of birth is invalide");
    } else {
        setSuccessFor(datebirth, "good");
        arr.push(true);

    }
}
function validatepass() {
    if (pass.value.trim() === '') {
        setErrorFor(pass, 'password cannot be blank');
    }
    else {
        setSuccessFor(pass, "good");
    }
}
function validatecpass() {
    if (cpass.value.trim() === '') {
        setErrorFor(cpass, 'password cannot be blank');
    }
    else {
        setSuccessFor(pass, "good");
    }
}
firstname.addEventListener('keyup', function () {
    validatefirstname()

})
nickname.addEventListener('keyup', function () {
    validatenickname()

})
adress.addEventListener('keyup', function () {
    validateadress()

})
email.addEventListener('keyup', function () {
    validateemail()

})
phone.addEventListener('keyup', function () {
    validatephone()

})
cin.addEventListener('keyup', function () {
    validatecin()

})
datebirth.addEventListener('keyup', function () {
    validatedatebirth()

})
pass.addEventListener('keyup', function () {
    validatepass()

})
cpass.addEventListener('keyup', function () {
    validatecpass()

})


function setErrorFor(theinput, message) {
    theinput.closest(".form").querySelector('small').innerText = message;
    console.log(theinput.closest(".form"));
    theinput.closest(".form").querySelector('small').style = "visibility:visible";
    theinput.closest(".form").className = "form error";
}
function setSuccessFor(theinput, message) {
    theinput.closest(".form").querySelector('small').innerText = message;
    theinput.closest(".form").querySelector('small').style = "visibility:visible";
    theinput.closest(".form").className = "form success";
}

function isEmail(email) {
    return /^\w+([\.-]?\w+)*@*(gmail)*(\.com)+$/.test(email);
}
function isPhone(phone) {
    return /^\w+([\.-]?\w+)+$/.test(phone);
}