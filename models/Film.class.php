<?php
class Film{
    private $id;
    private $titreFilm;
    private $anneeSortie;
    private $imageFilm;
    private $noteFilm;
    

    public function __construct($id, $titreFilm, $anneeSortie, $imageFilm, $noteFilm){
        $this->id = $id;
        $this->titreFilm = $titreFilm;
        $this->anneeSortie = $anneeSortie;
        $this->imageFilm = $imageFilm;
        $this->noteFilm = $noteFilm;

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getTitreFilm(){
        return $this->titreFilm;
    }

    public function setTitreFilm($titreFilm){
        return $this->titreFilm = $titreFilm;
    }

    public function getAnneeSortie(){
        return $this->anneeSortie;
    }

    public function setAnneeSortie($anneeSortie){
        return $this->anneeSortie = $anneeSortie;
    }

    public function getImageFilm(){
        return $this->imageFilm;
    }

    public function setImageFilm($imageFilm){
        return $this->imageFilm = $imageFilm;
    }

    public function getNoteFilm(){
        return $this->noteFilm;
    }

    public function setNoteFilm($noteFilm){
        return $this->noteFilm = $noteFilm;
    }

}