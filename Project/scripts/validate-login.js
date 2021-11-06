/*
*
*   Assert completed forms, no invalid characters, etc. before sending to be handled
*   by PHP. This will be used for login and account creation
*
*/

window.onload = function() {

    var loginform = $("#login-form");
    $("#error0").hide();
    $("#error1").hide();

    loginform.submit(function(e) {

        var reqInputs = $(".required");
        var err = [false, false];
        // sid must be 8 digits long
        if(reqInputs[0].value.length != 8 || isNaN(reqInputs[0].value)) {
            err[0] = true;
            $(reqInputs[0]).css("border-color", "red");
            $("#error0").show();
        }
        // password must be 1-16 characters long
        if(reqInputs[1].value.length < 1 || reqInputs[1].value.length > 16) {
            err[1] = true;
            $(reqInputs[1]).css("border-color", "red");
            $("#error1").show();
        }

        // if no error, clear colour
        if(!err[0]) {
            $(reqInputs[0]).css("border-color", "white");
            $("#error0").hide();
        }
        if(!err[1]) {
            $(reqInputs[1]).css("border-color", "white");
            $("#error1").hide();
        }

        // do not let PHP run if any errors - try again
        if(err[0] || err[1]) {
            e.preventDefault();
        }

    });
    
}