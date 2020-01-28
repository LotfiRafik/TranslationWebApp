$(document).ready(function(){
    
    //Function 1
    $(".retourEdit").click(function(){
       $(".editClient").hide();
    });

    //Function 
    $('.btn-editClient').click( function(){
        console.log($(this).parent().parent().index());
        $(`#editClient${$(this).parent().parent().index()}`).show();
        });


});