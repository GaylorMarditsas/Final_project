<?php 
$galleryBack = $galleryBack->galleryBack();

?>
<main>
<!-- GESTION DE LA GALERIE D'IMAGES -->
    <h1 class="admin-title lato">Administration de la galerie</h1>
    <div class="anchor-center lato">
        <a href="ajouter-image">Ajouter des images</a>
    </div>
    <ul class="galleryBack">
        <?php while($gallery = $galleryBack->fetch()) : ?>
        <li>
            <div>
                <img class="table-image" src="<?= $gallery['resized_image'] ?>" alt="<?= $gallery['name'] ?>">
                <h3 class="lato"><?= $gallery['name'] ?></h3>
            </div>
            <a title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?')"
                href="indexBack.php?action=deleteImage&id=<?= $gallery['id'] ?>">Supprimer</a>
        </li>
        <?php endwhile ?>
    </ul>
</main>
</body>