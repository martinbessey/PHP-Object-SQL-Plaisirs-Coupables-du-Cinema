<?php


require_once "bdd/DAO.php";

class AccueilController{



    public function pageAccueil(){
            $dao = new DAO();
            require "views/accueil/accueil.php";
    }
    public function addAct($array){

        $dao = new DAO();

        $sql = "INSERT INTO acteur(nom, prenom, sexe)
                VALUES (:nom, :prenom, :sexe)";

                $nom_acteur = filter_var($array['nom_act'],FILTER_SANITIZE_STRING);
                $prenom_acteur = filter_var($array['prenom_act'],FILTER_SANITIZE_STRING);
                $sexe_acteur = filter_var($array['sexe_act'],FILTER_SANITIZE_STRING);
                $ajout = $dao->executerRequete($sql, [":nom" =>$nom_acteur, ":prenom"=> $prenom_acteur, ":sexe"=> $sexe_acteur]);

                require "views/realisateur/addAct.php";
       }



}