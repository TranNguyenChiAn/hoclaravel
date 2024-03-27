$(document).ready(function () {
// refresh cart after add/update/delete product
    setInterval(function () {
        $('#productQuantity').load('/cart #myCart');
    }, 1000);
})





