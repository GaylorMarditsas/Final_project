<?php 
$gods = $createImage->viewBack();

?>
<main>
<!-- GESTION DE L'AJOUT D'IMAGE DANS LA GALERIE -->
    <h1 class="admin-title lato">Ajouter des images</h1>
    <section class="godback">
        <form class="backform lato" enctype="multipart/form-data" action="indexBack.php?action=createImage" method="post" name="create-gallery">
            <div>
            <select  name="name">

            <?php while($god = $gods->fetch()) : ?>
                    <option value="<?= $god['id'];?>"><?= $god["name"];?></option>
            <?php endwhile; ?>
            
            </select>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                <input type="file"  name="image">
            </div>
            <div>
                <div id="erreur"></div>
                <button type="submit" name="submit">Valider</button>
            </div>
        </form>
    </section>
</main>
<script src="app/public/js/index.js"></script>
</body>
</hmtl>