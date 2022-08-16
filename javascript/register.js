// register 
function registerAlert(){
  window.alert("please check your user type");
}


// vendor
const userName=document.querySelector("#username");
const userNameAlert=document.querySelector("#username_alert");
const businessName=document.querySelector("#business_name");
const businessNameAlert=document.querySelector("#business_name_alert");



const password=document.querySelector("#password");
const passwordConfirm=document.querySelector("#password_confirm");
const passwordConfirmAlert=document.querySelector("#password_confirm_alert");


passwordConfirm.addEventListener("keyup",matchingPassword);



function matchingPassword(){
  let passwordInput=password.value;
  let passwordConfirmInput=passwordConfirm.value;
  if(passwordInput===passwordConfirmInput){
    passwordConfirmAlert.innerHTML=`<span class="color_green">password match!</span>`;

  }else{
    passwordConfirmAlert.innerHTML=`<span class="color_red">password does not match!</span>`;

  }
}

function verifyUsername(){
  let userNameInput=userName.value;
  userNameAlert.innerHTML=`<span class="color_green">${userNameInput} is available</span>`;
}
function verifyBusinessName(){
  let businessNameInput=businessName.value;
  businessNameAlert.innerHTML=`<span class="color_green">${businessNameInput} is available</span>`;
  console.log(businessName);
  console.log(businessNameInput);

}