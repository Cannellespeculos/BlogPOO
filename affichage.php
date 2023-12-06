<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage</title>
    <link rel="stylesheet" href="blog.css">
</head>
<body>
    <header>
        <h1>Blog</h1>
        <?php 
        session_start();


            if (!isset($_SESSION['Id'])) {
                echo '<a href="authentification.php">Me connectez</a>';
                echo '<a href="creation.php">Créer un compte</a>';
            }else{
                echo '<p>Bienvenue '.$_SESSION['pseudo'].'</p>';
                echo '<a href="insertion.php">Créer un nouveau post</a>';
            }

        ?>
        
        <hr>
    </header>

    <main>
        <?php 
            $connexion = new PDO('mysql:host=127.0.0.1;dbname=blog_poo', 'root', '');
            $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
            date_default_timezone_set('Europe/London');
        
            include("Manager_class.php");
            $manage = new Manager($connexion);
            $manage->getAll()
        
        ?>
    </main>
</body>
</html>