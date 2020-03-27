<?php

require './classes/autoload.php';
require './models/Database.php';

session_start();

$characters = Database::getAllCharacters();

if (isset($_SESSION['fighting'])) {
    $class1 = '\classes\\' . $_SESSION['fighters'][0]['type'];
    $player1 = new $class1($_SESSION['fighters'][0]['name']);
    $class2 = '\classes\\' . $_SESSION['fighters'][1]['type'];
    $player2 = new $class2($_SESSION['fighters'][1]['name']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="icon" href="public/images/chocobo.png">
    <title>Baston</title>
</head>
<body>
<header class="flex">
    <div class="reset-button flex padding-bot">
        <form action="controllers/fightReset.php" method="POST">
            <input class="button" type="submit" value="Reset">
        </form>
    </div>
    <ul class="flex">
        <form class="flex check-form" action="controllers/fightController.php" method="POST">
            <div class="flex padding-bot">
                <div class="checkbox-button flex">
                    <p>Joueur 1 :</p>
                    <?php foreach ($characters as $character): ?>
                        <li>
                            <input type="radio" name="player1" value="<?= $character['id'] ?>">
                            <label for="<?= $character['type'] ?>"><?= $character['type'] ?></label><br>
                        </li>
                    <?php endforeach ?>
                </div>
                <div class="checkbox-button flex">
                    <p>Joueur 2 :</p>
                    <?php foreach ($characters as $character): ?>
                        <li>
                            <input type="radio" name="player2" value="<?= $character['id'] ?>">
                            <label for="<?= $character['type'] ?>"><?= $character['type'] ?></label><br>
                        </li>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="go-button flex">
                <input type="submit" value="Baston!">
            </div>
        </form>
    </ul>
</header>
<main class="flex">
    <div class="fight">
        <?php if (isset($_SESSION['fighting'])): ?>
            <?php $i = 1 ?>
            <?php while ($player1->getLifePoints() > 0 && $player2->getLifePoints() > 0): ?>
                <div class="flex row">
                    <div class="count flex border">
                        <span>Tour</span>
                        <span><?= $i ?></span>
                    </div>
                    <div class="round border">
                        <p><?= $player1->attack($player2) ?></p>
                        <?php $status = "{$player1->name} a gagné le combat!" ?>
                        <?php if ($player2->getLifePoints() > 0): ?>
                            <p><?= $player2->attack($player1) ?></p>
                            <?php $status = "{$player2->name} a gagné le combat!" ?>
                        <?php endif ?>
                    </div>
                    <?php $i ++ ?>
                </div>
            <?php endwhile ?>
            <h1 class="victory"><?= $status ?></h1>
        <?php endif ?>
    </div>
</main>
</body>
</html>
