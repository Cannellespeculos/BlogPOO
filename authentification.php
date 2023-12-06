<?php 

session_start();
        $connexion = new PDO('mysql:host=127.0.0.1;dbname=blog_poo', 'root', '');
        $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        include("auth_manager_class.php");
        include("user_class.php");

        if (isset($_POST['pseudo']) && isset($_POST['password'])) {
            $auth_manage = new Auth_manager($connexion);
            $auth_manage->getLogin();
            if ($_SESSION['Id'] && $_SESSION['pseudo']) {
                header('Location:affichage.php');
            }

        }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="blog.css">
</head>

<body>
    <form action="authentification.php" method="POST">
        <label for="pseudo">Pseudo : <input type="text" name="pseudo"></label>
        <label for="password">Password : <input name="password" type='password'></input></label>
        <input type="submit" placeholder="Envoyer">
    </form>


   
</body>

</html>