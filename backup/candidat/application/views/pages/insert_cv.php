
<?php echo form_open(); ?>
<div class="container site">
    <h1 class="text-logo"> Création Cv </h1>
    <nav>
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="#1" data-toggle="tab">Information Personelle</a></li>
            <li role="presentation" ><a href="#2" data-toggle="tab">Compétence technique</a></li>
            <li role="presentation" ><a href="#3" data-toggle="tab">Compétence Organisationnelle</a></li>
            <li role="presentation" ><a href="#4" data-toggle="tab">Formation</a></li>
            <li role="presentation" ><a href="#5" data-toggle="tab">Loisirs</a></li>

        </ul>
    </nav>

    <?php echo form_open(); ?>
    <div class="tab-content">
        <div class="tab-pane active" id="1">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <?php if (isset($_SESSION['success'])) { ?> <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>

                    <?php } ?>

                    <?php  echo form_label('Pr&eacute;nom', 'cand_prenom', $attributes=array()); ?>
                    <?php echo form_input('cand_prenom',set_value('cand_prenom', ($this->session->userdata("candidat"))['prenom']), $attributes=array("class" =>"form-control form-control-lg", "id" =>"cand_prenom"));  ?>
                    <span class="text-danger"><?php echo form_error('cand_prenom') ; ?></span>

                    <?php  echo form_label('Nom', 'cand_nom', $attributes=array()); ?>
                    <?php echo form_input('cand_nom',set_value('cand_nom', ($this->session->userdata("candidat"))['nom']), $attributes=array("class" =>"form-control form-control-lg", "id" =>"cand_nom"));  ?>
                    <span class="text-danger"><?php echo form_error('cand_nom') ; ?></span>

                    <label for="cand_adresse">Adresse</label>
                    <input type="text" class="form-control form-control-lg" name="cand_adresse" value="">
                    <span class="text-danger"><?php echo form_error('cand_adresse') ; ?></span>

                    <label for="cand_telephone">Tél</label>
                    <input type="text"  class="form-control form-control-lg" name="cand_telephone" value="">
                    <span class="text-danger"><?php echo form_error('cand_telephone') ; ?></span>

                    <label for="cand_email">Email</label>
                    <input type="text" class="form-control form-control-lg" name="cand_email" value="<?php echo ($this->session->userdata("candidat"))['email']; ?>">
                    <span class="text-danger"><?php echo form_error('cand_email') ; ?></span>

                    <label for="cand_code_postal">Code postal</label>
                    <input type="text" class="form-control form-control-lg" name="cand_code_postal" value="">
                    <span class="text-danger"><?php echo form_error('cand_code_postal') ; ?></span>
                    <label for="cand_date_naissance">Date de naissance</label>
                    <input type="date" class="form-control form-control-lg" name="cand_date_naissance" value="">
                    <span class="text-danger"><?php echo form_error('cand_date_naissance') ; ?></span>

                </div>
            </div>
            <div class="form-group">
                <a href="<?php echo base_url('#2'); ?>" data-toggle="tab"><input  class="btn btn-primary" type="button" value="Suivant"></a>
                <a href="<?php echo base_url('index'); ?>"><input  class="btn btn-primary" type="button" value="Retour à l'accueil"></a>
            </div>
        </div>
        <div class="tab-pane " id="2">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <fielset>
                        <?php // TODO: competence technique?>
                        <h3> Compétence technique</h3>
                        <?php
                        foreach ($tech as $row)
                        {
                            echo '<div>
                                                        <label for="competencetech">'.$row->competence_tech_nom.'</label>
                                                        <input type="checkbox" name="competencetech[]" value="'.$row->id.'">
                                                    </div>';
                        }
                        echo 'Total Results: ' .count($tech).'<br>';
                        //         TODO: competence Organisationnelle
                        ?>
                        <div class="form-group">
                            <a href="<?php echo base_url('#3'); ?>" data-toggle="tab"><input  class="btn btn-primary" type="button" value="Suivant"></a>
                            <a href="<?php echo base_url('#1'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>
                        </div>
                    </fielset>
                </div>
            </div>
        </div>

        <div class="tab-pane " id="3">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <fielset>
                        <h3> Compétence Organisationnelle</h3>
                        <?php

                        foreach ($orga as $row)
                        {
                            echo '<div>
                                    <label for="competenceorga">'.$row->competence_orga_nom.'</label>
                                    <input type="checkbox" name="competenceorga[]" value="'.$row->id.'">
                                </div>';

                        }
                        echo 'Total Results: ' .count($orga).'<br>';

                        ; ?>
                        <div class="form-group">
                            <a href="<?php echo base_url('#4'); ?>" data-toggle="tab"><input  class="btn btn-primary" type="button" value="Suivant"></a>
                            <a href="<?php echo base_url('#2'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>
                        </div>
                    </fielset>
                </div>
            </div>
        </div>

        <div class="tab-pane " id="4">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <legend>Formation</legend>
                    <div class="form-group">
                        <label for="dip_nom">Diplome</label>
                        <input type="text" id="dip_nom" name="">
                        <span class="text-danger"><?php echo form_error('dip_nom') ; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="dip_ecole">Ecole d'obtention</label>
                        <input type="text" id="dip_eccole" name="">
                        <span class="text-danger"><?php echo form_error('dip_ecole') ; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="dip_date_obtention">Date d'obtention</label>
                        <input type="date" id="dip_date_obtention" name=""><br>
                        <span class="text-danger"><?php echo form_error('dip_date_obtention') ; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="dip_description">Description diplome</label>
                        <textarea placeholder="description du diplome" id="dip_description" name="dip_description"
                                  rows="5" cols="33">
                                             </textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="<?php echo base_url('#5'); ?>" data-toggle="tab"><input  class="btn btn-primary" type="button" value="Suivant"></a>
                <a href="<?php echo base_url('#3'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>
            </div>

        </div>

        <div class="tab-pane " id="5">
            <div class="row">
                <div class="col-sm-6 col-md-4">

                    <legend>Losirs</legend>
                    <label for="cand_loisir_nom">Vos Losirs</label>
                    <textarea placeholder="vos loisir " id="cand_loisir_nom" name="cand_loisir_nom"
                              rows="5" cols="33">
                            </textarea>

                </div>
            </div>
            <div class="form-group">
                <?php echo form_submit('submitted', 'Enregistrer','class="btn btn-primary" id=""'); ?>
                <a href="<?php echo base_url('#4'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>
            </div>
        </div>

    </div>
</div>
</div>
<?php echo form_close(); ?>