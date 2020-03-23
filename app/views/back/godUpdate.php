<?php $god = $homeBack->read($_GET['id']); ?>


<div>
    <p><?= $god['name']?></p>
    <p><?= $god['description']?></p>
    <p><?= $god['content']?></p>
    <img src="<?= $god['image']?>" alt="<?= $god['name'] ?>">
</div>