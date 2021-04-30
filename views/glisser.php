<div class="container-fluid glisser">
    <link rel="stylesheet" href="assets/css/styleGames.css" />
    <div class="row forms">
        <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
            <div class="row">
                <form id="form" required>
                    <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10">
                        <label for="pet-select">Choisies un thème :</label>
                        <select class="form-control form-control-sm" name="theme" id="theme">
                            <option value="">--Sélectionnes un thème--</option>
                            <option value="0">Les fruits</option>
                            <option value="1">Les animaux de la ferme</option>
                            <option value="2">Les vêtements</option>
                            <option value="3">L'intérieur du frigo</option>
                            <option value="4">Les animaux de la mer</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label for="pet-select">Nombre d'objets différents :</label>
                            <select class="form-control form-control-sm" name="theme" id="itemNumber">
                                <option value="">--Sélectionnes un nombre--</option>
                                <option value="0">1</option>
                                <option value="1">2</option>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <label for="pet-select">Nombre maximum d'objets :</label>
                            <select class="form-control form-control-sm" name="theme" id="itemMax">
                                <option value="">--Sélectionnes un nombre maximum--</option>
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
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center button">
                            <!--   <button type="button" class="btn btn-info" name="button" id="buttonPlay"> Jouer
                                </button>
                                <button type="button" class="btn btn-warning" name="button" id="buttonDown"> Effacer
                                </button> -->

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9" id="gameRules">
        </div>
    </div>
    <div id="items">
        <img id="draggable1" class="fruit ui-widget-content" src="assets/img/pomme.png" alt="Une jolie pomme rouge">
        <div id="panier">
        </div>
    </div>
    <div class="table" id="table">
    </div>
</div>