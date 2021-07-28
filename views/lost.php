<div>
    <h1>Tu n’as pas trouvé le mot <i><?= $word ?></i> en moins de <?= MAX_TRIALS ?> essais incorrects !</h1>
</div>
<div>
    <img src="images/pendu8.gif"
         alt="Tu es pendu">
</div>
<div>
    <p>Voici les lettres que tu as essayées, dans l’ordre alphabétique&nbsp;: <?= $triedLettersStr ?></p>
</div>
<div>
    <p><a href="index.php">Recommence&nbsp;!</a></p>
</div>
