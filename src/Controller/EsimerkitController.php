<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\Routing\Annotation\Route;


class EsimerkitController{
    // Kontrollerit tulee tänne

    public function laskePalkka(){
        $nettopalkka = 4500 * 0.7;

        return new Response('<h2>Bruttopalkkasi on 4500 ja nettopalkkasi on <strong>' . $nettopalkka . '</strong></h2>');

    }

    public function tarkistaKarkausvuosi(){
        if (2019%4 == 0){
            $vastaus = " on karkaus";
        }else{
            $vastaus = " ei ole karkaus";
        }
        return new Response('<h2>Vuosi '. 2019 . '<strong>' . $vastaus . ' vuosi</strong>' );
    }

    public function laskePH(){
        $x = 2.13*pow(10,-5);
        $ph = -log10($x);
        return new Response('<h2>Kun vesiliuoksen vetyioni-konsenraatioon ' . $x . ' mol/l sen pH on <strong>' . $ph . '.</strong></h2>' );
    }

    public function heittaNoppa(){
        $noppa = rand(1, 6);
        return new Response('<h2>Nopan silmäluku on ' . $noppa . '.</strong></h2>' );
    }

    public function naytaJSON(){
        // Henkilo-taulukko
        $nimet = [
            'Etunimi' => 'Pekka',
            'Sukunimi' => 'Puupää',       
        ];
                
        return new JsonResponse($nimet);
    }

    public function lihapiirakka(){
        $rahat = 10;
        $hinta = 2.5; 
        if ($rahat >= $hinta){

            $vastaus = "Sinulla on rahamäärä " . round($rahat/$hinta) . ':n piirakkaan. Sinun lompakolla nyt on ' . $rahat;
            $rahat -= $hinta;
        } else {
            $vastaus = "Sinun täytyy paastota";
        }
        return new Response('<h2>' . $vastaus . '</h2>');
    }

/**
 * @Route("esimerkki/esim6")
 * 
 */
    public function laskePakkasastet(){
    
    }
}



