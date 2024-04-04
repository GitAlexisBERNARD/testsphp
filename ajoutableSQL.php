<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$sqlQuery = 'INSERT INTO recipes (title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)';
$insertRecipe = $mysqlClient->prepare($sqlQuery);
$insertRecipe->execute([
    'title' => 'Salade Romaine',
    'recipe' => 'Etape 1 : Lavez la salade ; Etape 2',
    'author' => 'alexis.bernqrd@ymail.com',
    'is_enabled' => true,
]);
?>
<?php
$sqlQuery = 'SELECT * FROM recipes WHERE author = "alexis.bernqrd@ymail.com"';
$insertRecipe = $mysqlClient->prepare($sqlQuery);
$insertRecipe->execute();
$recipes = $insertRecipe->fetchAll();
foreach ($recipes as $recipe) {
    echo '<li>' . $recipe['title'] . '</li>';
    echo '<li>' . $recipe['author'] . '</li>';
}
?>

