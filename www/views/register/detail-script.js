const userName = document.querySelector("#username");
const userNameAlert = document.querySelector("#username_alert")

const businessName = document.querySelector("#business_name");
const businessNameAlert = document.querySelector("#business_name_alert")

const password = document.querySelector("#password");
const passwordAlert = document.querySelector("#password_alert");
const passwordConfirm = document.querySelector("#password_confirm");
const passwordConfirmAlert = document.querySelector("#password_confirm_alert");

let url;

function verifyPassword(){
    let passwordInput = password.value;
    let pattern = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/);

    if (passwordInput == ""){
        passwordAlert.innerHTML = `<span class="color_red">Please enter password</span>`;
    }
    else if (passwordInput.match(pattern)){
        passwordAlert.innerHTML = `<span class="color_green">Valid password</span>`;
    }
    else{
        passwordAlert.innerHTML = `<span class="color_red">Password must contains at least one upper case letter, at least one lower case letter, at least one digit, at least one special letter in the set !@#$%^&*, NO other kind of characters, has a length from 8 to 20 characters</span>`;
    }
}

function matchPassword() {
    let passwordInput = password.value;
    let confirmInput = passwordConfirm.value;

    if (confirmInput == ''){
        passwordConfirmAlert.innerHTML = `<span></span>`;
    }else if (passwordInput == confirmInput) {
        passwordConfirmAlert.innerHTML = `<span class="color_green">password match!</span>`;

    } else {
        passwordConfirmAlert.innerHTML = `<span class="color_red">password does not match!</span>`;
    }
}

function verifyName() {
    let userNameValue = userName.value;
    let pattern = (/^[a-zA-Z\-].{8,15}$/); 
    if (userNameValue == "") {
        userNameAlert.innerHTML = `<span class="color_red">Please enter a username</span>`;
    }else if(userNameValue.match(pattern)){
        userNameAlert.innerHTML = `<span class="color_green">Available username</span>`;
    }
    else {
        userNameAlert.innerHTML = `<span class="color_red">Password must contain only letters(lower or upper) and has a length of 8-15 characters</span>`;
    }
}

function verifyBusinessName() {
    let businessNameValue = businessName.value;
    if (businessNameValue == "") {
        window.alert("write business name");
    } else {
        businessNameAlert.innerHTML = `<span class="color_green">${businessNameValue} is available username</span>`
    }
}

