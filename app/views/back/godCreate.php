<main>
    <h1 class="admin-title lato">Créer un Dieu</h1>
    <section class="godback">
<!-- GESTION DE L'AJOUT DE DIEU -->
        <form class="backform lato" enctype="multipart/form-data" action="indexBack.php?action=create" method="post" name="create-god">
            <div>
                <label>Nom</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>Description</label>
                <textarea name="description" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label>Contenu</label>
                <textarea name="content" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label>Image</label>
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                <input type="file" name="image">
            </div>
            <div id="erreur"></div>
            <div>
                <button type="submit" name="submit" value="Valider">Valider</button>
            </div>
        </form>
    </section>
</main>
<script src="app/public/js/index.js"></script>
</body>
</html>