(function setFocusToTextBox() {
    let searchName = document.getElementById("searchName");
    searchName.focus();
    searchName.select();
})();

function resetForm() {
    let searchName = document.getElementById("searchName");
    let fromPrice = document.getElementById("fromPrice");
    let toPrice = document.getElementById("toPrice");
    searchName.value = "";
    fromPrice.value = "";
    toPrice.value = "";
}