$(document).ready(function(){
    
    //Function 1
    $(".retourEdit").click(function(){
       $(".editTraducteur").hide();
    });

    //Function 
    $('.btn-editTraducteur').click( function(){
        console.log($(this).parent().parent().index());
        $(`#editTraducteur${$(this).parent().parent().index()}`).show();
        });


});