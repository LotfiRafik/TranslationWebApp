$(document).ready(function(){

  //Function 1
    $("#devis_form").submit(function () {
      $.ajax({
      method: "POST",
      url: "./?p=reqdevis",
      processData: false,
      contentType: false,
      data:  new FormData(this),
      success: function (res) {
          var objs = JSON.parse(res);
          $("#tableTraducteurs").html("");
          console.log(objs);
          $("#trad_checklist_form").append(`<input type="hidden" name="devis_id" value="${objs['devis_id']}"  ></input>`);
          objs['traducteurs'].forEach(obj=>{
            $("#tableTraducteurs").append(
            `<tr>
                <td> ${obj['lastname']} </td>
                <td> ${obj['firstname']} </td>
                <td> ${obj['email']} </td>
                <td><input type="checkbox" name="traducteursId[]" value="${obj['id']}"></td>
              </tr>
            `);
        });
          $("#ddt-form").css("display","none");
          $("#divTraducteurs").css("display","block");
        }
    })
  })


    //Function 2
    $("#RetourDemandeDevis").click(function(){
      $("#divTraducteurs").hide();
      $("#ddt-form").show();
    });
  
  
    //Function 3
    $("#addv").click(function(){
      $("#ddt-form").show();
    });

    //Function 4
    $("#retour").click(function(){
       $(".infoOffre").hide();
    });
  
    //Function 5
    $("#offreRow").click(function(){
     var a = $('#offreRowNum').val();
     $(`#infoOffre${a}`).show();
    });



});