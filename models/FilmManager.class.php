<?php
require_once "Model.class.php";
require_once "Film.class.php";

class FilmManager extends Model{
    private $films;

    public function ajoutFilm($film){
        $this->films[] = $film;
    }

    public function getFilms(){
        return $this->films;
    }

    public function chargementFilms(){
        $req = $this->getBdd()->prepare("SELECT * FROM films");
        $req->execute();
        $mesFilms = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesFilms as $film){
            $l = new Film($film['id'],$film['titreFilm'], $film['anneeSortie'], $film['imageFilm'], $film['noteFilm']);
            $this->ajoutFilm($l);
        }
    }

    public function getFilmById($id){
        for($i=0; $i < count($this->films); $i++){
            if($this->films[$i]->getId() === $id){
                return $this->films[$i];
            }
        }
        throw new Exception("Le film n'existe pas");

    }

    public function ajoutFilmBdd($titreFilm,$anneeSortie,$imageFilm,$noteFilm){
  
        $req = "
        INSERT INTO films (titreFilm, anneeSortie, imageFilm, noteFilm)
        values (:titreFilm, :anneeSortie, :imageFilm, :noteFilm)";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titreFilm",$titreFilm,PDO::PARAM_STR);
        $stmt->bindValue(":anneeSortie",$anneeSortie,PDO::PARAM_INT);
        $stmt->bindValue(":imageFilm",$imageFilm,PDO::PARAM_STR);
        $stmt->bindValue(":noteFilm",$noteFilm,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $film = new Film($this->getBdd()->lastInsertId(),$titreFilm,$anneeSortie,$imageFilm,$noteFilm);
            $this->ajoutFilm($film);
        }
    }

    public function suppressionFilmBDD($id){
        $req = "
        Delete from films where id = :idFilm
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idFilm",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $film = $this->getFilmById($id);
            unset($film);
        }
    }

    public function modificationFilmBDD($id,$titreFilm,$anneeSortie,$imageFilm,$noteFilm){
        $req = "
        update films 
        set titreFilm = :titreFilm, anneeSortie = :anneeSortie, imageFilm = :imageFilm, noteFilm = :noteFilm
        where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":titreFilm",$titreFilm,PDO::PARAM_STR);
        $stmt->bindValue(":anneeSortie",$anneeSortie,PDO::PARAM_INT);
        $stmt->bindValue(":imageFilm",$imageFilm,PDO::PARAM_STR);
        $stmt->bindValue(":noteFilm",$noteFilm,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getFilmById($id)->setTitreFilm($titreFilm);
            $this->getFilmById($id)->setAnneeSortie($anneeSortie);
            $this->getFilmById($id)->setImageFilm($imageFilm);
            $this->getFilmById($id)->setNoteFilm($noteFilm);

        }
    }
}