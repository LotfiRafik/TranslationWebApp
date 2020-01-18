<link href="view/css/recrutement.css" rel="stylesheet">


<?php
    var_dump($data['error']);
?>
<div class="container register">
                <div class="row">
                <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Bienvenue</h3>
                        <p>Vous êtes à 30 secondes de gagner votre propre argent!</p>
                    </div>
                    <div class="col-md-9 register-right">
                                <h3 class="register-heading">Créér un compte Traducteur</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <form id="signup-form" method="POST" action="?p=recrutement" enctype='multipart/form-data' >
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" name="firstname" placeholder="Prénom *" required/>
                                        </div> 
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg"  name="lastname"  placeholder="Nom *" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control input-lg" name="password"  placeholder="Password *" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control input-lg" name="rpassword"  placeholder="Confirm Password *" required />
                                        </div>                 
                                        <div class="form-check">
                                            <label for="assermente"> Vous étes un traducteur assermenté :</label>
                                            <input class="form-check-input" type="checkbox" name="assermente"  value="" id="assermente">
                                        </div>                
                                        <div class="form-group">
                                            <label for="ref_files">Charger jusqu’à 3 fichiers de ces références:</label>
                                            <input type="file" class="form-control input-lg-file" name="referenceFiles" id="ref_files" multiple>
                                        </div>
                                        <div class="form-group">
                                            <ol id="list_langue"></ol>
                                            <select id="lang_select">
                                                <?php
                                                   foreach ($data['langues'] as $l) {
                                                            ?>
                                                            <option value='<?php echo $l['id']; ?>'>
                                                            <?php echo $l['id']; ?>
                                                            </option>
                                                            <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="button" class="btn" id="addlang">Ajouter une langue</button>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control input-lg" name="email"  placeholder="Votre Email *" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="tel" class="form-control input-lg" required placeholder="Your Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="cv">Upload CV</label>
                                            <input type="file" name="cv" class="form-control input-lg-file" required id="cv">
                                        </div><br>
                                        <div  class="form-group" >
                                        <label for="assermente">Upload proove assermente</label>
                                        <input id="asserment_file" type="file" class="form-control input-lg-file"name="assermenteFile" >
                                        </div>
                                    </div>
                                </div>     
                                <input type="submit" class="btnRegister"  value="Register"/>

                                    </form>                    
                             </div>
                </div>
            </div>
<script>
$(document).ready(function(){

    var max_lang = 5;
    var nb_lang = 0;

    $("form").submit(function(e){
        var $fileUpload = $("#ref_files");
        if (parseInt($fileUpload.get(0).files.length)>3){
         alert("You can only upload a maximum of 3 files");
         e.preventDefault();
        }
        var n = $("input:checked").length;
        if(n>0){
            var $fileUpload = $("#asserfile");
            if (parseInt($fileUpload.get(0).files.length)<=0)
            {
                 alert("preuve assermente");
                 e.preventDefault();
            }
        }
    });

    $("#assermente").click(function(){
        var n = $("input:checked").length;
        if(n>0) $("#asserment_file").prop('required',true);
        else $("#asserment_file").prop('required',false);
    });

    $("#addlang").click(function(){
        console.log($('#list_langue li').length + 1);
        if($('#list_langue li').length + 1 < 6)
        {
            var langue = $('#lang_select :selected').val();
            $('#list_langue').append('<li><input name="langues[]" placeholder="'+ langue +'" value="'+ langue +'"><button  type="button"  class="glyphicon glyphicon-remove"  style="color:red"></button></li>');
        }
        else{
            alert("Vous ne pouvez plus ajouter une langue ! ");
        }

    });
    $('#list_langue').on('click', '.glyphicon-remove', function() { 
            $(this).parent().remove();
       });
    
})
</script>

            