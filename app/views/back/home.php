<?php
$gods = $homeBack->viewBack();
$user = $homeBack->read('$id');
?>


<main>
    
    <section class="godlist">
        <div class="godlist-container center">
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
                    <td><a href="index.php?action=update&id=<?= $god['id'] ?>">Modifier</a></td>
                </tr>
                <?php endwhile ?>
            </table>

        </div>

    </section>
</main>
</body>