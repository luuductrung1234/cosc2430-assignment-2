const userName = document.querySelector("#username");
const password = document.querySelector("#password");
const passwordConfirm = document.querySelector("#password_confirm");

const firstName = document.querySelector("#firstname");
const lastName = document.querySelector("#lastname");
const personalAddress = document.querySelector("#address");
const email = document.querySelector("#email");
const phone = document.querySelector("#phone");

const businessName = document.querySelector("#business_name");
const businessAddress = document.querySelector("#business_address");

const userNameAlert = document.querySelector("#username_alert");
const passwordAlert = document.querySelector("#password_alert");
const passwordConfirmAlert = document.querySelector("#password_confirm_alert");
const firstNameAlert = document.querySelector("#firstname_alert");
const lastNameAlert = document.querySelector("#lastname_alert");
const addressAlert = document.querySelector("#address_alert");
const emailAlert = document.querySelector("#email_alert");
const phoneAlert = document.querySelector("#phone_alert");
const businessNameAlert = document.querySelector("#business_name_alert");
const businessAddressAlert = document.querySelector("#business_address_alert");


const continueButton = document.querySelector("#register_continuebutton");

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

function verifyFirstName() {
    if (firstName === null || firstName === undefined)
        return true;
    let value = firstName.value;
    let pattern = (/^.{5,}$/);
    if (value === "") {
        firstNameAlert.innerHTML = `<span class="color_red">Please enter firstname</span>`;
    }else if(!value.match(pattern)){
        firstNameAlert.innerHTML = `<span class="color_red">Firstname must more than 5 characters</span>`;
        return false;
    }
    firstNameAlert.innerHTML = "";
    return true;
}

function verifyLastName() {
    if (lastName === null || lastName === undefined)
        return true;
    let value = lastName.value;
    let pattern = (/^.{5,}$/);
    if (value === "") {
        lastNameAlert.innerHTML = `<span class="color_red">Please enter lastname</span>`;
    }else if(!value.match(pattern)){
        lastNameAlert.innerHTML = `<span class="color_red">Lastname must more than 5 characters</span>`;
        return false;
    }
    lastNameAlert.innerHTML = "";
    return true;
}

function verifyAddress() {
    if (personalAddress === null || personalAddress === undefined)
        return true;
    let value = personalAddress.value;
    let pattern = (/^.{5,}$/);
    if (value === "") {
        addressAlert.innerHTML = `<span class="color_red">Please enter address</span>`;
    }else if(!value.match(pattern)){
        addressAlert.innerHTML = `<span class="color_red">Address must more than 5 characters</span>`;
        return false;
    }
    addressAlert.innerHTML = "";
    return true;
}

function verifyBusinessAddress() {
    if (businessAddress === null || businessAddress === undefined)
        return true;
    let value = businessAddress.value;
    let pattern = (/^.{5,}$/);
    if (value === "") {
        businessAddressAlert.innerHTML = `<span class="color_red">Please enter address</span>`;
    }else if(!value.match(pattern)){
        businessAddressAlert.innerHTML = `<span class="color_red">Address must more than 5 characters</span>`;
        return false;
    }
    businessAddressAlert.innerHTML = "";
    return true;
}

function verifyBusinessName() {
    if (businessName === null || businessName === undefined)
        return true;
    let value = businessName.value;
    let pattern = (/^.{5,}$/);
    if (value === "") {
        businessNameAlert.innerHTML = `<span class="color_red">Please enter business name</span>`;
    }else if(!value.match(pattern)){
        businessNameAlert.innerHTML = `<span class="color_red">Business name must more than 5 characters</span>`;
        return false;
    }
    businessNameAlert.innerHTML = "";
    return true;
}

function verifyEmail() {
    if (email === null || email === undefined)
        return true;
    let value = email.value;
    let pattern = (/^.{5,}$/);
    if (value === "") {
        emailAlert.innerHTML = `<span class="color_red">Please enter email</span>`;
    }else if(!value.match(pattern)){
        emailAlert.innerHTML = `<span class="color_red">Email must more than 5 characters</span>`;
        return false;
    }
    emailAlert.innerHTML = "";
    return true;
}

function verifyPhone() {
    if (phone === null || phone === undefined)
        return true;
    let value = phone.value;
    let pattern = (/^.{5,}$/);
    if (value === "") {
        phoneAlert.innerHTML = `<span class="color_red">Please enter phone</span>`;
    }else if(!value.match(pattern)){
        phoneAlert.innerHTML = `<span class="color_red">Phone must more than 5 numbers</span>`;
        return false;
    }
    phoneAlert.innerHTML = "";
    return true;
}

function isVerified(){
    let isNameVerified = verifyName();
    let isPasswordVerified = verifyPassword();
    let isPasswordMatched = matchPassword();
    let isFirstNameVerified = verifyFirstName();
    let isLastNameVerified = verifyLastName();
    let isAddressVerified = verifyAddress();
    let isEmailVerified = verifyEmail();
    let isPhoneVerified = verifyPhone();
    let isBusinessNameVerified = verifyBusinessName();
    let isBusinessAddressVerified = verifyBusinessAddress();

    if (isNameVerified && isPasswordVerified && isPasswordMatched
        && isFirstNameVerified && isLastNameVerified && isAddressVerified
        && isEmailVerified && isPhoneVerified && isBusinessNameVerified
        && isBusinessAddressVerified){
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
