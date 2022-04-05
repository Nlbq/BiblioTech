<?php
define ("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once "controllers/LivreController.controller.php";
$livreController = new LivreController;
require_once "controllers/FilmController.controller.php";
$filmController = new FilmController;
require_once "controllers/SerieController.controller.php";
$serieController = new SerieController;

try{
    if(empty($_GET['page'] )){
        require "views/accueil.view.php";
    } else{
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

        switch($url[0]){
            case "accueil" : require "views/accueil.view.php";
            break;
            case "livres" : 
                if(empty($url[1])){
                    $livreController->afficherLivres();
                } else if ($url[1] === "l"){
                    $livreController->afficherLivre($url[2]);
                }else if ($url[1] === "a"){
                    $livreController->ajoutLivre();
                }else if ($url[1] === "av"){
                    $livreController->ajoutLivreValidation();
                }else if ($url[1] === "m"){
                    $livreController->modificationLivre($url[2]);
                }else if ($url[1] === "mv"){
                    $livreController->modificationLivreValidation();
                }else if ($url[1] === "s"){
                    $livreController->suppressionLivre($url[2]);
                }else{
                    throw new Exception ("La page n'existe pas");
                }
            break;
            case "films" : 
                if(empty($url[1])){
                    $filmController->afficherFilms();
                } else if ($url[1] === "l"){
                    $filmController->afficherFilm($url[2]);
                }else if ($url[1] === "a"){
                    $filmController->ajoutFilm();
                }else if ($url[1] === "av"){
                    $filmController->ajoutFilmValidation();
                }else if ($url[1] === "m"){
                    $filmController->modificationFilm($url[2]);
                }else if ($url[1] === "mv"){
                    $filmController->modificationFilmValidation();
                }else if ($url[1] === "s"){
                    $filmController->suppressionFilm($url[2]);
                }else{
                    throw new Exception ("La page n'existe pas");
                }
            break;
            case "series" : 
                if(empty($url[1])){
                    $serieController->afficherSeries();
                } else if ($url[1] === "l"){
                    $serieController->afficherSerie($url[2]);
                }else if ($url[1] === "a"){
                    $serieController->ajoutSerie();
                }else if ($url[1] === "av"){
                    $serieController->ajoutSerieValidation();
                }else if ($url[1] === "m"){
                    $serieController->modificationSerie($url[2]);
                }else if ($url[1] === "mv"){
                    $serieController->modificationSerieValidation();
                }else if ($url[1] === "s"){
                    $serieController->suppressionSerie($url[2]);
                }else{
                    throw new Exception ("La page n'existe pas");
                }
            break;
            default : throw new Exception ("La page n'existe pas");
        }
    }
}
catch(Exception $e){
    $msg = $e->getMessage();
    require "views/error.view.php";
}