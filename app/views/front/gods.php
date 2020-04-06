
<?php
    $gods = $godsFront->viewFront();    
?>
<main>
    <div class="search-gods lato">
        <form action="FrontManager.php" method="get">
            <label for="search">Rechercher : </label>
            <input type="search" name="search" autocomplete="off">
        </form>
    </div>
    <section class="gods-description lato">

                                                                            <!--affichage classique-->
        <?php while($god = $gods->fetch()) : ?>

        <div class="gods center">
            <a href="index.php?action=god&id=<?= $god['id'] ?>">
                <img src="<?= $god['image'] ?>" alt="<?= $god['name'] ?>">
            </a>
            <div>
                <a href="index.php?action=god&id=<?= $god['id'] ?>">
                    <h2 class="name"><?= $god['name'] ?></h2>
                </a>
                <p><?= $god['description'] ?></p>
            </div>
        </div>

        <?php
        endwhile;
        ?>

    </section>
</main>
<script src="app/public/js/index.js"></script>
</body>