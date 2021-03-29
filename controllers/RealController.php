<?php 

require_once "bdd/DAO.php";

class RealController{


    public function findOneById($id){

        $dao = new DAO;

        $sql = "SELECT idreal, img, CONCAT(prenom,' ',nom) AS identite, naissance, bio
                FROM realisateur r
                WHERE r.idreal= :id";
                $realisateur = $dao->executerRequete($sql, [":id"=> $id]);

        require "views/realisateur/detailReal.php";
    }
    public function findAllById($id){
        
        $dao = new DAO;

        $sql = "SELECT r.idreal, f.titre, f.annee, CONCAT(r.prenom,' ',r.nom) AS identite
                FROM film f INNER JOIN realisateur r
                ON f.idreal=r.idreal
                ORDER BY f.annee DESC";
                $realisateurs = $dao->executerRequete($sql, [":id"=> $id]);
        
        require "views/realisateur/filmographie.php";
    }
    
}