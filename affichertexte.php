<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Ma page web</title>
        <?php
$number = 10;
$result = (($number + 5) * $number);
$resultbool = false;
?>
    </head>
    <body>
        <h1>le nombre est <?php 
        if ($resultbool === false) {
            echo($result);
            }
            ?>
        </h1>
        <p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>
        <section>
            <p>Affichage d'un tableau en php</p>
            <?php
            $mickael = ['Mickaël Andrieu', 'mickael.andrieu@exemple.com', 'S3cr3t', 34];
            $mathieu = ['Mathieu Nebra', 'mathieu.nebra@exemple.com', 'devine', 33];
            $laurene = ['Laurène Castor', 'laurene.castor@exemple.com', 'P4ssw0rD', 28];
            $recipes = [
                ['Cassoulet','[...]','mickael.andrieu@exemple.com',true,],
                ['Couscous','[...]','mickael.andrieu@exemple.com',false,],
            ];
            $users = [$mickael, $mathieu, $laurene];
            
            while ($user = current($users)) {
                echo '<ul>';
                foreach ($user as $value) {
                    echo '<li>' . $value . '</li>';
                }
                echo '</ul>';
                next($users);
            }
            for ($i = 0; $i < count($users); $i++) {
                echo '<ul>';
                for ($j = 0; $j < count($users[$i]); $j++) {
                    echo '<li>' . $users[$i][$j] . '</li>';
                }
                echo '</ul>';
            }
            ?>
            <p>Affiche des recettes de cuisine</p>
            <!-- <ul><?php for ($i = 0; $i < count($recipes); $i++) ?>
                <li><?php echo $recipes;    ?></li>
            </ul> -->
            <p>Affiche les recttes de cuisines en fonction de la fonction is enabled</p>
            <?php
            $isAllowed = allowRecipe([
                'title' => 'Escalope milanaise',
                'recipe' => '',
                'author' => 'mathieu.nebra@exemple.com',
                'is_enabled' => true,
            ]);
            
            if ($isAllowed) {
                echo 'La recette doit être affichée !';
            } else {
                echo 'La recette doit être cachée !';
            }
            ?>
    </body>
</html>