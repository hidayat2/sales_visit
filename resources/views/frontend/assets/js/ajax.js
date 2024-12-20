jQuery(document).ready(function($) {
    $('.btn-variant-1').click(function() {
        $('.btn-variant-1').removeClass('active');
        $(this).toggleClass('active');
    });
    $('.btn-variant-2').click(function() {
        $('.btn-variant-2').removeClass('active');
        $(this).toggleClass('active');
    });
    
    $('.variant').change(function() {
        var variant1 = $('input[name="variant-1"]:checked').val();
        var variant2 = $('input[name="variant-2"]:checked').val();

        
        console.log(variant1+' - '+variant2);

        // $.ajax({
        //     type: "POST",
        //     url:"action.php",
        //     data: {
        //         var1 : variant1,
        //         var1 : variant2,
        //     },
        //     success:function(result){
        //         // success
        // }});
    });
});  