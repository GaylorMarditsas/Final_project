<?php 
$galleryFront = $galleryFront->viewGallery();
?>

<main>
    <section class="gallery">
        <!-- GALERIE D'IMAGES -->
        <?php while($gallery = $galleryFront->fetch()) : ?>

        <div class="gallery-container">
            <a data-fancybox="gallery" href="<?= $gallery['image'] ?>">
                <img class="image" src="<?= $gallery['resized_image'] ?>">
            </a>
            <div class="overlay">
                <h3 class="lato"><?= $gallery['name']; ?></h3>
            </div>
        </div>
        <?php endwhile ?>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="app/public/js/index.js"></script>
</body>