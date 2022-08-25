document.getElementsByClassName("shipper-header-title")[0].innerHTML = "Shipper Home Page";

$(document).ready(function () {

    $('.toggle-btn').click(function () {
        $(this).toggleClass('active').siblings().removeClass('active');
    });

});