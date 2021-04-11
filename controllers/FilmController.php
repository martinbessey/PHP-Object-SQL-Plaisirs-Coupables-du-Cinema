<?php 

require_once "bdd/DAO.php";

class FilmController{


    public function findAll(){

        $dao = new DAO;

        $sql = "SELECT idfilm,titre,DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree, f.annee , f.indice, f.idreal,r.nom
                FROM film f
                INNER JOIN realisateur r
                ON r.idreal = f.idreal
                ORDER BY f.indice DESC";

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

        $sql2 ="SELECT CONCAT(a.prenom,' ',a.nom)AS identite, r.personnage, a.idacteur, r.idrole, f.titre
        FROM film f INNER JOIN caster c 
        ON c.idfilm = f.idfilm
        INNER JOIN rôle r 
        ON r.idrole = c.idrole
        INNER JOIN acteur a 
        ON c.idacteur = a.idacteur
        WHERE f.idfilm = :id";

        $castings = $dao->executerRequete($sql2, [":id"=> $id]);
 
        require "views/film/detailFilm.php";
    }
    public function addFilmForm(){
       
        $dao = new DAO();
        
        $sql1 = "SELECT DISTINCT CONCAT (r.prenom,' ',r.nom) AS nomReal, r.idreal, FROM realisateur r";
        $sql2 = "SELECT g.idgenre, g.nom AS nomGenre FROM genre g";
        $listeGenres = $dao->executerRequete($sql2);

        require "views/film/addFilmForm.php";
    }
    
    public function addFilm($array){

        $dao = new DAO();

        $sql = "INSERT INTO film (titre, annee, realisateur, duree, synopsis, indice)
                VALUES (:titre, :annee, :realisateur, :duree, :synopsis, :indice)";

                $titre_film = filter_var($array['titre_film'],FILTER_SANITIZE_STRING);
                $annee_film = filter_var($array['annee_film'],FILTER_SANITIZE_STRING);
                $realisateur_film = filter_var($array['realisateur_film'],FILTER_SANITIZE_STRING);
                $duree_film = filter_var($array['duree_film'],FILTER_SANITIZE_STRING);
                $synopsis_film = filter_var($array['synopsis_film'],FILTER_SANITIZE_STRING);
                $indice_film = filter_var($array['indice_film'],FILTER_SANITIZE_STRING);

                $ajout = $dao->executerRequete($sql, [":titre" =>$titre_film, ":annee"=> $annee_film, ":realisateur"=> $realisateur_film, ":duree"=>$duree_film, ":synopsis"=>$synopsis_film, ":indice"=>$indice_film]);
                
                $dernierID= $dao->getBDD()->LastInsertID();

        $sql2 = "INSERT INTO classer(idfilm, idgenre)
                 VALUES(:idfilm, :idgenre)";

        $genre_film = filter_var_array($array['genre_film'],FILTER_SANITIZE_STRING);

        foreach($genre_film as $genreActuel){
           $addGenre = $dao->executerRequete($sql2, [":idgenre"=>$genreActuel, "idfilm" => $dernierID]);

        }       
        require "views/film/addFilm.php";
    }   
    public function editFilm($id, $array){

        $titre_film = filter_var ($array['titre_film'], FILTER_SANITIZE_STRING);
        $sortie_film = filter_var ($array['sortie_film'], FILTER_SANITIZE_STRING);
        $duree_film = filter_var ($array['duree_film'], FILTER_SANITIZE_STRING);
        $indice_film = filter_var ($array['indice_film'], FILTER_SANITIZE_STRING);
        $synopsis_film = filter_var ($array['synopsis_film'], FILTER_SANITIZE_STRING);
        $realisateur_film = filter_var ($array['real_film'], FILTER_SANITIZE_STRING);
        $genre_film = filter_var_array($array['genre_film'], FILTER_SANITIZE_STRING);


        $dao = new DAO();

        $sql = "UPDATE  film
                SET titre = :titre_film,
                annee= :annee_sortie,
                duree = :duree_film,
                note = :note_film,
                synopsis= :synopsis,
                idreal= :realisateur
                WHERE idfilm = :id";

        $dao->executerRequete($sql,[
            "id" => $id,
            ":titre_film" => $titre_film,
            ":annee_sortie" => $sortie_film,
            ":duree_film" => $duree_film,
            ":indice_film" => $indice_film,
            ":synopsis"=>  $synopsis_film,
            ":realisateur" =>$realisateur_film
            ]);

        $sql2 = "DELETE FROM style_film
        WHERE id_film = :id";
        $delete = $dao->executerRequete($sql2, [":id" => $id]);

        //On supprime tous les genres du films en questions pour les remettre ensuite

        $sql3 = "INSERT INTO style_film(id_genre, id_film)
        VALUES (:idGenre, :idFilm)";

        foreach ($genre_film as $genreActuel){
            $genreActuel2 = filter_var($genreActuel, FILTER_SANITIZE_STRING);
            $addGenre = $dao->executerRequete($sql3 , [":idGenre"=> $genreActuel2, ":idFilm"=>$id]);
        
        }

        header("Location:index.php");
    }

    public function deleteFilmById($id){


        $dao = new DAO();
        $sql = "DELETE FROM casting
        WHERE idfilm = :id";
        $sql2 = "DELETE FROM classer
        WHERE idfilm = :id";
        $sql3 ="DELETE FROM film
        WHERE idfilm = :id";

        $supp = $dao->executerRequete($sql, [":id" => $id]);
        $supp = $dao->executerRequete($sql2, [":id" => $id]);
        $supp = $dao->executerRequete($sql3, [":id" => $id]);

        require "views/film/suppressionFilm.php";
    }

    public function findOnHomepage1($id){
        $id=$id;
        $dao = new DAO();

        $sql = "SELECT idfilm, img, titre, annee,DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree, synopsis, indice, background
                FROM film f   
                WHERE f.idfilm = 10";
        $film = $dao->executerRequete($sql, [10 => $id]);

        $sql2 ="SELECT CONCAT(a.prenom,' ',a.nom)AS identite, r.personnage, a.idacteur, r.idrole, f.titre
        FROM film f INNER JOIN caster c 
        ON c.idfilm = f.idfilm
        INNER JOIN rôle r 
        ON r.idrole = c.idrole
        INNER JOIN acteur a 
        ON c.idacteur = a.idacteur
        WHERE f.idfilm = :id";

        $castings = $dao->executerRequete($sql2, [":id"=> $id]);
        
        require "views/film/detailFilm.php";
    }
    public function findOnHomepage2($id){
        $id=$id;
        $dao = new DAO();

        $sql = "SELECT idfilm, img, titre, annee,DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree, synopsis, indice, background
                FROM film f   
                WHERE f.idfilm = 1";
        $film = $dao->executerRequete($sql, [1 => $id]);

        $sql2 ="SELECT CONCAT(a.prenom,' ',a.nom)AS identite, r.personnage, a.idacteur, r.idrole, f.titre
        FROM film f INNER JOIN caster c 
        ON c.idfilm = f.idfilm
        INNER JOIN rôle r 
        ON r.idrole = c.idrole
        INNER JOIN acteur a 
        ON c.idacteur = a.idacteur
        WHERE f.idfilm = :id";

        $castings = $dao->executerRequete($sql2, [":id"=> $id]);
        
        require "views/film/detailFilm.php";
    }

}