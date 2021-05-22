<div class="container-fluid glisser">
    <link rel="stylesheet" href="assets/css/styleGames.css" />
    <div class="row forms">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="row text-center">
                <form id="form" required>
                    <div class="offset-3 col-6 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 theme mb-4">
                        <select class="form-select form-select-lg catItem" name="theme" id="theme">
                            <option value="">--Sélectionnes un thème--</option>
                            <option value="0">Les fruits</option>
                            <option value="1">Les animaux de la ferme</option>
                            <option value="2">Les vêtements</option>
                            <option value="3">L'intérieur du frigo</option>
                            <option value="4">Les animaux de la mer</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="offset-3 col-6 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 objectNumber mb-4">
                            <select class="form-select form-select-lg catItem" name="theme" id="itemNumber">
                                <option value="">--Sélectionnes un nombre d'objets--</option>
                                <option value="0">1</option>
                                <option value="1">2</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-3 col-6 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 maxObject mb-4">
                            <select class="form-select form-select-lg catItem" name="theme" id="itemMax">
                                <option value="">--Sélectionnes un nombre maximum d'objets--</option>
                                <option value="0">1</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                                <option value="5">6</option>
                                <option value="6">7</option>
                                <option value="7">8</option>
                                <option value="8">9</option>
                                <option value="9">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center" id="gameRules">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center button">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <img id="draggable1" class="fruit ui-widget-content" src="assets/img/pomme.png" alt="Une jolie pomme rouge">
    <div class="row">
        <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 text-center connexion">
            <div class="row text-center">
                <div id="panier" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 items text-center">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 table text-center" id="table">
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Modale de victoire -->
<div class="modal fade" id="winModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <h2 class="bigWin">C'est gagné !<img class="speakerWin" src="assets/imgGames/speaker.png" alt="Un speaker qui parle"></h2>
                <img class="win" src="assets/imgGames/gagne.gif" alt="Gagné ! En langue des signes">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn modalBtn" id="modalBtn"><a href="">Rejouer</a></button>
            </div>
        </div>
    </div>
</div>
<!-- Modale de défaite -->
<div class="modal fade" id="looseModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <h2 class="bigLoose"></h2>
                <img class="loose" src="assets/imgGames/perdu.gif" alt="Gagné ! En langue des signes">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn modalBtn" id="modalBtn"><a href="">Rejouer</a></button>
            </div>
        </div>
    </div>
</div>