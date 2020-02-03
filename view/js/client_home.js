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
            `
            <div class="col-xs-4 col-md-4">
              <div  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);  text-align: center;">
              <img src="Traducteurs/1/profile_picture.jpg" alt="John" style="width:50%">
              <h1><a target="_blank" href="?p=traducteurprofile&id=${obj['id']}">${obj['lastname']} ${obj['firstname']}</a></h1>
              <p>${obj['adress']} </p>
              <figure>
              <figcaption class="ratings">
                <p>Note
                <?php for(j=0;$j<$obj['moynote'];$j++) { ?>
                  <a href="#">
                  <span class="fa fa-star"></span>
                  </a>
                  <a href="#">
                  <span class="fa fa-star"></span>
                  </a>
                  <a href="#">
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  </a>										
                <?php }?>
                </p>
              </figcaption>
            </figure> 
              <div style="margin: 2px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
              </div>
                <input type="checkbox" name="traducteursId[]" value="${obj['id']}">
              </div>
            </div>

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

     //Function 3
     $("#addm").click(function(){
      $("#ddt-form2").show();
    });

    //Function 4
    $("#retour").click(function(){
       $(".infoOffre").hide();
    });
  
    //Function 1
    $("#demandeTraduction_form").submit(function () {
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
          $("#tableTraducteurs2").html("");
          $("#trad_checklist_form2").append(`<input type="hidden" name="devis_id" value="${objs['devis_id']}"  ></input>`);
          objs['traducteurs'].forEach(obj=>{
            $("#tableTraducteurs2").append(
            `
            <div class="col-xs-4 col-md-4">
              <div  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);  text-align: center;">
              <img src="Traducteurs/1/profile_picture.jpg" alt="John" style="width:50%">
              <h1><a target="_blank" href="?p=traducteurprofile&id=${obj['id']}">${obj['lastname']} ${obj['firstname']}</a></h1>
              <p>${obj['adress']} </p>
              <figure>
              <figcaption class="ratings">
                <p>Note
                <?php for(j=0;$j<$obj['moynote'];$j++) { ?>
                  <a href="#">
                  <span class="fa fa-star"></span>
                  </a>
                  <a href="#">
                  <span class="fa fa-star"></span>
                  </a>
                  <a href="#">
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  <span class="fa fa-star-o"></span>
                  </a>										
                <?php }?>
                </p>
              </figcaption>
            </figure> 
              <div style="margin: 2px 0;">
                <a href="#"><i class="fa fa-dribbble"></i></a> 
                <a href="#"><i class="fa fa-twitter"></i></a>  
                <a href="#"><i class="fa fa-linkedin"></i></a>  
                <a href="#"><i class="fa fa-facebook"></i></a> 
              </div>
                <input type="checkbox" name="traducteursId[]" value="${obj['id']}">
              </div>
            </div>

            `);
        });
          $("#ddt-form2").css("display","none");
          $("#divTraducteurs2").css("display","block");
        }
      else{
          $("#ddt-form2").css("display","none");
          alert("Votre demande a été enregistrer avec succes \n\n Aucun Traducteur correspond a votre recherce est disponible pour le moment :( ");
          location.reload(true);
      }
    }
    })
  })

});