<?php

require_once "sign-in-writer.php";
require_once "sign-in-reader.php";
require_once "ichas.php";
require_once "post.php";

$db_article = new SeePost();
$db_post = new Post();

firstMenu($db_article, $db_post);
// menuWriter();/

// $db_article = new SeePost();

// buat artikel
function createArticle(SeePost $seePost, Post $post) {
    $nameWriter = readline("nama = ");
    $tittleWriter = readline("Judul artikel = ");
    $ideas = readline("Tulis ide = ");

    
    $seePost->setNameAuthor($nameWriter);
    $seePost->setTittle($tittleWriter);
    $seePost->setIdeas($ideas);

    // push
    $post->setViewPost($seePost);

    menuWriter($seePost, $post);
}

// menu ketika writer sudah sign in
function menuWriter(SeePost $seePost, Post $post) {
    echo "\n1. Buat artikel \n";
    echo "2. Hapus artikel \n";
    echo "3. Exit \n";

    $questionWriter = readline("Pilih = ");

    if ((int)$questionWriter == 1) {
        createArticle($seePost, $post);
    } else if ((int)$questionWriter == 2) {
        echo "masih proses ya";
    } else if ((int)$questionWriter == 3) {
        firstMenu($seePost, $post);
    }
}

// sign in writer
function signInWriter(SeePost $seePost, Post $post) {
    $writer = new SignInWriter("john@gmail.com", "123", "John", 22);

    $emailWriter = readline("Masukkan email = ");
    $passwordWriter = readline("Masukkan password = ");

    if ($emailWriter == "john@gmail.com" && $passwordWriter == "123") {
        menuWriter($seePost, $post);
    } else {
        echo "yah salah \n\n";
        firstMenu($seePost, $post);
    }
}

// menampilkan postingan writer
function seePost(SeePost $seePost, Post $post) {

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

    menuReader($seePost, $post);
}

// menu ketika reader sudah sign in
function menuReader(SeePost $seePost, Post $post) {
    echo "\n1. Lihat postingan \n";
    echo "2. keluar \n";

    $questionReader = readline("Pilih = ");

    if ((int)$questionReader == 1) {
        seePost($seePost, $post);
    } else if ((int)$questionReader == 2) {
        firstMenu($seePost, $post);
    }
}

// sign in reader
function signInReader(SeePost $seePost, Post $post) {
    $reader = new SignInReader("ichas@gmail.com", "222", "Ichas", 18);

    $emailReader = readline("Masukkan email = ");
    $passwordReader = readline("Masukkan password = ");

    if ($emailReader == "ichas@gmail.com" && $passwordReader == "222") {
        menuReader($seePost, $post);
    } else {
        echo "yah salah \n\n";
        firstMenu($seePost, $post);
    }
}

function firstMenu(SeePost $seePost, Post $post) {
    echo "1. Sign In Writer \n";
    echo "2. Sign In Reader \n";
    echo "3. Exit \n";

    $choose = readline("Pilih = ");

    if ((int)$choose == 1) {
        signInWriter($seePost, $post);
    } else if ((int)$choose == 2) {
        signInReader($seePost, $post);
    } else if ((int)$choose == 3) {
        exit();
    } 
}