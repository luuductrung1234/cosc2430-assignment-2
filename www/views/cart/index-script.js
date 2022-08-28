const localStorage_php = document.querySelector("#localStorage-var")

window.onload = function() {
	if(!window.location.hash) {
		window.location = window.location + '#loaded';
		window.location.reload();
	}
}

function onRemoveFromCart(productId) {
    let cart = localStorage.getItem("cart");
    if (cart === null) {
        cart = []
    } else {
        cart = JSON.parse(cart);
    }
    let index = 0;
    for (let item of cart) {
        if (item.id === productId) {
            index = cart.indexOf(item);
        }
    }
    if (index !== 0) {
        cart.slice(index, 1);
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartQuantityNotification();
}


function createCookie(name, value, days){
    let expires;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
      
    document.cookie = name + "=" + value + expires + "; path=/";
}
var cart = localStorage.getItem("cart");
createCookie("cart", cart, 1);



function removeItemFromCart(id){
    cart = localStorage.getItem("cart");
    let temp = JSON.parse(cart);
    for(i=0; i<temp.length; i++){
        if (temp[i]["id"] == id){
            temp.splice(i, 1);
            localStorage.setItem("cart", JSON.stringify(temp));
            location.reload();
            break
        }
    }
    var cart = localStorage.getItem("cart");
    createCookie("cart", cart, 1);
}