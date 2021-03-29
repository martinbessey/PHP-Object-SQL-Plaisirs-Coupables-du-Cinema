<?php 

require_once "bdd/DAO.php";

class FilmController{


    public function findAll(){

        $dao = new DAO;

        $sql = "SELECT idfilm,titre,DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree, f.annee , f.indice, f.idreal,r.nom
                FROM film f
                INNER JOIN realisateur r
                ON r.idreal = f.idreal
                ORDER BY f.titre ASC";

                $films = $dao->executerRequete($sql);


        require "views/film/listFilms.php";
    }

    public function findOneById($id){
        $id = $id;
        $dao = new DAO;

        $sql = "SELECT idfilm, img, titre, annee,DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree, synopsis, indice, background
                FROM film f   
                WHERE f.idfilm = :id";
        $film = $dao->executerRequete($sql, [":id"=> $id]);

        require "views/film/detailFilm.php";
    }

    public function findCasting($id){
        $id = $id;
        $dao = new DAO;

        $sql ="SELECT CONCAT(a.prenom,'', a.nom) AS identite, a.sexe 
               FROM caster c, acteur a
               WHERE c.idacteur = a.idacteur
               AND c.idfilm = :id";
        $casting =$dao->executerRequete($sql, [":id"=> $id]);

        require "views/film/casting.php";
    }
}