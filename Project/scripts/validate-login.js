/*
*
*   Assert completed forms, no invalid characters, etc. before sending to be handled
*   by PHP. This will be used for login and account creation
*
*/

// change input colours based on bad input and form clear
function makeRed(inputElem) {
    inputElem.style.borderColor = "#AAAAAA";
}
function makeClean(inputElem) {
    inputElem.style.borderColor = "#FFFFFF";
}

window.onload = function() {
    var form = $("log-form");
    var reqInputs = $(".required");
}