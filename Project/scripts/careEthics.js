
$('.slider').on('input', function () {
    $(this).next('.range-value').html(this.value);
});

$(".slider").slider({

    slide: function( event, ui ) {
        if ($(this).hasClass("avg")){
            event.preventDefault();
            return false;
        }
        
        var sliders = $(".slider:not(.avg)");
        var val = 0, len = sliders.length;
        sliders.each(function(i, ele){
            val += $(ele).slider("option", "value");
        });

        var newVal = Math.round(val/len);
        
        $(".slider.avg").slider("option", "value", newVal);
    }
});


