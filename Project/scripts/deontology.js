$(document).ready(function(){
    if ($('input[id="op9-2"]').is(':checked')) {
        if($(this).prop("checked") == true){
            console.log("Checkbox is tested.");
            $("form").submit(function(){
                alert("Submitted");
                document.location.href = "";
            })
        }

    };
});
