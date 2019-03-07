<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 05/03/2019
 * Time: 10:25
 */

class Insert_cv_model extends CI_Model
{

    public function insert_cv_db($adresse, $telephone, $naissance, $c_postal,
                                 $comp_orga,$comp_tech,$diplome,
                                 $ecole_diplome,$date_diplome,$description_diplome,$exp_travail_name,
                                 $exp_entreprise_name,$exp_durer,$exp_description,$hobies,$id_cand)
    {

        $infos = array(
            'cand_date_naissance'                         => $this->security->xss_clean($naissance),
            'cand_adresse'                                => $this->security->xss_clean($adresse),
            'cand_telephone'                              => $this->security->xss_clean($telephone),
            'cand_code_postal'                            => $this->security->xss_clean($c_postal)
        );

        if(isset($comp_orga)){
            foreach($comp_orga as $id){
                $competencesOrg = array(
                    'candidat_id'                            => $this->security->xss_clean( $id_cand),
                    'competence_organisationnelle_id'        => $this->security->xss_clean($id)
                );
                $this->db->insert('candidat_competence_organisationnelle', $competencesOrg);
            }
        }
        if(isset($comp_tech)) {
            foreach ($comp_tech as $id) {
                $competencesTech = array(
                    'candidat_id' => $this->security->xss_clean($id_cand),
                    'competence_technique_id' => $this->security->xss_clean($id)
                );
                $this->db->insert('candidat_competence_technique', $competencesTech);
            }
        }


        $formation = array(
            'dip_nom'                          => $this->security->xss_clean($diplome),
            'dip_ecole'                        => $this->security->xss_clean($ecole_diplome),
            'dip_date_obtention'               => $this->security->xss_clean($date_diplome),
            'dip_description'                  => $this->security->xss_clean($description_diplome),
            'candidat_id'                      => $this->security->xss_clean($id_cand)
        );
        $loisir = array(
            'candidat_id'                      => $this->security->xss_clean($id_cand),
            'cand_loisir_nom'                  => $this->security->xss_clean($hobies)
        );
        $experience = array(
            'candidat_id'                      => $this->security->xss_clean($id_cand),
            'exp_nom_travail'                  => $this->security->xss_clean($exp_travail_name),
            'exp_entreprise'                   => $this->security->xss_clean($exp_entreprise_name),
            'exp_duree'                        => $this->security->xss_clean($exp_durer),
            'exp_description'                  => $this->security->xss_clean($exp_description)
        );
        $this->db->set($infos)->where('id',$id_cand)->update('candidat');
        $this->db->insert('candidat_diplome', $formation);
        $this->db->insert('candidat_loisir', $loisir);
        $this->db->insert('candidat_experience', $experience);

    }

}