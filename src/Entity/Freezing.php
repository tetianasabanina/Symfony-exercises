<?php
namespace App\Entity;

class Freezing {
    private $operative;
    private $week;
    private $temperature = [
        'monday' => '',
        'tuesday' => '',
        'wednesday' => '',
        'thursday' => '',
        'friday' => '',
        'saturday' => '',
        'sunday' => ''
    ];
    
    public function setOperative($operative) {
        $this->operative = $operative;
    }
    public function getOperative() {
        return $this->operative;
    }

    public function setWeek($week) {
        $this->week = $week;
    }
    public function getWeek() {
        return $this->week;
    }
    public function setTemperature($temperature) {
        $this->temperature = $temperature;
    }
    public function getTemperature() {
        return $this->temperature;
    }


    

}