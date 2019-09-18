<?php
namespace App\Entity;

class Kuntopisteet {
    private $name;
    private $surname;
    private $jogging;
    private $running;
    private $walking;
    private $postingdate;

    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }
    public function getSurname() {
        return $this->surname;
    }

    public function setJogging($jogging) {
        $this->jogging = $jogging;
    }
    public function getJogging() {
        return $this->jogging;
    }

    public function setRunning($running) {
        $this->running = $running;
    }
    public function getRunning() {
        return $this->running;
    }

    public function setWalking($walking) {
        $this->walking = $walking;
    }
    public function getWalking() {
        return $this->walking;
    }

    public function setPostingdate(\DateTimeInterface $postingdate) {
        $this->postingdate = $postingdate;
    }
    public function getPostingdate() {
        return $this->postingdate;
    }

}