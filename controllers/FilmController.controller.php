<?php 
require_once "models/FilmManager.class.php";

class FilmController{
    private $filmManager;

    public function __construct(){
    $this->filmManager = new FilmManager;
    $this->filmManager->chargementFilms();
    }

    public function afficherFilms(){
        $films = $this->filmManager->getFilms();
        require "views/films/films.view.php";
    }

    public function afficherFilm($id){
       $film = $this->filmManager->getFilmById($id);
       require "views/films/afficherFilm.view.php";
    }

    public function ajoutFilm(){
        require "views/films/ajoutFilm.view.php";
    }

    public function ajoutFilmValidation(){
        $file = $_FILES['imageFilm'];
        $repertoire = "public/imgFilms/";
        $nomImageAjouteFilm = $this->ajoutImageFilm($file,$repertoire);
        $this->filmManager->ajoutFilmBdd($_POST['titreFilm'],$_POST['anneeSortie'],$nomImageAjouteFilm,$_POST['noteFilm']);
        header('Location: '. URL . "films");
    }

    public function suppressionFilm($id){
        $nomImageFilm = $this->filmManager->getFilmById($id)->getImageFilm();
        unlink("public/imgFilms/".$nomImageFilm);
        $this->filmManager->suppressionFilmBDD($id);
        header('Location: '. URL . "films");
    }

    public function modificationFilm($id){
        $film = $this->filmManager->getFilmById($id);
        require "views/films/modifierFilm.view.php";
    }

    public function modificationFilmValidation(){
        $imageActuelle = $this->filmManager->getFilmById($_POST['identifiant'])->getImageFilm();
        $file = $_FILES['imageFilm'];

        if($file['size'] > 0){
            unlink("public/imgFilms/".$imageActuelle);
            $repertoire = "public/imgFilms/";
            $nomImageToAdd = $this->ajoutImageFilm($file,$repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        $this->filmManager->modificationFilmBDD($_POST['identifiant'],$_POST['titreFilm'],$_POST['anneeSortie'],$nomImageToAdd,$_POST['noteFilm']);
        header('Location: '. URL . "films");
    }


    private function ajoutImageFilm($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
}