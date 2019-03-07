
<?php echo form_open(); ?>
<div class="container site">
    <h1 class=" text-center" style="color: #1e4d84; margin-bottom: 20px; text-transform: uppercase "> Création Cv </h1>
    <nav style="margin-bottom: 30px;">
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="#1" data-toggle="tab">Informations Personelles</a></li>
            <li role="presentation" ><a href="#2" data-toggle="tab">Compétences Techniques</a></li>
            <li role="presentation" ><a href="#3" data-toggle="tab">Compétences Organisationnelles</a></li>
            <li role="presentation" ><a href="#4" data-toggle="tab">Formations</a></li>
            <li role="presentation" ><a href="#5" data-toggle="tab">Expériences</a></li>
            <li role="presentation" ><a href="#6" data-toggle="tab">Loisirs</a></li>

        </ul>
    </nav>

    <?php echo form_open(); ?>
         <div class="tab-content">
                    <div class="tab-pane active" id="1">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <?php if (isset($_SESSION['success'])) { ?> <div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>

                                <?php } ?>
                                <h3 style="color: #1e4d84; margin-bottom: 20px;"> Informations</h3>
                                <?php  echo form_label('Pr&eacute;nom', 'cand_prenom', $attributes=array()); ?>
                                <?php echo form_input('cand_prenom',set_value('cand_prenom', ($this->session->userdata("candidat"))['prenom']), $attributes=array("class" =>"form-control form-control-lg", "id" =>"cand_prenom"));  ?>
                                <span class="text-danger"><?php echo form_error('cand_prenom') ; ?></span>

                                <?php  echo form_label('Nom', 'cand_nom', $attributes=array()); ?>
                                <?php echo form_input('cand_nom',set_value('cand_nom', ($this->session->userdata("candidat"))['nom']), $attributes=array("class" =>"form-control form-control-lg", "id" =>"cand_nom"));  ?>
                                <span class="text-danger"><?php echo form_error('cand_nom') ; ?></span>

                                <label for="cand_adresse">Adresse</label>
                                <input type="text" class="form-control form-control-lg" name="cand_adresse" value="">
                                <span class="text-danger"><?php echo form_error('cand_adresse') ; ?></span>

                                <label for="cand_telephone">Téléphone</label>
                                <input type="text"  class="form-control form-control-lg" name="cand_telephone" value="">
                                <span class="text-danger"><?php echo form_error('cand_telephone') ; ?></span>

                                <label for="cand_email">Email</label>
                                <input type="text" class="form-control form-control-lg" name="cand_email" value="<?php echo ($this->session->userdata("candidat"))['email']; ?>">
                                <span class="text-danger"><?php echo form_error('cand_email') ; ?></span>

                                <label for="cand_code_postal">Code Postal</label>
                                <input type="text" class="form-control form-control-lg" name="cand_code_postal" value="">
                                <span class="text-danger"><?php echo form_error('cand_code_postal') ; ?></span>
                                <label for="cand_date_naissance">Date de Naissance</label>
                                <input type="date" class="form-control form-control-lg" name="cand_date_naissance" value="">
                                <span class="text-danger"><?php echo form_error('cand_date_naissance') ; ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo base_url('#2'); ?>" data-toggle="tab"><input  class="btn btn-primary" type="button" value="Étape Suivante"></a>
                            <a href="<?php echo base_url('index'); ?>"><input  class="btn btn-primary" type="button" value="Retour à l'Accueil"></a>
                        </div>
                    </div>

                    <div class="tab-pane " id="2">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <fielset>
                                    <?php // TODO: competence technique?>
                                    <h3 style="color: #1e4d84; margin-bottom: 20px;"> Compétences Techniques</h3>
                                    <?php
                                    foreach ($tech as $row)
                                    {
                                        echo '<div>
                               <label for="competencetech">'.$row->competence_tech_nom.'</label>
                              <input type="checkbox" name="competencetech[]" value="'.$row->id.'"> </div>';
                                    }
//                                    echo 'Total Results: ' .count($tech).'<br>';
                                    //         TODO: competence Organisationnelle
                                    ?>
                                    <div class="form-group">
                                        <a href="<?php echo base_url('#3'); ?>" data-toggle="tab"><input  class="btn btn-primary" type="button" value="Étape Suivante"></a>
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
                                    <h3 style="color: #1e4d84; margin-bottom: 20px;"> Compétences Organisationnelles</h3>
                                    <?php

                                    foreach ($orga as $row)
                                    {
                                        echo '<div>
                                    <label for="competenceorga">'.$row->competence_orga_nom.'</label>
                                    <input type="checkbox" name="competenceorga[]" value="'.$row->id.'">
                                            </div>';
                                    }
//                                    echo 'Total Results: ' .count($orga).'<br>';
                                    ; ?>
                                    <div class="form-group">
                                        <a href="<?php echo base_url('#4'); ?>" data-toggle="tab"><input  class="btn btn-primary" type="button" value="Étape Suivante"></a>
                                        <a href="<?php echo base_url('#2'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>
                                    </div>
                                </fielset>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane " id="4">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <h3 style="color: #1e4d84; margin-bottom: 20px;">Formations</h3>
                                <div class="form-group">
                                    <label for="dip_nom">Nom du Diplôme</label>
                                    <input type="text" id="dip_nom" name="dip_nom">
                                    <span class="text-danger"><?php echo form_error('dip_nom') ; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="dip_ecole">Nom de l'École</label>
                                    <input type="text" id="dip_eccole" name="dip_eccole">
                                    <span class="text-danger"><?php echo form_error('dip_ecole') ; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="dip_date_obtention">Date d'Obtention du Diplôme</label>
                                    <input type="date" id="dip_date_obtention" name="dip_date_obtention"><br>
                                    <span class="text-danger"><?php echo form_error('dip_date_obtention') ; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="dip_description">Description du Diplôme</label>
                                    <textarea  id="dip_description" name="dip_description"
                                              rows="5" cols="33">
                                                         </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="<?php echo base_url('#5'); ?>" data-toggle="tab"><input  class="btn btn-primary" type="button" value="Étape suivante"></a>
                            <a href="<?php echo base_url('#3'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>
                        </div>
                    </div>

                    <div class="tab-pane " id="5">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                    <h3 style="color: #1e4d84; margin-bottom: 20px;">Expérience</h3>
                                    <div class="form-group">
                                        <label for="exp_nom_travail">À travaillé comme :</label>
                                        <input type="text" id="exp_nom_travail" name="exp_nom_travail">
                                        <span class="text-danger"><?php echo form_error('$exp_travail_name') ; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exp_entreprise">À travaillé à :</label>
                                        <input type="text" id="exp_entreprise" name="exp_entreprise"><br>
                                        <span class="text-danger"><?php echo form_error('$exp_entreprise_name') ; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exp_duree">À travaillé pendant :</label>
                                        <input type="text" id="exp_duree" name="exp_duree"><br>
                                        <span class="text-danger"><?php echo form_error('$exp_durer') ; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exp_description">Description de l'Expérience :</label>
                                        <textarea  id="exp_description" name="exp_description"
                                                   rows="5" cols="33">
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <a href="<?php echo base_url('#4'); ?>" data-toggle="tab"><input  class="btn btn-primary" type="button" value="Étape Suivante"></a>
                                        <a href="<?php echo base_url('#2'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane " id="6">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">

                                <h3 style="color: #1e4d84; margin-bottom: 20px;">Loisirs</h3>
                                <label for="cand_loisir_nom">Vos Loisirs :</label>
                                <textarea  id="cand_loisir_nom" name="cand_loisir_nom"
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