<?php 
require_once "models/SerieManager.class.php";

class SerieController{
    private $serieManager;

    public function __construct(){
    $this->serieManager = new SerieManager;
    $this->serieManager->chargementSeries();
    }

    public function afficherSeries(){
        $series = $this->serieManager->getSeries();
        require "views/series/series.view.php";
    }

    public function afficherSerie($id){
       $serie = $this->serieManager->getSerieById($id);
       require "views/series/afficherSerie.view.php";
    }

    public function ajoutSerie(){
        require "views/series/ajoutSerie.view.php";
    }

    public function ajoutSerieValidation(){
        $file = $_FILES['imageSerie'];
        $repertoire = "public/imgSeries/";
        $nomImageAjouteSerie = $this->ajoutImageSerie($file,$repertoire);
        $this->serieManager->ajoutSerieBdd($_POST['titreSerie'],$_POST['nbSaison'],$_POST['anneeSortieSerie'],$nomImageAjouteSerie,$_POST['noteSerie']);
        header('Location: '. URL . "series");
    }

    public function suppressionSerie($id){
        $nomImageSerie = $this->serieManager->getSerieById($id)->getImageSerie();
        unlink("public/imgSeries/".$nomImageSerie);
        $this->serieManager->suppressionSerieBDD($id);
        header('Location: '. URL . "series");
    }

    public function modificationSerie($id){
        $serie = $this->serieManager->getSerieById($id);
        require "views/series/modifierSerie.view.php";
    }

    public function modificationSerieValidation(){
        $imageActuelle = $this->serieManager->getSerieById($_POST['identifiant'])->getImageSerie();
        $file = $_FILES['imageSerie'];

        if($file['size'] > 0){
            unlink("public/imgSeries/".$imageActuelle);
            $repertoire = "public/imgSeries/";
            $nomImageToAdd = $this->ajoutImageSerie($file,$repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        $this->serieManager->modificationSerieBDD($_POST['identifiant'],$_POST['titreSerie'],$_POST['nbSaison'],$_POST['anneeSortieSerie'],$nomImageToAdd,$_POST['noteSerie']);
        header('Location: '. URL . "series");
    }


    private function ajoutImageSerie($file, $dir){
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