<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion</title>
    <link rel="stylesheet" href="blog.css">
</head>
<body>
    <form action="insert.php" enctype="multipart/form-data" method="POST">
        <label for="title">Titre : <input type="text" name="title"></label>
        <label for="content">Contenu : <textarea name="content"></textarea></label>
        <input type="file" name="image" id="img">
        <input type="submit" placeholder="Envoyer">
    </form>
</body>
</html>