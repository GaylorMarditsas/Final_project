<?php
$gods = $homeBack->viewBack();
$id = $homeBack->read('$id');
?>
<main>
<!-- ACCUEIL DE L'ADMINISTRATION -->
    <h1 class="admin-title lato">Espace administration</h1>
    <div class="anchor-center lato">
        <a href="indexBack.php?action=create">Ajouter un Dieu</a>
    </div>
    <section>
            <ul class="galleryBack center">
            <?php while($god = $gods->fetch()) : ?>
                <li>
                    <div>
                        <p><?= $god['id'] ?></p>
                        <h3 class="lato"><?= $god['name'] ?></h3>
                        <img class="table-image" src="<?= $god['image'] ?>">
                    </div>
                    <a href="indexBack.php?action=update&id=<?= $god['id']  ?>">Modifier</a>
                    <a onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')"
                            href="indexBack.php?action=delete&id=<?= $god['id'] ?>">Supprimer</a>
                </li>
                <?php endwhile ?>
            </ul>
    </section>
</main>
</body>