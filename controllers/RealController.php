<?php 

require_once "bdd/DAO.php";

class RealController{


    public function findOneById($id){

        $dao = new DAO;

        $sql = "SELECT idreal, img, CONCAT(prenom,' ',nom) AS identite
                FROM realisateur r
                WHERE r.idreal= :id";
                $realisateur = $dao->executerRequete($sql, [":id"=> $id]);

                


        require "views/realisateur/detailReal.php";
    }
}