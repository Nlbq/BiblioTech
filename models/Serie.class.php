<?php
class Serie{
    private $id;
    private $titreSerie;
    private $nbSaison;
    private $anneeSortieSerie;
    private $imageSerie;
    private $noteSerie;
    

    public function __construct($id, $titreSerie, $nbSaison, $anneeSortieSerie, $imageSerie, $noteSerie){
        $this->id = $id;
        $this->titreSerie = $titreSerie;
        $this->nbSaison = $nbSaison;
        $this->anneeSortieSerie = $anneeSortieSerie;
        $this->imageSerie = $imageSerie;
        $this->noteSerie = $noteSerie;

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getTitreSerie(){
        return $this->titreSerie;
    }

    public function setTitreSerie($titreSerie){
        return $this->titreSerie = $titreSerie;
    }

    public function getNbSaison(){
        return $this->nbSaison;
    }

    public function setNbSaison($nbSaison){
        return $this->nbSaison = $nbSaison;
    }

    public function getAnneeSortieSerie(){
        return $this->anneeSortieSerie;
    }

    public function setAnneeSortieSerie($anneeSortieSerie){
        return $this->anneeSortieSerie = $anneeSortieSerie;
    }

    public function getImageSerie(){
        return $this->imageSerie;
    }

    public function setImageSerie($imageSerie){
        return $this->imageSerie = $imageSerie;
    }

    public function getNoteSerie(){
        return $this->noteSerie;
    }

    public function setNoteSerie($noteSerie){
        return $this->noteSerie = $noteSerie;
    }

}