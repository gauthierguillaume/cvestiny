<section>
<div class="text-center"><h1 style='color: #1e4d84; '> Mon CV</h1>
</div>
<div class="container border border-primary rounded-top">
        <?php

        $tab['cand_prenom'] = "Prénom : ";
        $tab['cand_nom'] = "Nom : ";
        $tab['cand_adresse'] = "Adresse : ";
        $tab['cand_code_postal'] = "Code Postal : ";
        $tab['cand_telephone'] = "Téléphone : ";
        $tab['cand_email'] = "Email : ";
        $tab['dip_nom'] = "Nom du Diplôme : ";
        $tab['dip_ecole'] = "Nom de l'École  : ";
        $tab['dip_description'] = "Description du Diplôme : ";
        $tab['dip_date_obtention'] = "Date d'Obtention du Diplôme :  ";
        $tab['exp_nom_travail'] = "À travaillé comme :  ";
        $tab['exp_entreprise'] = "À travaillé à :  ";
        $tab['exp_duree'] = "À travaillé pendant :  ";
        $tab['exp_description'] = "Description : ";


        echo "<br><h2 style='color: #1e4d84;'><u>Informations :</h2></u>";
        echo'<div style="text-transform: ">';
                foreach ($candidat[0] as $key => $info){
                    echo '<div class="container">'.$tab[$key]  .$info . ' <br>'.'</div>';
                }
        echo'</div>';

        echo "<br><h2 style='color: #1e4d84';><u>Formations :</h2></u>";
            echo'<div style="text-transform: ">';
                    foreach($formation as $case){
                        if(!empty($case['dip_nom']) ){
                            foreach ($case as $key =>  $dip){
                                if(trim($dip) != "" && $dip != null ){
                                    echo '<div class="container">'.$tab[$key].$dip . ' <br>'.'</div>';
                                }
                            }
                        }
                    }
//                    var_dump($tab[$key]);
            echo'</div>';

        echo "<br><h2 style='color: #1e4d84;'><u>Expériences :</h2></u>";
        echo'<div style="text-transform: ">';
                foreach($experience as $exp) {
                    foreach ($exp as  $key => $dip){
                        if(trim($dip) != "" && $dip != null ) {
                            echo '<div class="container">'.$tab[$key] . $dip . ' <br>' . '</div>';
                        }
                    }
                }

        echo'</div>';

        echo "<br><h2 style='color: #1e4d84;'><u>Compétences Organisationnelles :</h2></u>";
        echo'<div style="text-transform: ">';
                    foreach ($comp as  $dip){
                          echo '<div class="container">'. $dip["competence_orga_nom"] . ' <br>' . '</div>';
                      }
                    echo'<pre>';

        echo'</pre>';
        echo'</div>';
        echo "<br><h2 style='color: #1e4d84;'><u>Compétences Techniques :</h2></u>";
        echo'<div style="text-transform: ">';
                    foreach ($tech as  $dip) {

                            echo '<div class="container">' . $dip["competence_tech_nom"] . ' <br>' . '</div>';

                    }
        echo'</div>';
        echo "<br><h2 style='color: #1e4d84;'><u>Loisirs :</h2></u>";
        echo'<div style="text-transform: ">';
                foreach($loisir as $loi){
                    if(!empty($loi['cand_loisir_nom'])){
                        foreach ($loi as  $dip){
                            if(trim($dip) != "" && $dip != null ) {
                                echo '<div class="container">' . $dip . ' <br>' . '</div>';
                            }
                        }
                    }
                }
        echo'</div>';
        ?>
</div>
</section>
<div class="form-group text-center">   
    <a href="http://localhost/projets/cvestiny/candidat/ "><input  class="btn btn-primary " type="button" value="Revenir sur CVestiny"></a>
 </div>
