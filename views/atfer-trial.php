<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Le pendu</title>
</head>
<body>
<div>
    <h1>Trouve le mot en moins de 8 coups !</h1>
</div>
<div>
    <p>Le mot à deviner compte 9 lettres&nbsp;: *********</p>
</div>
<div>
    <img src="images/pendu1.gif"
         alt="pendu niveau 1">
</div>
<div>
    <p>Voici les lettres que tu as déjà essayées&nbsp;: a</p>
</div>
<form action="index.php"
      method="post">
    <fieldset>
        <legend>Il te reste 7 essais pour sauver ta peau</legend>
        <div>
            <label for="triedLetter">Choisis ta lettre</label>
            <select name="triedLetter"
                    id="triedLetter">
                <option value="b">b</option>
                <option value="c">c</option>
                <option value="d">d</option>
                <option value="e">e</option>
                <option value="f">f</option>
                <option value="g">g</option>
                <option value="h">h</option>
                <option value="i">i</option>
                <option value="j">j</option>
                <option value="k">k</option>
                <option value="l">l</option>
                <option value="m">m</option>
                <option value="n">n</option>
                <option value="o">o</option>
                <option value="p">p</option>
                <option value="q">q</option>
                <option value="r">r</option>
                <option value="s">s</option>
                <option value="t">t</option>
                <option value="u">u</option>
                <option value="v">v</option>
                <option value="w">w</option>
                <option value="x">x</option>
                <option value="y">y</option>
                <option value="z">z</option>
            </select>
            <input type="hidden"
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
                   value="1">
            <input type="submit"
                   value="essayer cette lettre">
        </div>
    </fieldset>
</form>
</body>
</html>