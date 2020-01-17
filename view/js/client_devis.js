$(document).ready(function(){
    
    //Function 1
    $(".retourOffre").click(function(){
       $(".infoOffre").hide();
    });

    //Function 2
    $('#traducteur_table tr').click( function(){
        $(`#infoOffre${$(this).index()}`).show();
        });

    //Function 3
    $('#traduction_table tr').click( function(){
        $(`#infoTraduction${$(this).index()}`).show();
       });


    //Function 4
    $(".retourTraduction").click(function(){
        $(".infoTraduction").hide();
    });

      //Function 5
      $("#getTrad").click(function () {
        $.ajax({
        method: "POST",
        url: "./?p=getTrad",
        data:  {
            devis_id:$('#devis_id').val()
        },
        success: function (res) {
            if(res !== "false")
            {
                var objs = JSON.parse(res);
                $("#tableTraducteurs").html("");
                objs.forEach(obj=>{
                $("#tableTraducteurs").append(
                `<tr>
                    <td> ${obj['lastname']} </td>
                    <td> ${obj['firstname']} </td>
                    <td> ${obj['email']} </td>
                    <td><input type="checkbox" name="traducteursId[]" value="${obj['id']}"></td>
                    </tr>
                    `);
                });
                $("#divTraducteurs").css("display","block");
            }
            else{
                alert("Aucun Traducteur n'est disponible pour cette devis !!");
            }
        }
      })
    })



});