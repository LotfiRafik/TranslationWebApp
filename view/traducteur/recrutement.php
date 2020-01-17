<link href="../css/recrutement.css" rel="stylesheet">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>


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
                                        <form id="signup-form" method="POST" action="?p=rec" >
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control input-lg" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control input-lg"  placeholder="Confirm Password *" value="" />
                                        </div>                 
                                        <div class="form-check">
                                            <label for="assermente"> Vous étes un traducteur assermenté :</label>
                                            <input class="form-check-input" type="checkbox" value="" id="assermente">
                                        </div>                
                                        <div class="form-group">
                                            <label for="ref_files">Upload up to 3 references files</label>
                                            <input type="file" class="form-control input-lg-file" id="ref_files" multiple>
                                        </div>
                                        <div class="form-group">
                                            <ol id="list_langue"></ol>
                                            <select id="lang_select">
                                                <?php
                                                   /* foreach ($data['langues'] as $l) {
                                                            ?>
                                                            <option value='<?php echo $l['id']; ?>'>
                                                            <?php echo $l['id']; ?>
                                                            </option>
                                                            <?php
                                                    }*/
                                                ?>
                                            </select>
                                            <button id="addlang">Add language</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control input-lg" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control input-lg" placeholder="Your Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <label for="cv">Upload CV</label>
                                            <input type="file" class="form-control input-lg-file" id="cv">
                                        </div><br>
                                        <div id="asserment_file" class="form-group" >
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

    $("form").submit(function(e){
        var $fileUpload = $("#ref_files");
        if (parseInt($fileUpload.get(0).files.length)>2){
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
        if(n>0) $("#asserment_file").html('<label for="assermente">Upload proove assermente</label><input type="file" class="form-control input-lg-file" id="asserfile" required>');
        else $("#asserment_file").html("");
    }); 
    
})
</script>

            