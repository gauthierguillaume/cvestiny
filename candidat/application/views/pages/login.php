
<div class="row">
    <div class="container">

        <div class="col-sm- ">
            <?php echo form_open(''); ?>
            <div class="form-group">
                <?php  echo form_label('Email', 'cand_email', $attributes=array()); ?>
                <?php echo form_input('cand_email',set_value('cand_email'), $attributes=array("class" =>"form-control form-control-lg", "id" =>"cand_email"));  ?>
                <span class="text-danger"><?php echo form_error('cand_email') ; ?></span>
            </div>


            <div class="form-group">
                <?php  echo form_label('Mot de passe', 'cand_mdp', $attributes=array()); ?>
                <?php echo form_password('cand_mdp',set_value('cand_mdp'), $extra=array("class" =>"form-control form-control-lg", "id" =>"cand_mdp"));  ?>
                <span class="text-danger"><?php echo form_error('cand_mdp') ; ?></span>
            </div>

            <div class="form-group">
                    <?php echo form_submit('submitted', 'connexion','class="btn btn-primary" id="connexion"'); ?>
                <a href="<?php echo base_url('index'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>

            </div>
            <?php echo form_close(); ?>
        </div>

    </div>

</div>



<?php


