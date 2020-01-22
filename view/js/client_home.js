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
        if(objs['traducteurs'] !== false)
        {
          $("#tableTraducteurs").html("");
          $("#trad_checklist_form").append(`<input type="hidden" name="devis_id" value="${objs['devis_id']}"  ></input>`);
          objs['traducteurs'].forEach(obj=>{
            $("#tableTraducteurs").append(
            `<tr>
                <td> ${obj['lastname']} </td>
                <td> ${obj['firstname']} </td>
                <td> ${obj['email']} </td>
                <td><a target="_blank" href="?p=traducteurprofile&id=${obj['id']}">Profile</a></td>
                <td><input type="checkbox" name="traducteursId[]" value="${obj['id']}"></td>
              </tr>
            `);
        });
          $("#ddt-form").css("display","none");
          $("#divTraducteurs").css("display","block");
        }
      else{
          $("#ddt-form").css("display","none");
          alert("Votre demande a été enregistrer avec succes \n\n Aucun Traducteur correspond a votre recherce est disponible pour le moment :( ");
          location.reload(true);
      }
    }
    })
  })
    
    //Function 3
    $("#addv").click(function(){
      $("#ddt-form").show();
    });

    //Function 4
    $("#retour").click(function(){
       $(".infoOffre").hide();
    });
  

});