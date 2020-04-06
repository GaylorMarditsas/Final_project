<?php 
$god = $godFront->readFront($_GET['id']);



?>

<main>
            <section class="god">
            <div>
                <img src="<?= $god['image'] ?>" alt="<?= $god['name'] ?>">
                <h1><?= $god['name'] ?></h1>
                <p><?= $god['content'] ?></p>
            
            <div>
            </section>
</main>