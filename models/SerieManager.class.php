<?php
require_once "Model.class.php";
require_once "Serie.class.php";

class SerieManager extends Model{
    private $series;

    public function ajoutSerie($serie){
        $this->series[] = $serie;
    }

    public function getSeries(){
        return $this->series;
    }

    public function chargementSeries(){
        $req = $this->getBdd()->prepare("SELECT * FROM series");
        $req->execute();
        $mesSeries = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($mesSeries as $serie){
            $l = new Serie($serie['id'],$serie['titreSerie'], $serie['nbSaison'], $serie['anneeSortieSerie'], $serie['imageSerie'], $serie['noteSerie']);
            $this->ajoutSerie($l);
        }
    }

    public function getSerieById($id){
        for($i=0; $i < count($this->series); $i++){
            if($this->series[$i]->getId() === $id){
                return $this->series[$i];
            }
        }
    }

    public function ajoutSerieBdd($titreSerie,$nbSaison,$anneeSortieSerie,$imageSerie,$noteSerie){
  
        $req = "
        INSERT INTO series (titreSerie, nbSaison, anneeSortieSerie, imageSerie, noteSerie)
        values (:titreSerie, :nbSaison, :anneeSortieSerie, :imageSerie, :noteSerie)";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titreSerie",$titreSerie,PDO::PARAM_STR);
        $stmt->bindValue(":nbSaison",$nbSaison,PDO::PARAM_STR);
        $stmt->bindValue(":anneeSortieSerie",$anneeSortieSerie,PDO::PARAM_INT);
        $stmt->bindValue(":imageSerie",$imageSerie,PDO::PARAM_STR);
        $stmt->bindValue(":noteSerie",$noteSerie,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $serie = new Serie($this->getBdd()->lastInsertId(),$titreSerie,$nbSaison,$anneeSortieSerie,$imageSerie,$noteSerie);
            $this->ajoutSerie($serie);
        }
    }

    public function suppressionSerieBDD($id){
        $req = "
        Delete from series where id = :idSerie
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idSerie",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $serie = $this->getSerieById($id);
            unset($serie);
        }
    }

    public function modificationSerieBDD($id,$titreSerie,$nbSaison,$anneeSortieSerie,$imageSerie,$noteSerie){
        $req = "
        update series 
        set titreSerie = :titreSerie, nbSaison = :nbSaison, anneeSortieSerie = :anneeSortieSerie, imageSerie = :imageSerie, noteSerie = :noteSerie
        where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":titreSerie",$titreSerie,PDO::PARAM_STR);
        $stmt->bindValue(":nbSaison",$nbSaison,PDO::PARAM_STR);
        $stmt->bindValue(":anneeSortieSerie",$anneeSortieSerie,PDO::PARAM_INT);
        $stmt->bindValue(":imageSerie",$imageSerie,PDO::PARAM_STR);
        $stmt->bindValue(":noteSerie",$noteSerie,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getSerieById($id)->setTitreSerie($titreSerie);
            $this->getSerieById($id)->setNbSaison($nbSaison);
            $this->getSerieById($id)->setAnneeSortieSerie($anneeSortieSerie);
            $this->getSerieById($id)->setImageSerie($imageSerie);
            $this->getSerieById($id)->setNoteSerie($noteSerie);

        }
    }
}