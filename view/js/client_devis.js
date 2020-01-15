$(document).ready(function(){
    

    //Function 1
    $("#retourOffre").click(function(){
       $(".infoOffre").hide();
    });
  
    //Function 2
    $("#offreRow").click(function(){
     var a = $('#offreRowNum').val();
     $(`#infoOffre${a}`).show();
    });

    //Function 3
    $("#retourTraduction").click(function(){
        $(".infoTraduction").hide();
    });
    //Function 4
    $("#traductionRow").click(function(){
        var a = $('#traductionRowNum').val();
        $(`#infoTraduction${a}`).show();
    });



});