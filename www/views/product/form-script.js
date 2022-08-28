const productName = document.querySelector("#product-name");
const nameAlert = document.querySelector("#name-alert");

const productPrice = document.querySelector("#product-price");
const priceAlert = document.querySelector("#price-alert");

const productDescription = document.querySelector("#product-description");
const descriptionAlert = document.querySelector("#description-alert");

const productAddButton = document.querySelector("#product-add-button");



function validateProductName(){
    let name = productName.value;
    if (name == ''){
        nameAlert.innerHTML = `<span style="color:red">Please give your product a name</span>`;
        return false
    }
    else if (name.length < 10){
        nameAlert.innerHTML = `<span style="color:red">Product name a has length from 10 to 20</span>`;
        return false
    }
    else if (name.length > 20){
        nameAlert.innerHTML = `<span style="color:red">Product name a has length from 10 to 20</span>`;
        productName.value = productName.value.substr(0, 20);
        return false
    }
    else{
        nameAlert.innerHTML = `<span></span>`;
        return true
    }
}


function validatePrice(){
    let price = productPrice.value;
    if (price>0){
        priceAlert.innerHTML = `<span></span>`;
        return true
    }
    else{
        priceAlert.innerHTML = `<span style="color:red">Price must be a positive number</span>`;
        return false
    }
}


function validateDescription(){
    let text = productDescription.value
    if (text.length <= 500){
        descriptionAlert.innerHTML = `<span></span>`;
        return true;
    }
    else{
        descriptionAlert.innerHTML = `<span style="color:red">Description can not be longer than 500 characters</span>`;
        productDescription.value = productDescription.value.substr(0, 500);
        return false;
    }
}  



function verify(){
    if (validateProductName() && validatePrice() && validateDescription()){
        productAddButton.disabled = false;
        clearInterval(myInterval);
    }
    else{
        productAddButton.disabled = true;
    }
}

const myInterval = setInterval(verify, 1000)