<?php 
$gods = $createImage->viewBack();;
$error= "Le format du fichier n'est pas accepté";
?>

<main>
    <h1 class="admin-title lato">Ajouter des images</h1>
    <section class="godback">

        <form class="backform lato" enctype="multipart/form-data" action="" method="post" name="create">
            <div>
            <select  name="name">
            <?php while($god = $gods->fetch()) : ?>
                    <option value="<?= $god['id'];?>"><?= $god["name"];?></option>
            <?php endwhile; ?>
            </select>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file"  name="image">
                <span><?php if(isset($error) && !empty($_FILES)){echo $error;}?></span>
            </div>
            <div>
                <button type="submit" name="submit">Valider</button>
            </div>
        </form>
    </section>
</main>
</body>