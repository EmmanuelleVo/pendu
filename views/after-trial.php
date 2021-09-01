<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le pendu</title>
</head>
<body>
<?php if(isset($_SESSION['user'])): ?>
    <?php include('./views/partials/navigation.php') ?>
<?php else: ?>
    <?php include('./views/partials/admin-links.php') ?>
<?php endif; ?>

<?php var_dump('AFTER TRIAL'); if($gameState === 'start'): ?>
<div>
    <h1>Trouve le mot en moins de <?= MAX_TRIALS ?> coups !</h1>
</div>
<div>
    <p>Le mot à deviner compte <?= $lettersCount ?> lettres&nbsp;: <?= $replacementString ?></p>
</div>
<div>
    <img src="images/pendu<?= $trials ?>.gif"
         alt="pendu niveau <?= $trials ?>">
</div>
<div>
    <?php if ($triedLetters): ?>
        <p>Les lettres que vous avez essayés sont : <?= $triedLettersStr ?></p>
    <?php else: ?>
        <p>Tu n’as encore essayé aucune lettre</p>
    <?php endif; ?>
</div>
<form action="index.php"
      method="post">
    <fieldset>
        <legend>Il te reste <?= MAX_TRIALS - $trials ?> essais pour sauver ta peau</legend>
        <div>
            <label for="triedLetter">Choisis ta lettre</label>
            <select name="triedLetter"
                    id="triedLetter">
                <?php foreach ($_SESSION['letters'] as $letter => $available) : ?>
                    <?php if ($available): ?>
                        <option value="<?= $letter ?>"><?= $letter ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <!--<input type="hidden"
                   name="serializedLetters"
                   value="a%3A26%3A%7Bs%3A1%3A%22a%22%3Bb%3A0%3Bs%3A1%3A%22b%22%3Bb%3A1%3Bs%3A1%3A%22c%22%3Bb%3A1%3Bs%3A1%3A%22d%22%3Bb%3A1%3Bs%3A1%3A%22e%22%3Bb%3A1%3Bs%3A1%3A%22f%22%3Bb%3A1%3Bs%3A1%3A%22g%22%3Bb%3A1%3Bs%3A1%3A%22h%22%3Bb%3A1%3Bs%3A1%3A%22i%22%3Bb%3A1%3Bs%3A1%3A%22j%22%3Bb%3A1%3Bs%3A1%3A%22k%22%3Bb%3A1%3Bs%3A1%3A%22l%22%3Bb%3A1%3Bs%3A1%3A%22m%22%3Bb%3A1%3Bs%3A1%3A%22n%22%3Bb%3A1%3Bs%3A1%3A%22o%22%3Bb%3A1%3Bs%3A1%3A%22p%22%3Bb%3A1%3Bs%3A1%3A%22q%22%3Bb%3A1%3Bs%3A1%3A%22r%22%3Bb%3A1%3Bs%3A1%3A%22s%22%3Bb%3A1%3Bs%3A1%3A%22t%22%3Bb%3A1%3Bs%3A1%3A%22u%22%3Bb%3A1%3Bs%3A1%3A%22v%22%3Bb%3A1%3Bs%3A1%3A%22w%22%3Bb%3A1%3Bs%3A1%3A%22x%22%3Bb%3A1%3Bs%3A1%3A%22y%22%3Bb%3A1%3Bs%3A1%3A%22z%22%3Bb%3A1%3B%7D">
            <input type="hidden"
                   name="triedLetters"
                   value="a">
            <input type="hidden"
                   name="wordIndex"
                   value="92379">
            <input type="hidden"
                   name="replacementString"
                   value="*********">
            <input type="hidden"
                   name="lettersCount"
                   value="9">
            <input type="hidden"
                   name="trials"
                   value="1">-->
            <input type="hidden" name="action" value="store">
            <input type="hidden" name="resource" value="game">
            <input type="submit"
                   value="essayer cette lettre">
        </div>
    </fieldset>
</form>
<?php if(isset($data['error'])):?>
    <p><?= $data['error']?></p>
<?php endif; ?>
<?php elseif($gameState === 'lost'): ?>
<?php include('./views/lost.php') ?>
<?php elseif($gameState === 'win'): ?>
<?php include('./views/won.php') ?>
<?php endif;?>
</body>
</html>