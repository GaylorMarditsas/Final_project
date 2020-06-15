<?php
$god = $homeBack->read($_GET['id']);


?>

<main>
<h1 class="admin-title lato">Modifier un Dieu</h1>
<section class="godback">
    <form class="backform lato" enctype="multipart/form-data" action="" method="post" name="update-god">
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" value="<?= $god['name']?>">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="" cols="30" rows="10"><?= $god['description']?></textarea>
        </div>
        <div>
            <label for="content">Contenu</label>
            <textarea name="content" id="" cols="30" rows="10"><?= $god['content']?></textarea>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
            <input type="file" name="image">
        </div>
        <img class="table-image" src="<?= $god['image']?>" alt="<?= $god['name'] ?>">
        <div id="erreur"></div>
        <div>
            
            <button type="submit" name="submit">Valider</button>
        </div>

    </form>
    
</section>
    
</main>
<script src="app/public/js/index.js"></script>
</body>