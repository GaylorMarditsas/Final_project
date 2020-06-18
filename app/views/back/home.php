<?php
$gods = $homeBack->viewBack();
$id = $homeBack->read('$id');
?>
<main>
<!-- ACCUEIL DE L'ADMINISTRATION -->
    <h1 class="admin-title lato">Espace administration</h1>
    <div class="anchor-center lato">
        <a title="Ajouter un dieu" href="ajouter-dieu">Ajouter un Dieu</a>
    </div>
    <section>
            <ul class="galleryBack">
            <?php while($god = $gods->fetch()) : ?>
                <li>
                    <div>
                        <h3 class="lato"><?= $god['name'] ?></h3>
                        <img class="table-image" src="<?= $god['image'] ?>" alt="<?= $god['name'] ?>">
                    </div>
                    <a title="Modifier" href="modifier-dieu-<?= $god['id']  ?>">Modifier</a>
                    <a title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')"
                            href="indexBack.php?action=delete&id=<?= $god['id'] ?>">Supprimer</a>
                </li>
                <?php endwhile ?>
            </ul>
    </section>
</main>
</body>
</html>