var password = document.getElementById("password")
  , confirm_password = document.getElementById("cpassword");
function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    }
    else {
        confirm_password.setCustomValidity('');
    }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

var pin = document.getElementById("pin")
  , validate_pin = document.getElementById("vpin");
function validatePin(){
    if(pin.value != validate_pin.value) {
        validate_pin.setCustomValidity("Pins Don't Match");
    }
    else {
        validate_pin.setCustomValidity('');
    }
}
pin.onchange = validatePin;
validate_pin.onkeyup = validatePin;