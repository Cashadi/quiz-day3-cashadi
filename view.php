<?php

require_once "sign-in-writer.php";
require_once "sign-in-reader.php";
require_once "post.php";


$db_post = new Post();

firstMenu($db_post);

// buat artikel
function createArticle(Post $post) {

    $seePost = new SeePost();

    $nameWriter = readline("nama = ");
    $tittleWriter = readline("Judul artikel = ");
    $ideas = readline("Tulis ide = ");
    
    $seePost->setNameAuthor($nameWriter);
    $seePost->setTittle($tittleWriter);
    $seePost->setIdeas($ideas);

    // push
    $post->setViewPost($seePost);

    menuWriter($post);
}

// menu ketika writer sudah sign in
function menuWriter(Post $post) {

    echo <<<menuWriter

    1. Buat artikel
    2. Hapus artikel
    3. Keluar

    menuWriter;

    $questionWriter = readline("Pilih = ");

    if ((int)$questionWriter == 1) {
        createArticle($post);
    } else if ((int)$questionWriter == 2) {
        echo "masih proses ya";
    } else if ((int)$questionWriter == 3) {
        firstMenu($post);
    }
}

// sign in writer
function signInWriter(Post $post) {
    $writer = new SignInWriter("john@gmail.com", "123", "John", 22);

    $emailWriter = readline("Masukkan email = ");
    $passwordWriter = readline("Masukkan password = ");

    if ($emailWriter == "john@gmail.com" && $passwordWriter == "123") {
        menuWriter($post);
    } else {
        echo "yah salah \n\n";
        firstMenu($post);
    }
}

// menampilkan postingan writer
function seePost(Post $post) {

    echo "Selamat datang di lihat postingan\n";

    $articles = $post->getViewPost();

    if (!empty($articles)) {
        foreach ($articles as $article) {
            echo "\nNama Penulis: " . $article->getNameAuthor();
            echo "\nJudul Artikel: " . $article->getTittle();
            echo "\nIde Artikel: " . $article->getIdeas();
            echo "\n=============================";
        }
    } else {
        echo "Belum ada artikel yang ditulis.\n";
    }

    menuReader($post);
}

// menu ketika reader sudah sign in
function menuReader(Post $post) {

    echo<<<menuReader

    1. Lihat postingan
    2. Keluar

    menuReader;

    $questionReader = readline("Pilih = ");

    if ((int)$questionReader == 1) {
        seePost($post);
    } else if ((int)$questionReader == 2) {
        firstMenu($post);
    }

}

// sign in reader
function signInReader(Post $post) {
    $reader = new SignInReader("ichas@gmail.com", "222", "Ichas", 18);

    $emailReader = readline("Masukkan email = ");
    $passwordReader = readline("Masukkan password = ");

    if ($emailReader == "ichas@gmail.com" && $passwordReader == "222") {
        menuReader($post);
    } else {
        echo "yah salah \n\n";
        firstMenu($post);
    }
}

function firstMenu(Post $post) {

    echo <<<firstMenu

    1. Masuk sebagai penulis
    2. Masuk sebagai pembaca
    3. Keluar

    firstMenu;

    $choose = readline("Pilih = ");

    if ((int)$choose == 1) {
        signInWriter($post);
    } else if ((int)$choose == 2) {
        signInReader($post);
    } else if ((int)$choose == 3) {
        exit();
    } 

}