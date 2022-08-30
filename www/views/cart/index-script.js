// window.onload = function () {
//     if (!window.location.hash) {
//         window.location = window.location + '#loaded';
//         window.location.reload();
//     }
// }
//
// function createCookie(name, value, days) {
//     let expires;
//     if (days) {
//         var date = new Date();
//         date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
//         expires = "; expires=" + date.toGMTString();
//     } else {
//         expires = "";
//     }
//
//     document.cookie = name + "=" + value + expires + "; path=/";
// }
//
// let cart = localStorage.getItem("cart");
// createCookie("cart", cart, 1);

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
        if (temp[i]["id"] === id) {
            temp.splice(i, 1);
            localStorage.setItem("cart", JSON.stringify(temp));
            location.reload();
            break
        }
    }
    let cart = localStorage.getItem("cart");
    setCookie("cart", cart, 1);
}

function clearCart() {
    localStorage.setItem("cart", "[]")
}