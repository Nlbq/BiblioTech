<?php
class Livre{
    private $id;
    private $titre;
    private $nbPages;
    private $image;

    public function __construct($id, $titre, $nbPages, $image){
        $this->id = $id;
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->image = $image;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function setTitre($titre){
        return $this->titre = $titre;
    }

    public function getNbPages(){
        return $this->nbPages;
    }

    public function setNbPages($nbPages){
        return $this->nbPages = $nbPages;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        return $this->image = $image;
    }

}