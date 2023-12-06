<?php 
    class Auth_manager {
        private $pdo;

        function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function insertLogin($user) {
            $sql = "INSERT INTO authentification (Pseudo, Password) VALUES (:pseudo, :password)";
            $prepare = $this->pdo->prepare($sql);
            $prepare->execute(array("pseudo" => $user->getPseudo(), "password" => $user->getPassword()));
            $_SESSION['Id'] = $this->pdo->lastInsertId();
            $_SESSION['pseudo'] = $user->getPseudo();
            echo $_SESSION['Id'];
            header('Location:affichage.php');
        }

        function getLogin() {
            $sql = "SELECT Id_auteur, Pseudo, Password FROM authentification WHERE Pseudo = :pseudo AND Password = :password";
            $prepare = $this->pdo->prepare($sql);
            $prepare->execute(array("pseudo" => $_POST['pseudo'], "password" => $_POST['password']));
            $row = $prepare->fetch();
            if ($row) {
                $_SESSION['Id'] = $row['Id_auteur'];
                $_SESSION['pseudo'] = $row['Pseudo'];
            }
        }
    }
?>