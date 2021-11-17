window.onload = function() {

    var createForm = $("#create-form");
    var errmsg = $(".error-message");
    for(var i = 0; i < errmsg.length; i ++) {
        $(errmsg[i]).hide();
    }

    createForm.submit(function(e) {

        var reqInputs = $(".required");
        var err = [false, false, false];
        
        if(reqInputs[0].value.length != 8 || isNaN(reqInputs[0].value)) {
            err[0] = true;
            $(reqInputs[0]).css("border-color", "red");
            $(errmsg[0]).show();
        }

        if(reqInputs[1].value.length < 1 || reqInputs[1].value.length > 16) {
            err[1] = true;
            $(reqInputs[1]).css("border-color", "red");
            $(errmsg[1]).show();
        }

        if(reqInputs[1].value != reqInputs[2].value) {
            err[2] = true;
            $(reqInputs[2]).css("border-color", "red");
            $(errmsg[2]).show();
        }

        if(err[0] || err[1] || err[2]) {
            e.preventDefault();
        }

    });
}