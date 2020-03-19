<?php
$gods = $homeFront->viewFront();

?>


<main>
    <section class="presentation">
        <div class="presentation-container center">
            <h1>Les Dieux</h1>
            <p>Dans la mythologie nordique, on peut classer les dieux en deux groupes : les <span class="strong">Ases</span>, qui présentent de nombreux traits indo-européens, et les <span class="strong">Vanes</span>, leurs aînés. Ces derniers sont sans doute les dieux primordiaux d'une religion antérieure aux invasions indo-européennes. Leurs traits sont plus naturalistes que les Ases.

Dans la culture nordique, les <span class="strong">Ases</span> étaient plutôt priés par les aristocrates nordiques. Les <span class="strong">Vanes</span>, représentatifs de la fécondité et de la fertilité entre autres, étaient adorés par la paysannerie viking.

Cette particularité de la religion nordique est un exemple intéressant d'intégration culturelle. La guerre entre les <span class="strong">Ases</span> et les <span class="strong">Vanes</span> pourrait symboliser le fossé entre l'"aristocratie" et la paysannerie de l'époque.</p>
        </div>
    </section>
    <section class="godlist">
        <div class="godlist-container center">
        <?php while($god = $gods->fetch()) : ?> 
            <figure>
                <img src="<?= $god['image'] ?>" alt="" />
                <figcaption><a href="#"><?= $god['name'] ?></a></figcaption>
            </figure>
            <?php endwhile ?>
        </div>

    </section>
</main>