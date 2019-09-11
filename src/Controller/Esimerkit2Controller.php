<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Annotation\Route;

//Tarvitaan näkymä varten
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Harjoitukset Symfony 7, 8, 9

class Esimerkit2Controller extends AbstractController{
    // Kontrollerit tulee tänne

    /**
    * @Route("laskePalkka")
    */
    public function laskePalkka(){
        $bruttopalkka = 4500;
        $nettopalkka = $bruttopalkka * 0.7;

        return $this->render('esimerkit/laskePalkka.html.twig',[
            'nettopalkka' => $nettopalkka,
            'bruttopalkka' => $bruttopalkka
            ]);
    }
    /**
    * @Route("karkausvuosi")
    */

    public function tarkistaKarkausvuosi(){
        $vuosi = 2019;
        if ($vuosi%4 == 0){
            $vastaus = " on karkaus";
        }else{
            $vastaus = " ei ole karkaus";
        }
        return $this->render('esimerkit/karkausVuosi.html.twig',[
            'vuosi' => $vuosi,
            'vastaus' => $vastaus
            ]);
    }

    /**
    * @Route("laskuriPH")
    */
    public function laskePH(){
        $x = 2.13*pow(10,-5);
        $ph = number_format(-log10($x),1);
        return $this->render('esimerkit/laskePH.html.twig', [
            'x' => $x,
            'ph' => $ph
        ]);
    }

    /**
    * @Route("heittaNoppa")
    */
    public function heittaNoppa(){
        $noppa = rand(1, 6);
        return $this->render('esimerkit/heittaNoppa.html.twig', [
            'noppa' => $noppa
            ]);
    }

    /**
     * @Route("naytaJson")
     */
    public function naytaJSON(){
        // Henkilo-taulukko
        $nimet = [
            'Etunimi' => 'Pekka',
            'Sukunimi' => 'Puupää',       
        ];
            
        return $this->render('esimerkit/naytaJson.html.twig', array(
            'nimet' => $nimet,
            'json_nimet' => json_encode($nimet)
        ));
    }

    /**
     * @Route("lompakko")
     */
    public function lihapiirakka(){
        $rahat = 10;
        $hinta = 2.5; 
        if ($rahat >= $hinta){
            $nytRahat = $rahat - $hinta;
            $vastaus = "Olet ostanut 1 lihapiirakka. Sinun lompakossa nyt on " . $nytRahat;
           
        } else {
            $vastaus = "kehotan sinut paastoamaan.";
        }
        return $this->render('esimerkit/lompakko.html.twig', [
            'rahat' => $rahat,
            'nytRahat' => $nytRahat,
            'vastaus' => $vastaus
        ]);
    }

/**
 * @Route("pakkasasteet")
*/
    public function laskePakkasasteet(){
        // Muuttujat
        $summa = 0;
        $pakkaspaivat = 0;
        $tekija = "Arto Haapanen";
        $mittausViikko = 35;
        $keskiarvo1 = 0;
        $keskiarvo2 = 0;

        // Talletetaan viikon lämpötilat taulukkoon
        $pakkasasteet = [
            'ma' => 6,
            'ti' => 3,
            'ke' => -2,
            'to' => -4,
            'pe' => 1,
            'la' => 0,
            'su' => -5
        ];
        
        // Lasketaan pakkaspäivien summa
        foreach ($pakkasasteet as $pakkasaste) {
            if ($pakkasaste < 0) {
                $summa += $pakkasaste;
                $pakkaspaivat += 1;
            }
        }
        // Lasketaan pakkauspäivien keskiarvo yhdellä desimaalilla
        $keskiarvo1 = number_format(($summa / $pakkaspaivat), 1);

        // lasketaan koko viikon keskilämpötilä yhdellä desimaalilla
        $keskiarvo2 = number_format(array_sum($pakkasasteet) / count($pakkasasteet),1);

        // Kutsutaan näkymää ja lähetetään sille dataa sisältävät muuttujat
        return $this->render('esimerkit/pakkasasteet.html.twig',[
            'pakkasasteet' => $pakkasasteet,
            'keskiarvo1' => $keskiarvo1,
            'keskiarvo2' => $keskiarvo2,
            'viikko' => $mittausViikko,
            'tekija' => $tekija
            ]);
    }
}



