<?php
session_start();
$page = $_GET['page'];
$id = $_GET['id'];  //either book or cd
if(strcmp($page,'book')==0){  //from book.html
    $book = $_SESSION['book'];
    if(!isset($book))
        $book = array();
    $book[] = $id;
    $_SESSION['book']=$book;
    header("Location: production.html");
}else{  //from food.html
    $food = $_SESSION['food'];
    if(!isset($food))
        $food = array();
    $food[] = $id;
    $_SESSION['food'] = $food;
    header("Location:production.html");
}

?>