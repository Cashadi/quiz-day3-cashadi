<?php

require_once "ichas.php";

class Post {
    // private array $viewPost;

    private $viewPost = [];

    // setter
    public function setViewPost(SeePost $seePost): void {
        $this->viewPost[] = $seePost;
    }

    // getter
    public function getViewPost() {
        return $this->viewPost;
    }
}