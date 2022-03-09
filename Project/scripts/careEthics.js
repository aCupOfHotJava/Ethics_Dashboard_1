
var total = 0,
valid_labels = 0,
average;


$('.s1').on('input', function () {
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



    

    $('.s2').on('input', function () {
        $(this).next('.range-value2').html(this.value);

           $('.range-value2').each(function () {
               var val = parseInt(this.innerHTML, 10);
               if (val !== 0) {
                   valid_labels += 1;
                   total += val;
               }
           });
           
           average = total / valid_labels;
           $('.average2').val(average);
       });
       

       $('.s3').on('input', function () {
        $(this).next('.range-value').html(this.value);

           $('.range-value').each(function () {
               var val = parseInt(this.innerHTML, 10);
               if (val !== 0) {
                   valid_labels += 1;
                   total += val;
               }
           });
           
           average = total / valid_labels;
           $('.average3').val(average);
       });