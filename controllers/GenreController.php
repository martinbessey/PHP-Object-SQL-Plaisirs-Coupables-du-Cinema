<?php 

require_once "bdd/DAO.php";

class GenreController{

    public function findAll(){
        
        $dao = new DAO;

        $sql = "SELECT g.idgenre, g.nom, COUNT(c.idfilm) AS nb_films
                FROM genre g INNER JOIN classer c
                ON g.idgenre = c.idgenre
                INNER JOIN film f
                ON f.idfilm = c.idfilm
                GROUP BY c.idgenre
                ORDER BY nb_films DESC";
                $genres = $dao->executerRequete($sql);

            require "views/genre/listGenres.php";
    }
    
    public function findOneById($id){

        $id = $id;

        $dao = new DAO;

        $sql="SELECT f.titre, f.annee, f.indice, f.idfilm, g.nom
               FROM classer c INNER JOIN film f
               ON c.idfilm = f.idfilm
               INNER JOIN genre g
               ON g.idgenre = c.idgenre
               WHERE g.idgenre = :id
               ORDER BY f.indice DESC";

               $filmDeGenres = $dao->executerRequete($sql, [ ":id"=>$id]);

        require "views/genre/detailGenre.php";
    }
}