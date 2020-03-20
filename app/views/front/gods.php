

<main>
    <div class="search-gods lato">
        <form action="FrontManager.php" method="get">
            <label for="search">Rechercher : </label>
            <input type="search" name="search" autocomplete="off">
        </form>
    </div>
    <section class="gods-description lato">
                                     <!--essai de condition avec bdd mais ne marche pas car les infos sont seulement charger au chargement de la page -->
                                                                    <!--affiche du dieu avec la recherche -->
        <?php  
        if (isset($_GET['search']) and !empty($_GET['search'])) : 
        $searchbar = $searchFront->searchFront();
        ?>

        <?php while($searchGods = $searchFront->fetch()) : ?>

        <div class="gods center">
            <a href="#">
                <img src="<?= $searchGods['image'] ?>" alt="<?= $searchGods['name'] ?>">
            </a>
            <div>
                <a href="#">
                    <h2 class="name"><?= $searchGods['name'] ?></h2>
                </a>
                <p><?= $searchGods['description'] ?></p>
            </div>
        </div>

        <?php
endwhile;
else :
    $gods = $godsFront->viewFront();    
?>
                                                                            <!--affichage classique-->
        <?php while($god = $gods->fetch()) : ?>

        <div class="gods center">
            <a href="#">
                <img src="<?= $god['image'] ?>" alt="<?= $god['name'] ?>">
            </a>
            <div>
                <a href="#">
                    <h2 class="name"><?= $god['name'] ?></h2>
                </a>
                <p><?= $god['description'] ?></p>
            </div>
        </div>

        <?php
        endwhile;
    endif;
        ?>

    </section>
</main>
<script src="app/public/js/index.js"></script>
</body>