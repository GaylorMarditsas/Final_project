<?php
$god = $homeBack->read($_GET['id']);


?>

<main>
<h1 class="admin-title lato">Modifier un Dieu</h1>
<section class="godback">
    <form class="backform lato" enctype="multipart/form-data" action="" method="post">
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
            <input type="file" name="image">
            <span><?php if(isset($error) && !empty($_FILES)){echo $error;}?></span>
        </div>
        <img class="table-image" src="<?= $god['image']?>" alt="<?= $god['name'] ?>">
        <div>
            <button type="submit" name="submit">Valider</button>
        </div>

    </form>
    
</section>
    
</main>
</body>