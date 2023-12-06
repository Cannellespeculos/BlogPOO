<?php 

session_start();
        $connexion = new PDO('mysql:host=127.0.0.1;dbname=blog_poo', 'root', '');
        $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        include("auth_manager_class.php");
        include("user_class.php");

        $auth_manage = new Auth_manager($connexion);
        $user = new User() ;
        if (isset($_POST['pseudo']) && isset($_POST['password'])) {
            $user->setPseudo($_POST['pseudo']);
        $user->setPassword($_POST['password']);
        $auth_manage->insertLogin($user);
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
    <form action="creation.php" method="POST">
        <label for="pseudo">Pseudo : <input type="text" name="pseudo"></label>
        <label for="password">Password : <input name="password" type='password'></input></label>
        <input type="submit" placeholder="Envoyer">
    </form>


   
</body>

</html>