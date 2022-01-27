
var sum = 0 ; 
$('.slider').bind({
    
    slidechange : function(event,ui) {
    $('.slider').each(function(){
        var value = $( this ).slider( "option", "value" );
        if(value > 0 ) 
            sum += value ; 
        
        }); 
       var avg = sum / 3 ; 
       $('.average').val(avg);
       console.log(avg); 
    }
}).slider();

