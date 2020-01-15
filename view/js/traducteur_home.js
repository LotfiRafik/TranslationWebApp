$(document).ready(function(){

  //Function 1
    $("#retourOffre").click(function(){
      $(".infoDevis").hide();
    });
  
  
    //Function 2
    $("#devisRow").click(function(){
      var a = $('#devisRowNum').val();
      $(`#infoDevis${a}`).show();
    });

    
  //Function 3
  $("#retourDemande").click(function(){
    $(".infoDemande").hide();
  });


  //Function 4
  $("#demandeRow").click(function(){
    var a = $('#demandeRowNum').val();
    $(`#infoDemande${a}`).show();
  });


});