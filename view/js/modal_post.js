$(document).ready(function(){


    $("#login").submit(function () {
    $.ajax({
      method: "POST",
      url: "./?p=connexion",
      data : {
          email: $("#email").val(),
          password: $("#password").val(),
          type: $("input[name='type']:checked").val(),
      },
      success: function (res) {
          if (res == "true") {
              alert("Mot de passe ou email incorrect");
          }

        }
    })
  })


});