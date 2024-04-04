<h1>Message bien reçu !</h1>
<?php
$getData = $_POST;

if (!isset($getData['nom']) || !isset($getData['prenom']))
{
    echo('Il faut un email et un message pour soumettre le formulaire.');
    return;
}
?>     
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Nom</b> : <?php echo htmlspecialchars($_POST['nom']); ?></p>
        <p class="card-text"><b>Prenom</b> : <?php echo htmlspecialchars($_POST['prenom']); ?></p>
    </div>
</div>