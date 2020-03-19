<?php
$gods = $godsFront->viewFront();

?>

<main>

<form action = "ControllerFront.php" method = "get">
   <input type = "search" name = "terme">
   <input type = "submit" name = "s" value = "Rechercher">
  </form>
    <section class="gods-description lato">

        <?php while($god = $gods->fetch()) : ?>

        <div class="gods center">
            <a href="#">
                <img src="<?= $god['image'] ?>" alt="<?= $god['name'] ?>">
            </a>
            <div>
                <a href="#">
                    <h2><?= $god['name'] ?></h2>
                </a>
                <p><?= $god['description'] ?></p>
            </div>
        </div>

        <?php endwhile ?>

    </section>
</main>