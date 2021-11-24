$(document).ready(function(){
    $('input[id="op9-2"]').click(function(){
        if($(this).prop("checked") == true){
            console.log("Checkbox is tested.");
            $("form").submit(function(){
                alert("Submitted");
                window.location.href = "http://www.google.com";
             })
        }

    });
});