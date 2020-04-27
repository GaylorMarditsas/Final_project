<?php 

?>

<main>
    <div class="login">
        <div class="login-container lato">
            <img src="app/public/images/picto/logo.png" alt="logo">
            <h1>Connexion à l'administation</h1>
            <form action="" method="post" name="login" id="login">
                <div class="login-group">
                    <label for="pseudo">Identifiant</label>
                    <input type="text" name="pseudo" placeholder="identifiant">
                </div>
                <div class="login-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="*********">
                </div>
                <div>
                    <button type="submit" name="submit">Valider</button>
                    <button><a href="index.php">Retour</a></button>
                </div>
                <?php if(isset($error) && !empty($_POST)){echo $error;} ?>
            </form>
        </div>

    </div>
</main>
</body>