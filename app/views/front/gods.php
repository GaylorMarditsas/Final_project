
<?php
    $gods = $godsFront->viewFront();   
?>
<main>
    <div class="search-gods lato">
        <form action="" method="get">
            <label for="search">Rechercher : </label>
            <input id="search" onKeyUp=searchbar() type="search" name="search" autocomplete="off">
        </form>
    </div>
    <div id="result" class="lato gods center">
    
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
<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
<script src="app/public/js/index.js"></script>
</body>