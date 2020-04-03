<?php
$god = $homeBack->read($_GET['id']);
    //   $update = $updateBack->update(); 
?>

<main>
<h1>Modifier un Dieu</h1>
    <form action="" method="post">
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" value="<?= $god['name']?>">
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" id="" cols="30" rows="10"><?= $god['description']?></textarea>
        </div>
        <div>
            <label for="content">Contenu :</label>
            <textarea name="content" id="" cols="30" rows="10"><?= $god['content']?></textarea>
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="file" name="image" id="">
        </div>
        <div>
            <button type="submit" name="submit">Valider</button>
        </div>

    </form>
    <img src="<?= $god['image']?>" alt="<?= $god['name'] ?>">
</main>