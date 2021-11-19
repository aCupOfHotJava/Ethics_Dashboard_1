// Ethical solutions to a dilemma
var numOptions = 0;
$("#add-option").click(function() {
    $("#ethics-options-wrapper").append('<textarea id = "option-text" class = "textarea" placeholder = "Enter your option here."></textarea>');
    $("#empty").remove();
    $("#add-option").hide();
    $("#ethics-options-wrapper").append('<button class = "button" id = "submit-option">Submit</button>');
    $("#submit-option").click(function() {
        numOptions ++;
        $("#submit-option").remove();
        var text = $('textarea#option-text').val().replaceAll('\n', '<br>');
        $('#ethics-options-wrapper').append('<p class = "header">Option ' + numOptions + '</p>');
        $('#ethics-options-wrapper').append('<div class = "box">' + text + '</div>');
        $('#option-text').remove();
        $('#add-option').show();
    })
})

// Ethical dilemma
$('#add-dilemma').click(function() {
    var text = $('#dilemma-text').val().replaceAll('\n', '<br>');
    $('#dilemma-box').append('<p>' + text + '</p>');
    $('#dilemma-text').remove();
    $('#add-dilemma').remove();
})

$('.slider').on('input', function () {
    $(this).next('.range-value').html(this.value);
});

$('.savepopup').on('click',function(){
    alert("Your work has been saved.");
});

$('.submitpopup').on('click',function(){
    alert("Your work has been submitted.");
});

function redirect()
{
   if(document.getElementById("op9").checked == true)
        window.location.href = "Project/html/Deontology/Deontology2.html";
   else if(document.getElementById("op1").checked == true)
        window.location.href = 'http://www.google.com';        
}