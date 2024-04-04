<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ma page web</title>
    </head>
    <body>
        <a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a>
        <p>ajout param url form</p>
        <form action="bonjour.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="Votre nom" />
            <input type="text" name="prenom" placeholder="Votre prénom" />
            <div class="mb-3">
                <label for="screenshot" class="form-label">Votre capture d'écran</label>
                <input type="file" class="form-control" id="screenshot" name="screenshot" />
            </div>
            <input type="submit" value="Envoyer !" />
    </body>
</html>