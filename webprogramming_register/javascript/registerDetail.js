
const userName=document.querySelector("#username");
const userNameAlert=document.querySelector("#username_alert")

const businessName=document.querySelector("#business_name");
 const businessNameAlert=document.querySelector("#business_name_alert")

const password=document.querySelector("#password");
const passwordConfirm=document.querySelector("#password_confirm");
const passwordConfirmAlert=document.querySelector("#password_confirm_alert");

let url;





function matchPassword(){
  let passwordInput=password.value;
  let passwordConfirmInput=passwordConfirm.value;
  if(passwordInput===passwordConfirmInput){
    passwordConfirmAlert.innerHTML=`<span class="color_green">password match!</span>`;

  }else{
    passwordConfirmAlert.innerHTML=`<span class="color_red">password does not match!</span>`;

  }
}

function verifyName(){
  let userNameValue=userName.value;
  if(userNameValue==""){
    window.alert("write user name");

  }else{

    userNameAlert.innerHTML=`<span class="color_green">${userNameValue} is available username</span>`
    url="registerVendor.php?id="+userNameValue;
    console.log(url);

  }
  
  
}
function verifyName(){
  let userNameValue=userName.value;
  if(userNameValue==""){
    window.alert("write user name");

  }else{

    userNameAlert.innerHTML=`<span class="color_green">${userNameValue} is available username</span>`


  }
  
  
}
function verifyBusinessName(){
  let businessNameValue=businessName.value;
  if(businessNameValue==""){
    window.alert("write business name");

  }else{

    businessNameAlert.innerHTML=`<span class="color_green">${businessNameValue} is available username</span>`

  }

}
