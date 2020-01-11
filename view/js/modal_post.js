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
          objs.forEach(obj=>{
            $("#tableTraducteurs").append(
            `<tr>
                <td> ${obj['lastname']} </td>
                <td> ${obj['firstname']} </td>
                <td> ${obj['email']} </td>
                <td><input type="checkbox" name="traducteur" value="${obj['id']}"></td>
              </tr>
            `);
        });
          $("#ddt-form").css("display","none");
          $("#divTraducteurs").css("display","block");
        }
    })
  })

  //Function 2
  $('#sendTraducteurs').click(function() {
    var traducteursId = [];
    $('#tableTraducteurs input[type="checkbox"]:checked').each(function() {
      traducteursId.push($(this).val());
    });
    console.log(traducteursId.join(','));
  })


});