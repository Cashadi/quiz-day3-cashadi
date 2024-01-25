<?php

class SeePost {
    private $nameAuthor;
    private $tittle;
    private $ideas;

    // setter 
    public function setNameAuthor(string $nameAuthor): void {
        $this->nameAuthor = $nameAuthor;
    }

    public function setTittle(string $tittle): void {
        $this->tittle = $tittle;
    }

    public function setIdeas(string $ideas): void {
        $this->ideas = $ideas;
    }

    // getter
    public function getNameAuthor() {
        return $this->nameAuthor;
    }

    public function getTittle() {
        return $this->tittle;
    }

    public function getIdeas() {
        return $this->ideas;
    }
}