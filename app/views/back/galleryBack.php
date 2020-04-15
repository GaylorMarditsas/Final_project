<?php 
$galleryBack = $galleryBack->galleryBack();

?>

<main>
    <h1 class="admin-title lato">Administration de la galerie</h1>
    <div class="anchor-center lato">
        <a href="indexBack.php?action=createImage">Ajouter des images</a>
    </div>
    <ul class="galleryBack center">
        <?php while($gallery = $galleryBack->fetch()) : ?>
        <li>
            <div>
                <img class="table-image" src="<?= $gallery['image'] ?>">
                <h3 class="lato"><?= $gallery['name'] ?></h3>
            </div>
            <a href="indexBack.php?action=deleteImage&id=<?= $gallery['id'] ?>">Supprimer</a>
        </li>
        <?php endwhile ?>
    </ul>

</main>