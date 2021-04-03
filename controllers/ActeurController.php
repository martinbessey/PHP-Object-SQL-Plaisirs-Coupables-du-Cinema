<?php 

require_once "bdd/DAO.php";

class ActeurController{

    public function findAll(){

        $dao = new DAO;

        $sql = "SELECT idacteur,CONCAT( prenom,' ', nom)AS identite, naissance
                FROM acteur
                ORDER BY nom ASC";

                $acteurs = $dao->executerRequete($sql);


        require "views/acteur/listActeurs.php";
    }

    public function findOneById($id){
        $id = $id;
        $dao = new DAO;

        $sql = "SELECT idacteur, CONCAT(prenom,' ',nom) AS identite, img , naissance, bio
        FROM acteur 
        WHERE idacteur= :id";
        $acteurs = $dao->executerRequete($sql, [":id"=> $id]);

        

        $sql2 ="SELECT f.idfilm, f.titre, r.personnage, f.annee
        FROM film f INNER JOIN caster c
        ON f.idfilm = c.idfilm
        INNER JOIN rôle r
        ON r.idrole = c.idrole
        INNER JOIN acteur a 
        ON a.idacteur = c.idacteur
        AND c.idacteur = :id
        ORDER BY f.annee DESC";

        $filmographies = $dao->executerRequete($sql2, [":id"=> $id]);
        
        require "views/acteur/DetailActeur.php";

    }


}