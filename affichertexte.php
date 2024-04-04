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
    </body>
</html>