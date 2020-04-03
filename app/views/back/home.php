<?php
$gods = $homeBack->viewBack();
$user = $homeBack->read('$id');
?>


<main>
<h1>Espace administration</h1>
    <section class="godlist">
        <div class="godlist-container center">
        <a href="indexBack.php?action=create">Ajouter</a>
            <table>
                <tr>
                    <td>&nbsp;</td>
                    <td>id</td>
                    <td>nom</td>
                    <td>image</td>
                </tr>
                <?php while($god = $gods->fetch()) : ?>
                <tr>
                    <td>&nbsp;</td>
                    <td><?= $god['id'] ?></td>
                    <td><?= $god['name'] ?></td>
                    <td><img class="table-image" src="<?= $god['image'] ?>" alt="<?= $god['name'] ?>" /></td>
                    <td><a href="indexBack.php?action=update&id=<?= $god['id'] ?>">Modifier</a></td>
                    <td><a onclick= "return confirm('Voulez-vous vraiment supprimer cet élément ?')"  href="indexBack.php?action=delete&id=<?= $god['id'] ?>">Supprimer</a></td>
                </tr>
                <?php endwhile ?>
            </table>

        </div>

    </section>
</main>
</body>