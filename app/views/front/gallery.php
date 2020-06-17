<?php 
$galleryFront = $galleryFront->viewGallery();
?>

<main>
    <h1 class="first-title">Galerie</h1>
    <section class="gallery">
        <!-- GALERIE D'IMAGES -->
        <?php while($gallery = $galleryFront->fetch()) : ?>

        <figure class="gallery-container">
            <a title="<?= $gallery['name'] ?>" data-fancybox="gallery" href="<?= $gallery['image'] ?>">
                <img class="image" src="<?= $gallery['resized_image'] ?>" alt="<?= $gallery['name'] ?>">
            </a>
            <figcaption class="overlay">
                <h3 class="lato"><?= $gallery['name']; ?></h3>
            </figcaption>
        </figure>
        <?php endwhile ?>
    </section>
</main>