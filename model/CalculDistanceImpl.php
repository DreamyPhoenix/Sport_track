<?php

    require_once("CalculDistance.php");
	  class CalculDistanceImpl implements CalculDistance {


	  /**
      * Retourne la distance en mètres entre 2 points GPS exprimés en degrés.
      * @param float $lat1 Latitude du premier point GPS
      * @param float $long1 Longitude du premier point GPS
      * @param float $lat2 Latitude du second point GPS
      * @param float $long2 Longitude du second point GPS
      * @return float La distance entre les deux points GPS
      */
	 public function calculDistance2PointsGPS($lat1, $long1, $lat2, $long2){
		  $R = 6378.137;
		  $distance = $R*acos(sin(pi()*($lat2)/180)*sin(pi()*($lat1)/180)+
                  cos(pi()*($lat2)/180)*cos(pi()*($lat1)/180)*cos($long2-$long1));
		  return $distance;
	 }

	  /**
      * Retourne la distance en metres du parcours passé en paramètres. Le parcours est
      * défini par un tableau ordonné de points GPS.
      * @param Array $parcours Le tableau contenant les points GPS
      * @return float La distance du parcours
      */
	 
  	 public function calculDistanceTrajet(Array $parcours) {

            $distanceTotale = 0;

            for($i = 0; $i < count($parcours["data"])-1; $i++) {

                $dist2Points = $this->calculDistance2PointsGPS($parcours["data"][$i]["latitude"], $parcours["data"][$i]["longitude"], $parcours["data"][$i+1]["latitude"], $parcours["data"][$i+1]["longitude"]);
                $distanceTotale = $distanceTotale + $dist2Points;
            }

            return $distanceTotale;
        }


     public function appel(){
      $json = file_get_contents("fichier.json");
      $donnees = json_decode($json, true);
      $resultat = $this->calculDistanceTrajet($donnees)."\n";


      echo $resultat;
      }

}

