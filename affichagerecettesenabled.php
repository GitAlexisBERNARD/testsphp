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
    <?php
    $recipes =  [
        [
            'title' => 'Salade Romaine',
            'recipe' => 'Etape 1 : Lavez la salade ; Etape 2 : euh ...',
            'author' => 'laurene.castor@exemple.com',
            'is_enabled' => true,
        ],
        [
            'title' => 'Couscous',
            'recipe' => 'Etape 1 : Préparez les légumes ; Etape 2 : ...',
            'author' => '', 
            'is_enabled' => false,
        ],
        [
            'title' => 'Cassoulet',
            'recipe' => 'Etape 1 : Préparez les haricots ; Etape 2 : ...',
            'author' => '',
            'is_enabled' => true,
        ]
    ];



    function getRecipe(array $recipes) : array  
    {
        $enabledRecipes = [];
        foreach ($recipes as $recipe) {
            if ($recipe['is_enabled'] === true) {
                $enabledRecipes[] = $recipe;
            }
        }
        return $enabledRecipes;
    }
?>

    <body>
        <h1>Affichages des recettes enabled</h1>
        <ul>
            <?php
            foreach (getRecipe($recipes) as $recipe) {
                echo '<li>' . $recipe['title'] . '</li>';
            }
            ?>
        </ul>
    </body>
</html>