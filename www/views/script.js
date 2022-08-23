updateCartQuantityNotification();

function updateCartQuantityNotification() {
    let cart = localStorage.getItem("cart");
    if (cart === null || cart.length === 0) {
        document.getElementById("cart-quantity").innerHTML = "0";
        return;
    }
    cart = JSON.parse(cart);
    let quantity = 0
    for (let item of cart) {
        quantity += item.quantity;
    }
    document.getElementById("cart-quantity").innerHTML = quantity >= 9 ? "9" : quantity;
};

function onAddToCart(productId) {
    let cart = localStorage.getItem("cart");
    if (cart === null) {
        cart = []
    } else {
        cart = JSON.parse(cart);
    }
    let isExisted = false;
    for (let item of cart) {
        if (item.id === productId) {
            item.quantity++;
            isExisted = true;
        }
    }
    if (!isExisted) {
        cart.push({id: productId, quantity: 1})
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    updateCartQuantityNotification();
}
