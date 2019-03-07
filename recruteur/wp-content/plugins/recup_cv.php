<?php
/**
 * @package RecupCV
 * @version 1.0
 */
/*
Plugin Name: RecupCV
Description: Plugin permettant d'afficher les cv stockées dans une base de donnees externe
Author: Guillaume GAUTHIER & Ahmed BOUKNANA & Quentin FERMEY
Version: 1.0
*/

function recup_cv()
{
    $response = wp_remote_get('http://localhost/projets/cvestiny/candidat/candidat_api/getAll');

    // On découpe le json pour réccupérer ce qui nous intéresse
    $json = json_decode($response['body'], true);

    foreach ($json as $cv_cand)
    {
        echo "<div style='color: #DA4141'><a href='http://localhost/projets/cvestiny/recruteur/cv/?candidat=".$cv_cand['candidat']['id']."'><u><h1>CV de " . $cv_cand['candidat']['cand_prenom'] . "</h1></u></a></div>";
       echo "<b>Prénom </b>: " . $cv_cand['candidat']['cand_prenom'] . "<br>";
        echo "<b>Nom : </b>" , "<span style='text-transform: uppercase'>" . $cv_cand['candidat']['cand_nom'] . "<br></span>";
        echo "<b>Email : </b>" . $cv_cand['candidat']['cand_email'] . "<br>";
        echo "<b>Téléphone : </b>" . $cv_cand['candidat']['cand_telephone'] . "<br>";
        echo "<b>Date de Naissance : </b>" . $cv_cand['candidat']['cand_date_naissance'] . "<br>";
        echo "<b>Sexe : </b>" . $cv_cand['candidat']['cand_sexe'] . "<br>";
        echo "<b>Adresse : </b>" . $cv_cand['candidat']['cand_adresse'] . "<br>";
        echo "<b>Code Postal : </b>" . $cv_cand['candidat']['cand_code_postal'] . "<br>";
        echo "<b>État : </b>" . $cv_cand['candidat']['cand_etat'] . "<br><br>";
/*
        echo "<u><br><h5>Expériences :</h5></u>";
        foreach($cv_cand['exp'] as $item){
            echo "<b>À travaillé comme : </b>" . $item['exp_nom_travail'] . "<br>";
            echo "<b>À travaillé à : </b>" . $item['exp_entreprise'] . "<br>";
            echo "<b>À travaillé pendant : </b>" . $item['exp_duree'] . "<br>";
            echo "<b>Description : </b>" . $item['exp_description'] . "<br><br>";

            }
            echo "<u><br><h5>Compétence Techniques :</h5></u>";
        foreach ($cv_cand['tech'] as $item) {
            echo "<b>Compétence Techniques : </b>" . $item['competence_tech_nom'] . "<br>";
            }

            echo "<u><br><h5>Compétence Organisationelle :</h5></u>";
        foreach($cv_cand['orga'] as $item){
            echo "<b>Compétence Organisationelle : </b>" . $item['competence_orga_nom'] . "<br>";
            }

            echo "<u><br><h5>Diplômes :</h5></u>";
        foreach($cv_cand['diplome'] as $item){
            echo "<b>Nom du Diplôme : </b>" . $item['dip_nom'] . "<br>";
            echo "<b>Nom de l'École : </b>" . $item['dip_ecole'] . "<br>";
            echo "<b>Date d'Obtention du Diplôme : </b>" . $item['dip_date_obtention'] . "<br>";
            echo "<b>Description du Diplôme : </b>" . $item['dip_description'] . "<br><br>";
            }

            echo "<u><h5>Loisirs :</h5></u>";
        foreach($cv_cand['loisir'] as $item){
            echo "<b>Loisirs : </b>" . $item['cand_loisir_nom'] . "<br>";
            }
            echo '<br>';*/

       /* //DEBUG
        echo '<pre>';
        print_r($cv_cand);
        echo '</pre>';*/
    }
}

add_shortcode('getcv', 'recup_cv');

function recup_one_cv()
{
    $response = wp_remote_get('http://localhost/projets/cvestiny/candidat/candidat_api/'.$_GET['candidat']);

    // On découpe le json pour réccupérer ce qui nous intéresse
    $json = json_decode($response['body'], true);
    if ($json) {
        foreach ($json as $cv_cand) {
            echo "<div style='color: #DA4141'><u><h1>" . $cv_cand['candidat']['cand_prenom'] . "</h1></u></div>";
            echo "<b>Prénom </b>: " . $cv_cand['candidat']['cand_prenom'] . "<br>";
            echo "<b>Nom : </b>" , "<span style='text-transform: uppercase'>" . $cv_cand['candidat']['cand_nom'] . "<br></span>";
            echo "<b>Email : </b>" . $cv_cand['candidat']['cand_email'] . "<br>";
            echo "<b>Téléphone : </b>" . $cv_cand['candidat']['cand_telephone'] . "<br>";
            echo "<b>Date de Naissance : </b>" . $cv_cand['candidat']['cand_date_naissance'] . "<br>";
            echo "<b>Sexe : </b>" . $cv_cand['candidat']['cand_sexe'] . "<br>";
            echo "<b>Adresse : </b>" . $cv_cand['candidat']['cand_adresse'] . "<br>";
            echo "<b>Code Postal : </b>" . $cv_cand['candidat']['cand_code_postal'] . "<br>";
            echo "<b>État : </b>" . $cv_cand['candidat']['cand_etat'] . "<br>";

            echo "<div style='color: #DA4141'><b><u><br><h5>Expériences :</h5></u></b></div>";
            foreach ($cv_cand['exp'] as $item) {
                echo "<b>À travaillé comme : </b>" . $item['exp_nom_travail'] . "<br>";
                echo "<b>À travaillé à : </b>" . $item['exp_entreprise'] . "<br>";
                echo "<b>À travaillé pendant : </b>" . $item['exp_duree'] . "<br>";
                echo "<b>Description : </b>" . $item['exp_description'] . "<br><br>";
            }
            echo "<div style='color: #DA4141'><b><u><h5>Compétences Techniques :</h5></u></b></div>";
            foreach ($cv_cand['tech'] as $item) {
                echo "<b>Compétences Techniques : </b>" . $item['competence_tech_nom'] . "<br>";
            }

            echo "<div style='color: #DA4141'><b><u><br><h5>Compétences Organisationnelles :</h5></u></b></div>";
            foreach ($cv_cand['orga'] as $item) {
                echo "<b>Compétences Organisationnelles : </b>" . $item['competence_orga_nom'] . "<br>";
            }

            echo "<div style='color: #DA4141'><b><u><br><h5>Diplômes :</h5></u></b></div>";
            foreach ($cv_cand['diplome'] as $item) {
                echo "<b>Nom du Diplôme : </b>" . $item['dip_nom'] . "<br>";
                echo "<b>Nom de l'École : </b>" . $item['dip_ecole'] . "<br>";
                echo "<b>Date d'Obtention du Diplôme : </b>" . $item['dip_date_obtention'] . "<br>";
                echo "<b>Description du Diplôme : </b>" . $item['dip_description'] . "<br><br>";
            }

            echo "<div style='color: #DA4141'><b><u><h5>Loisirs :</h5></u></b></div>";
            foreach ($cv_cand['loisir'] as $item) {
                echo "<b>Loisirs : </b>" . $item['cand_loisir_nom'] . "<br>";
            }
            echo '<br>';

            /* //DEBUG
            echo '<pre>';
            print_r($cv_cand);
            echo '</pre>';*/
        }
    }else{
        echo "Pas de CV selectionné";
    }
}
add_shortcode('getonecv', 'recup_one_cv');