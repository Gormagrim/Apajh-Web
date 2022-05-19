<div class="container-fluid">
  <?php if (count($_POST) == 0 || count($formErrors) > 0) { ?>
    <div class="row">
      <div class="offset-1 col-10 text-center">
        <h1>Formulaire de pré-admission</h1>
      </div>
    </div>
    <div class="row">
      <div class="offset-3 col-6">
        <form action="/webapp/public/formulaire-pre-admission" method="POST" id="admission">
          <div class="row">
            <div class="form-group col-12 offset-sm-1 col-sm-5">
              <label for="civilite" class="form-label">Civilité :</label>
              <select class="form-select" aria-label="Default select example" name="civilite" id="civilite">
                <option>-- Choisissez --</option>
                <option value="Madame">Madame</option>
                <option value="Monsieur">Monsieur</option>
                <option value="Autre">Autre</option>
              </select>
              <?php if (isset($formErrors['civilite'])) { ?>
                <div class="invalid-feedback">
                  <p><?= $formErrors['civilite'] ?></p>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-12 offset-sm-1 col-sm-5">
              <label for="nom" class="form-label">Nom :</label>
              <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre Nom">
              <?php if (isset($formErrors['nom'])) {
              ?>
                <div class="invalid-feedback">
                  <p><?= $formErrors['nom'] ?></p>
                </div>
              <?php } ?>
            </div>
            <div class="form-group col-12 offset-sm-1 col-sm-5">
              <label for="prenom" class="form-label">Prénom :</label>
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Votre Prénom">
              <?php if (isset($formErrors['prenom'])) {
              ?>
                <div class="invalid-feedback">
                  <p><?= $formErrors['prenom'] ?></p>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-12 offset-sm-1 col-sm-5">
              <label for="tel" class="form-label">Téléphone :</label>
              <input type="text" class="form-control" id="tel" name="tel" placeholder="Votre téléphone">
              <?php if (isset($formErrors['tel'])) {
              ?>
                <div class="invalid-feedback">
                  <p><?= $formErrors['tel'] ?></p>
                </div>
              <?php } ?>
            </div>
            <div class="form-group col-12 offset-sm-1 col-sm-5">
              <label for="mail" class="form-label">E-mail :</label>
              <input type="email" class="form-control" id="mail" name="mail" placeholder="Votre e-mail">
              <?php if (isset($formErrors['mail'])) {
              ?>
                <div class="invalid-feedback">
                  <p><?= $formErrors['mail'] ?></p>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-12 offset-sm-1 col-sm-5">
              <label for="you" class="form-label">Vous êtes :</label>
              <select class="form-select" aria-label="Default select example" name="you" id="you">
                <option>-- Choisissez --</option>
                <option value="La personne concernée">La personne concernée</option>
                <option value="Un parent, un ami">Un parent, un ami</option>
                <option value="Un professionnel">Un professionnel</option>
                <option value="Autre">Autre</option>
              </select>
              <?php if (isset($formErrors['you'])) {
              ?>
                <div class="invalid-feedback">
                  <p><?= $formErrors['you'] ?></p>
                </div>
              <?php } ?>
            </div>
            <div class="form-group col-12 offset-sm-1 col-sm-5">
              <label for="autre" class="form-label">Si autre :</label>
              <input type="text" class="form-control" id="autre" name="autre" placeholder="Précisez">
              <?php if (isset($formErrors['autre'])) {
              ?>
                <div class="invalid-feedback">
                  <p><?= $formErrors['autre'] ?></p>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group col-12 offset-sm-1 col-sm-5">
            <label for="objet" class="form-label">Objet de la demande :</label>
            <input type="text" class="form-control" id="objet" name="objet" placeholder="Votre demande">
            <?php if (isset($formErrors['objet'])) {
            ?>
              <div class="invalid-feedback">
                <p><?= $formErrors['objet'] ?></p>
              </div>
            <?php } ?>
          </div>
          <div class="row">
            <div class="form-group col-12 offset-sm-1 col-sm-10">
              <label for="message">Message :</label>
              <textarea class="form-control" aria-label="With textarea" name="message"></textarea>
              <?php if (isset($formErrors['message'])) {
              ?>
                <div class="invalid-feedback">
                  <p><?= $formErrors['message'] ?></p>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="row text-center">
            <div class="g-recaptcha col-12 offset-sm-1 col-sm-10" data-sitekey="6LflwJIbAAAAABhVIFArmDP74GiXzIkdMd8QerE7"></div>
          </div>

          <button type="submit" name="login" class="btn btn-primary connexionButton g-recaptcha" data-sitekey="site_key" data-callback='onSubmit' data-action='submit'>Envoyer</button>
        </form>
      </div>
    </div>
  <?php } else { ?>
    <div class="row">
      <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 connexion text-center">
        <p>Votre mail a bien été envoyé, et votre demande sera traitée dans les meilleurs délais.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <a href="/webapp/public/" class="btn btn-primary otherWord">Retour</a>
      </div>
    </div>

  <?php
  } ?>
</div>