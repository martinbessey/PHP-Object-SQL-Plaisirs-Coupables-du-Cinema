<?php 

require_once "bdd/DAO.php";

class RealController{

    public function findAll()
    {

        $dao = new DAO;

        $sql = "SELECT idreal,CONCAT( prenom,' ', nom)AS identite, naissance, sexe
                FROM realisateur
                ORDER BY nom ASC";

        $realisateurs = $dao->executerRequete($sql);


        require "views/realisateur/listReal.php";
    }


    public function findOneById($id, $edit = false){

        $dao = new DAO;

        $sql = "SELECT idreal, img, CONCAT(prenom,' ',nom) AS identite, naissance, bio, nom, prenom, sexe
                FROM realisateur r
                WHERE r.idreal= :id";
                $realisateur = $dao->executerRequete($sql, [":id"=> $id]);


        $sql2 = "SELECT f.titre, f.annee, f.idfilm
                FROM film f INNER JOIN realisateur r
                ON f.idreal=r.idreal
                 AND r.idreal = :id";
                $filmographies = $dao->executerRequete($sql2, [":id"=> $id]);
        
                if(!$edit){

                 require "views/realisateur/detailReal.php";    
                
                }else{
                  
                 return $realisateur;

                }
       
    }

    public function addRealForm(){
        require "views/realisateur/addRealForm.php";
    }
    
    public function addReal($array){

        $dao = new DAO();

        $sql = "INSERT INTO realisateur(nom, prenom, sexe)
                VALUES (:nom, :prenom, :sexe)";

                $nom_realisateur = filter_var($array['nom_real'],FILTER_SANITIZE_STRING);
                $prenom_realisateur = filter_var($array['prenom_real'],FILTER_SANITIZE_STRING);
                $sexe_realisateur = filter_var($array['sexe_real'],FILTER_SANITIZE_STRING);

                $ajout = $dao->executerRequete($sql, [":nom" =>$nom_realisateur, ":prenom"=> $prenom_realisateur, ":sexe"=> $sexe_realisateur]);

                require "views/realisateur/addReal.php";
    }   

    public function  editRealForm($id){

           $realisateur = $this->findOneById($id, true);
           require "views/realisateur/editRealForm.php";
    }

    public function editReal($id, $array){
        
        $nom = filter_var($array['nom_real'], FILTER_SANITIZE_STRING);
        $prenom = filter_var($array['prenom_real'], FILTER_SANITIZE_STRING);


        $dao = new DAO();

        $sql= "UPDATE realisateur
               SET nom_realisateur= :nom_real,
               SET prenom_realisateur= : prenom_real,
               WHERE id_realisateur = : id";

        $dao->executerRequete($sql, [
           ":id" =>  $id,
           ":nom" =>  $nom,
           ":prenom" => $prenom
        ]);

        header("Location: index.php?action=detailRealisateur");


    }

    
}
    
