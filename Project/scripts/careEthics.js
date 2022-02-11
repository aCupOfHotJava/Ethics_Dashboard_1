
$('.slider').on('input', function () {
    $(this).next('.range-value').html(this.value);
    $('.range-value').each(function () {
        var val = parseInt(this.innerHTML, 10);
        if (val !== 0) {
            valid_labels += 1;
            total += val;
        }
    });
    
    average = total / valid_labels;
    $('.average').val(average);
});

$('.savepopup').on('click',function(){
    alert("Your work has been saved.");
});

$('.submitpopup').on('click',function(){
    alert("Your work has been submitted.");
});

var total = 0,
    valid_labels = 0,
    average;

