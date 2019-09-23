<?php
namespace App\Entity;

class Freezing {
    private $operative;
    private $week;
    private $arr_temperature;
    
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
    public function setTemp($arr_temperature) {
        $this->arr_temperature = $arr_temperature;
    }
    public function getTemp() {
        return $this->arr_temperature;
    }


    

}