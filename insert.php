<?php 
    $connexion = new PDO('mysql:host=127.0.0.1;dbname=blog_poo', 'root', '');
    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    date_default_timezone_set('Europe/London');

    session_start();

    include("Manager_class.php");
    include("Blog_class.php");
    $manage = new Manager($connexion);
    $blog = new Blog();
    $title = htmlspecialchars($_POST["title"]);
    $content = htmlspecialchars($_POST["content"]);
    $blog->setTitle($title);
    $blog->setContent($content);
    $img = $_FILES["image"];
    $name = basename($img["name"]);
    $img_hashed = hash("md5", $name);
    $upload = move_uploaded_file($img["tmp_name"], "./photo/$img_hashed");
    $blog->setImage($img_hashed);
    $date = date("Y-m-d H:i:s");
    $blog->setDate($date);

    $manage->insert($blog);
    header("Location:affichage.php");

?>