<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ma page web</title>
</head>
<?php
    try {
        $mysqlClient = new PDO('mysql:host=localhost;dbname=partage_de_recettes;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    if (isset($_POST['recipe_id']) && isset($_POST['recipe_title'])) {
        $sqlQuery = 'UPDATE recipes SET title = :title WHERE recipe_id = :recipe_id';
        $updateRecipe = $mysqlClient->prepare($sqlQuery);
        $updateRecipe->execute([
            'title' => $_POST['recipe_title'],
            'recipe_id' => $_POST['recipe_id'],
        ]);
    }
    if (isset($_POST['updateAuthorHide']) && isset($_POST['author_email_hide'])) {
        UpdateAuthorRecipeTrue($mysqlClient, $_POST['author_email_hide']);
    }
    if (isset($_POST['updateAuthor']) && isset($_POST['author_email'])) {
        UpdateAuthorRecipe($mysqlClient, $_POST['author_email']);
    }
    function getAllRecipes(PDO $mysqlClient) : array
    {
        $sqlQuery = 'SELECT * FROM recipes WHERE is_enabled = true';
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll();
    }
    function getAuthorNotEnabledRecipes(PDO $mysqlClient) : array
    {
        $sqlQuery = 'SELECT * FROM recipes WHERE is_enabled = false';
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        return $recipesStatement->fetchAll();
    }
    function UpdateAuthorRecipe(PDO $mysqlClient, string $author) 
    {
        $sqlQuery = 'UPDATE recipes SET is_enabled = false WHERE author = :author';
        $updateRecipe = $mysqlClient->prepare($sqlQuery);
        $updateRecipe->execute([
            'author' => $author,
        ]);
    }
    function UpdateAuthorRecipeTrue(PDO $mysqlClient, string $author) 
    {
        $sqlQuery = 'UPDATE recipes SET is_enabled = true WHERE author = :author';
        $updateRecipe = $mysqlClient->prepare($sqlQuery);
        $updateRecipe->execute([
            'author' => $author,
        ]);
    }
?>
<body>
    <h1>Bienvenu sur la page de recettes</h1>
    <ul>
        <?php
        foreach (getAllRecipes($mysqlClient) as $recipe) {
            echo '<li>' . $recipe['recipe_id'] . '</li>';
            echo '<li>' . $recipe['title'] . '</li>';
            echo '<form action="index.php" method="post">';
            echo '<input type="hidden" name="recipe_id" value="' . $recipe['recipe_id'] . '"/>';
            echo '<input type="text" name="recipe_title" value="' . $recipe['title'] . '"/>';
            echo '<input type="submit" value="Modifier"/>';
            echo '</form>';
            echo '</li>';
            echo '<form action="index.php" method="post">';
echo '<input type="hidden" name="author_email" value="' . htmlspecialchars($recipe['author']) . '"/>';
echo '<input type="submit" name="updateAuthor" value="Ne plus afficher les recettes de cet auteur"/>';
echo '</form>';
        }
        echo "test";
        $displayedAuthors = []; 

        foreach (getAuthorNotEnabledRecipes($mysqlClient) as $recipe) {
            if (!in_array($recipe['author'], $displayedAuthors)) {
                echo '<li>' . htmlspecialchars($recipe['author']) . '</li>';
                echo '<form action="index.php" method="post">';
                echo '<input type="hidden" name="author_email_hide" value="' . htmlspecialchars($recipe['author']) . '"/>';
                echo '<input type="submit" name="updateAuthorHide" value="Afficher les recettes de cet auteur"/>';
                echo '</form>';
        
                $displayedAuthors[] = $recipe['author']; 
            }
        }
        ?>
</body>
</html> 