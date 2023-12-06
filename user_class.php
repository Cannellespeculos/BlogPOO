<?php 

    class User {
        private $id;
        private $pseudo;
        private $password;

        function getId() {
            return $this->id;
        } 

        function getPseudo() {
            return $this->pseudo;
        }

        function setPseudo($pseudo) {
            $this->pseudo = $pseudo;
        }

        function getPassword() {
            return $this->password;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        
    }
?>