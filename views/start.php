<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= PAGE_TITLE ?></title>
</head>
<body>
<?php if($gameState === 'start'): ?>
    <div>
        <h1>Trouve le mot en moins de <?= MAX_TRIALS ?> essais !</h1>
    </div>
    <div>
        <p>Le mot à deviner compte <?= $lettersCount ?> lettres&nbsp;: <?= $replacementString ?></p>
    </div>
    <div>
        <img src="images/pendu<?= $trials ?>.gif"
             alt="pendu niveau <?= $trials ?>" width="350" height="auto">
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
            <legend>Il te reste <?= MAX_TRIALS - $trials ?> essais pour sauver ta peau
            </legend>
            <div>
                <label for="triedLetter">Choisis ta lettre</label>
                <select name="triedLetter"
                        id="triedLetter">
                    <?php foreach ($letters as $letter => $available) : ?>
                        <?php if ($available): ?>
                            <option value="<?= $letter ?>"><?= $letter ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
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