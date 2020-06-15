<main>
    <section class="contact">
<!-- FORMULAIRE DE CONTACT -->
        <form class="contact-form center" action="/sites/projet" method="post" name="contact">
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
                <textarea id="message" name="message" id="" cols="30" rows="10"></textarea>
            </div>
                <div class="lato" id="erreur"></div>
                <button class="lato" id="submit" type="submit">Envoyer</button>
        </form>
    </section>
</main>
<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
<script src="app/public/js/index.js"></script>
</body>