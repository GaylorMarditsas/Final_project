<?php 
$god = $godFront->readFront($_GET['id']);
?>
<main>
    <section class="god center">
        <!-- AFFICHAGE D'UN SEUL DIEU -->
        <div class="god-container">
            <img src="<?= $god['image'] ?>" alt="<?= $god['name'] ?>">
            <div class="lato">
                <h1 class="first-title"><?= $god['name'] ?></h1>
                <p><?= $god['content'] ?></p>
            </div>
            <div>
    </section>
</main>