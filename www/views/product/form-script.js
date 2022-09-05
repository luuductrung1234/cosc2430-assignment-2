const productName = document.querySelector("#product-name");
const nameAlert = document.querySelector("#name-alert");

const productPrice = document.querySelector("#product-price");
const priceAlert = document.querySelector("#price-alert");

const productDescription = document.querySelector("#product-description");
const descriptionAlert = document.querySelector("#description-alert");

const productAddButton = document.querySelector("#product-add-button");



function validateProductName(showMessage){
    let name = productName.value;
    if (name === ''){
        if (showMessage)
            nameAlert.innerHTML = `<span style="color:red">Please give your product a name</span>`;
        return false;
    }
    else if (name.length < 10){
        if (showMessage)
            nameAlert.innerHTML = `<span style="color:red">Product name a has length from 10 to 20</span>`;
        return false;
    }
    else if (name.length > 20){
        if (showMessage)
            nameAlert.innerHTML = `<span style="color:red">Product name a has length from 10 to 20</span>`;
        productName.value = productName.value.substring(0, 20);
        return false;
    }
    else{
        nameAlert.innerHTML = `<span></span>`;
        return true;
    }
}


function validatePrice(showMessage){
    let price = productPrice.value;
    if (price>0){
        priceAlert.innerHTML = `<span></span>`;
        return true;
    }
    else{
        if (showMessage)
            priceAlert.innerHTML = `<span style="color:red">Price must be a positive number</span>`;
        return false;
    }
}


function validateDescription(showMessage){
    let text = productDescription.value
    if (text.length <= 500){
        descriptionAlert.innerHTML = `<span></span>`;
        return true;
    }
    else{
        if (showMessage)
            descriptionAlert.innerHTML = `<span style="color:red">Description can not be longer than 500 characters</span>`;
        productDescription.value = productDescription.value.substring(0, 500);
        return false;
    }
}  



function verify(){
    if (validateProductName(false) && validatePrice(false) && validateDescription(false)){
        productAddButton.disabled = false;
        //clearInterval(myInterval);
    }
    else{
        productAddButton.disabled = true;
    }
}

const myInterval = setInterval(verify, 1000)