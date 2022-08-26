const userName = document.querySelector("#username");
const userNameAlert = document.querySelector("#username_alert");

const businessName = document.querySelector("#business_name");
const businessNameAlert = document.querySelector("#business_name_alert");

const password = document.querySelector("#password");
const passwordAlert = document.querySelector("#password_alert");
const passwordConfirm = document.querySelector("#password_confirm");
const passwordConfirmAlert = document.querySelector("#password_confirm_alert");

const continueButton = document.querySelector("#register_continuebutton");

let url;

function verifyPassword(){
    let passwordInput = password.value;
    let pattern = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/);

    if (passwordInput == ""){
        passwordAlert.innerHTML = `<span class="color_red">Please enter password</span>`;
    }
    else if (passwordInput.match(pattern)){
        passwordAlert.innerHTML = `<span class="color_green">Valid password</span>`;
        return true;
    }
    else{
        passwordAlert.innerHTML = `<span class="color_red">Password must contains at least one upper case letter, one lower case letter, one digit, and one special letter in the set !@#$%^&*, NO other kind of characters, must have 8 to 20 characters</span>`;
    }
    return false;
}

function matchPassword() {
    let passwordInput = password.value;
    let confirmInput = passwordConfirm.value;

    if (confirmInput == ''){
        passwordConfirmAlert.innerHTML = `<span></span>`;
    }else if (passwordInput == confirmInput) {
        passwordConfirmAlert.innerHTML = `<span class="color_green">password match!</span>`;
        return true;
    } else {
        passwordConfirmAlert.innerHTML = `<span class="color_red">password does not match!</span>`;
    }
    return false;
}

function verifyName() {
    let userNameValue = userName.value;
    let pattern = (/^[a-zA-Z0-9].{8,15}$/); 
    if (userNameValue == "") {
        userNameAlert.innerHTML = `<span class="color_red">Please enter a username</span>`;
    }else if(userNameValue.match(pattern)){
        userNameAlert.innerHTML = `<span class="color_green">Available username</span>`;
        return true;
    }
    else {
        userNameAlert.innerHTML = `<span class="color_red">Username must contain only letters(lower or upper), digits and contains of 8-15 characters</span>`;
    }
    return false;
}


function isVerified(){
    let isNameVerified = verifyName();
    let isPasswordVerified = verifyPassword();
    let isPasswordMatched = matchPassword();

    if (isNameVerified && isPasswordVerified && isPasswordMatched){
        continueButton.disabled = false;
        alert("You can continue")
    }
    else{
        continueButton.disabled = true;
    }
}

function usernameExisted(){
    userNameAlert.innerHTML = `<span class="color_red">Username already existed</span>`;
}

function businessExisted(){
    businessNameAlert.innerHTML = `<span class="color_red">Business Name/Address already existed</span>`;
}
