<?php 
$galleryFront = $galleryFront->viewGallery();

?>

<main>
    <div id="gallery">
    
    <?php while($gallery = $galleryFront->fetch()) : ?>
        <div class="gallery-container">
            <img  class="image" src="<?= $gallery['image'] ?>">
                <div class="overlay">
                    <h3 class="lato"><?= $gallery['name'] ?></h3>
                </div>
        </div>
    <?php endwhile ?>
    </div>

</main>