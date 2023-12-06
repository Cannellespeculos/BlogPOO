<?php
// classe manager pour afficher les post, les créer et les effacer
class Manager
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function insert($blog)
    {
        $sql = "INSERT INTO post(Title, Content, Image, Date, Id_auteur) VALUES (:title, :content, :image , :date, :id)";
        $prepare = $this->pdo->prepare($sql);
        $prepare->execute(array("title" => $blog->getTitle(), "content" => $blog->getContent(), "image" => $blog->getImage(), "date" => $blog->getDate(), "id" => $_SESSION["Id"]));
    }

    function getAll()
    {
        $getsql = "SELECT Id_post,Title, Content, Image, Date, Pseudo FROM Post JOIN authentification ON Post.Id_auteur = authentification.Id_auteur ORDER BY Date DESC";
        $read = $this->pdo->prepare($getsql);
        $read->execute();

        while ($ligne = $read->fetch()) {
            echo "<article>";
            echo "<h2>".$ligne['Title']."</h2>";
            echo "<p>".$ligne['Content']."</p>";
            echo "<img src='photo/".$ligne['Image']."' style='width: 250px;'>";
            echo "<p>".date("d-m-Y H:i:s", strtotime($ligne['Date']))."</p>";
            echo "<p>".$ligne['Pseudo']."</p>";
           
            $id = $ligne['Id_post'];
            if (isset($_SESSION["Id"])) {
                if ($ligne["Pseudo"] === $_SESSION["pseudo"]) {
                    echo "<form action='affichage.php' method='POST'>";
                    echo "<input type='hidden' value=".$id." name='deletepost' ></input>";
                    echo "<button name='delete'><i class='fa-solid fa-trash'></i></button>";
                    echo "</form>";

                }
           
            echo "</article>";
            echo "<hr>";

        }
    }
    }

    function deletePost() {
        $deletesql = "DELETE FROM Post WHERE Id_post = :id";
        $delete = $this->pdo->prepare($deletesql);
        $delete->execute(array("id" => $_POST['deletepost']));

    }
}
?>