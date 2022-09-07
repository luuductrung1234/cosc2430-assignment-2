let cart = localStorage.getItem("cart");

(function checkCartEmpty() {
    cart = localStorage.getItem("cart");
    let temp = JSON.parse(cart);
    if (temp.length === 0) {
        let placeOrderBtn = document.getElementById("placeOrderBtn");
        placeOrderBtn.classList.add("disabled_button");
    }
})();


function removeItemFromCart(id) {
    cart = localStorage.getItem("cart");
    let temp = JSON.parse(cart);
    for (let i = 0; i < temp.length; i++) {
        if (temp[i]["id"] == id) {
            temp.splice(i, 1);
            localStorage.setItem("cart", JSON.stringify(temp));
            location.reload();
            break;
        }
    }
    cart = localStorage.getItem("cart");
    setCookie("cart", cart, 1);
}

function clearCart() {
    localStorage.setItem("cart", "[]")
}

function bankPaymentSelected() {
    let bankInformation = document.getElementById("bankInformation")
    bankInformation.classList = "";
}

function codPaymentSelected() {
    let bankInformation = document.getElementById("bankInformation")
    if (bankInformation.classList.length === 0)
        bankInformation.classList.add("collapse");
}
