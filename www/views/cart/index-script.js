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
