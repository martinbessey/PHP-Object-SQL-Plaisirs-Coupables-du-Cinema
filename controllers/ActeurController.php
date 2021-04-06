<?php

require_once "bdd/DAO.php";

class ActeurController
{

    public function findAll()
    {

        $dao = new DAO;

        $sql = "SELECT idacteur,CONCAT( prenom,' ', nom)AS identite, naissance
                FROM acteur
                ORDER BY nom ASC";

        $acteurs = $dao->executerRequete($sql);


        require "views/acteur/listActeurs.php";
    }

    public function findOneById($id, $edit = false)
    {
        $id = $id;
        $dao = new DAO;

        $sql = "SELECT idacteur, CONCAT(prenom,' ',nom) AS identite, img , naissance, bio, nom, prenom
        FROM acteur 
        WHERE idacteur= :id";
        $acteur = $dao->executerRequete($sql, [":id" => $id]);



        $sql2 = "SELECT f.idfilm, f.titre, r.personnage, f.annee
        FROM film f INNER JOIN caster c
        ON f.idfilm = c.idfilm
        INNER JOIN rôle r
        ON r.idrole = c.idrole
        INNER JOIN acteur a 
        ON a.idacteur = c.idacteur
        AND c.idacteur = :id
        ORDER BY f.annee DESC";

        $filmographies = $dao->executerRequete($sql2, [":id" => $id]);
        

        if(!$edit){

        require "views/acteur/DetailActeur.php";    

        }else{

            return $acteur;

        }
        
    }

    public function addActorForm()
    {
        require "views/acteur/addActorForm.php";
    }

    public function addActor($array){

        $dao = new DAO();

        $sql = "INSERT INTO acteur(nom, prenom, sexe)
                VALUES (:nom, :prenom, :sexe)";

                $nom_realisateur = filter_var($array['nom_act'],FILTER_SANITIZE_STRING);
                $prenom_realisateur = filter_var($array['prenom_act'],FILTER_SANITIZE_STRING);
                $sexe_realisateur = filter_var($array['sexe_act'],FILTER_SANITIZE_STRING);

                $ajout = $dao->executerRequete($sql, [":nom" =>$nom_realisateur, ":prenom"=> $prenom_realisateur, ":sexe"=> $sexe_realisateur]);

                require "views/acteur/addActeur.php";   
    } 

    public function  editActorForm($id){

        $acteur = $this->findOneById($id, true);
        require "views/acteur/editActorForm.php";
    }

    public function editActeur($id, $array){

        header("Location: index.php?action=detailActor");
    }

}
