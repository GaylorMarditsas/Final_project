<?php $error= "Votre fichier n'est pas une image";?>

<main>
    <h1 class="admin-title lato">Créer un Dieu</h1>
    <section class="godback">

        <form class="backform lato" enctype="multipart/form-data" action="" method="post" name="create">
            <div>
                <label for="name">Nom</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="content">Contenu</label>
                <textarea name="content" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="image">Image</label>
                <input type="file" name="image">
                <span><?php if(isset($error) && !empty($_FILES)){echo $error;}?></span>
            </div>
            <div>
                <button type="submit" name="submit">Valider</button>
            </div>
        </form>
    </section>
</main>