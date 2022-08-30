updateCartQuantityNotification();
updateNavLink();

function updateNavLink() {
    let navOrder = document.getElementById("nav-order");
    let navHome = document.getElementById("nav-home");
    if (!navOrder || !navHome)
        return;
    navOrder.classList.remove("active");
    navHome.classList.remove("active");
    let currentLocation = window.location.href;
    if (currentLocation.endsWith("order")) {
        document.getElementById("nav-order").classList.add("active");
    } else {
        document.getElementById("nav-home").classList.add("active");
    }
}

function updateCartQuantityNotification() {
    if (document.getElementById("cart-quantity") === null)
        return;
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
}

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

function openCart() {
    let cart = localStorage.getItem("cart");
    if (cart === null)
        return;
    console.log(cart);
    setCookie('cart', cart, 1);
}

function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}