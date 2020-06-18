
<main>
    <h1 class="first-title">Contact</h1>
    <section class="contact">
        <!-- FORMULAIRE DE CONTACT -->
        <!-- the mail is send to my channel slack using  slack api -->
        <form class="contact-form" action="index.php" method="post" name="contact">
            <div class="form-group lato">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="name" required>
            </div>
            <div class="form-group lato">
                <label for="email">Mail</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group lato">
                <label for="message">Message</label>
                <textarea id="message" name="message" cols="30" rows="10"></textarea>
            </div>
            <div class="lato" id="erreur"></div>
            <button class="lato" id="submit" type="submit">Envoyer</button>
        </form>
    </section>
</main>
