
<div class="row">

    <div class="container">
        <h1 class="text-center titl" style="margin-bottom: 30px; color: red "> Enregistrement</h1>
        <?php if (isset($_SESSION['success'])) { ?> <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>

        <?php } ?>
        <div class="col-sm- ">
            <?php echo form_open(); ?>
            <div class="form-group">
                <?php  echo form_label('Pr&eacute;nom', 'cand_prenom', $attributes=array()); ?>
                <?php echo form_input('cand_prenom',set_value('cand_prenom'), $attributes=array("class" =>"form-control form-control-lg", "id" =>"cand_prenom"));  ?>
                <span class="text-danger"><?php echo form_error('cand_prenom') ; ?></span>
            </div>

            <div class="form-group">
                <?php  echo form_label('Nom', 'cand_nom', $attributes=array()); ?>
                <?php echo form_input('cand_nom',set_value('cand_nom'), $attributes=array("class" =>"form-control form-control-lg", "id" =>"cand_nom"));  ?>
                <span class="text-danger"><?php echo form_error('cand_nom') ; ?></span>
            </div>

            <div class="form-group">
                <?php  echo form_label('Email', 'cand_email', $attributes=array()); ?>
                <?php echo form_input('cand_email',set_value('cand_nom'), $attributes=array("class" =>"form-control form-control-lg", "id" =>"cand_email"));  ?>
                <span class="text-danger"><?php echo form_error('cand_email') ; ?></span>
            </div>

            <div class="form-group">
                <?php  echo form_label('Sexe', 'cand_sexe', $attributes=array()); ?>
                <?php
                $option = array(
                    ""=> "choisissez votre sexe",
                    "homme" =>"Homme",
                    "femme" => "Femme"
                );
                ?>
                <?php echo form_dropdown('cand_sexe', $option,set_value('cand_sexe'), array("class" => "form-control form-control-lg", "id" =>"cand_sexe")); ?>
                <span class="text-danger"><?php  echo form_error('cand_sexe') ; ?></span>
            </div>

            <div class="form-group">
                <?php  echo form_label('Mot de Passe', 'cand_mdp', $attributes=array()); ?>
                <?php echo form_password('cand_mdp',set_value('cand_mdp'), $extra=array("class" =>"form-control form-control-lg", "id" =>"cand_mdp"));  ?>
                <span class="text-danger"><?php echo form_error('cand_mdp') ; ?></span>
            </div>

            <div class="form-group">
                <?php  echo form_label('Confirmer le Mot de Passe', 'cand_mdp2', $attributes=array()); ?>
                <?php echo form_password('cand_mdp2',set_value('cand_mdp2'), $extra=array("class" =>"form-control form-control-lg", "id" =>"cand_mdp2"));  ?>
                <span class="text-danger"><?php echo form_error('cand_mdp2') ; ?></span>
            </div>

            <div class="form-group">
            <?php echo form_submit('submitted', 'S\'enregistrer','class="btn btn-primary" id=""'); ?>
                <a href="<?php echo base_url('index'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>
                <a href="<?php echo base_url('login'); ?>"><input  class="btn btn-primary" type="button"
                                                                value="Connexion"></a>
            </div>
            <?php echo form_close(); ?>
        </div>

    </div>

</div>