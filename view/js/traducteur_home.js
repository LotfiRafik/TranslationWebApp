$(document).ready(function(){

  //Function 1
    $(".retourOffre").click(function(){
      $(".infoDevis").hide();
    });

    $('#devis_table tr').click( function(){
      $(`#infoDevis${$(this).index()}`).show();
      });

  //Function 3
  $(".retourDemande").click(function(){
    $(".infoDemande").hide();
  });

  $('#demande_table tr').click( function(){
    $(`#infoDemande${$(this).index()}`).show();
    });


});