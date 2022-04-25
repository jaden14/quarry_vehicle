$(function() {
    $('#submitBtn').on('click', function(){
        $.notify("Data added successfully!", {
            autoHideDelay: 20000,
            showAnimation: "fadeIn",
            hideAnimation: "fadeOut",
            hideDuration: 700,
            arrowShow: false,
            className: "success"
        });
        
    });
});