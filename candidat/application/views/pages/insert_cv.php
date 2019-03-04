<h1> Créer Votre Cv</h1>
<?php echo form_open(); ?>

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
                    <label for="cand_adresse">Adresse</label>
                    <input type="text" class="form-control form-control-lg" name="cand_adresse" value="">
                    <span class="text-danger"><?php echo form_error('cand_adresse') ; ?></span>
                    </div>

                    <div class="form-group">
                    <label for="cand_telephone">Tél</label>
                    <input type="text"  name="cand_telephone" value=""><br><br>
                    <span class="text-danger"><?php echo form_error('cand_telephone') ; ?></span>
                    </div>
                    <div class="form-group">
                    <label for="cand_email">Email</label>
                    <input type="text" name="cand_email" value=""><br>
                    <span class="text-danger"><?php echo form_error('cand_email') ; ?></span>
            </div>
                        <fielset>
                            <?php
                    //        TODO: competence technique
                            ?>
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
                        </fielset>
                            <legend>Formation</legend>
                                    <label for="dip_nom">Formation</label>
                                    <input type="text" id="dip_nom" name="">
                                    <label for="dip_ecole">Ecole d'obtention</label>
                                    <input type="text" id="dip_eccole" name="">
                                    <label for="dip_date_obtention">Date d'obtention</label>
                                    <input type="date" id="dip_date_obtention" name=""><br>
                                    <label for="dip_description">Description diplome</label>

                            <textarea placeholder="description du diplome" id="dip_description" name="dip_description"
                                      rows="5" cols="33">
                            </textarea>

                            <legend>Losirs</legend>
                            <label for="cand_loisir_nom">Vos Losirs</label>
                            <textarea placeholder="vos loisir " id="cand_loisir_nom" name="cand_loisir_nom"
                                      rows="5" cols="33">
                            </textarea>

                                        <div class="form-group">
                                            <?php echo form_submit('submitted', 'Enregistrer','class="btn btn-primary" id=""'); ?>
                                            <a href="<?php echo base_url('index'); ?>"><input  class="btn btn-primary" type="button" value="Retour"></a>
                                        </div>
    </div>

<?php echo form_close(); ?>