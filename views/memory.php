<div class="container-fluid">
    <link rel="stylesheet" href="assets/css/styleMemory.css" />

    <body id="body" onload="init()">
        <div class="row">
            <div class="col-12 col-sm-4 text-center mb-2">
                <button type="button" data-bs-toggle="modal" data-bs-target="#regles" onclick="clicOuvrirAide()" class="btn btn-primary" name="button" id="buttonPlay">Règles du jeu</button>
            </div>
            <div class="col-12 col-sm-4 text-center mb-2">
                <button type="button" onmouseover="swapImage(this, 'btnPartieON.jpg')" onmouseout="swapImage(this, 'btnPartieOFF.jpg')" onclick="clicNouvellePartie()" class="btn btn-primary newGame" name="button" id="buttonPlay">Nouvelle partie</button>
            </div>
            <div class="col-12 col-sm-4 text-center mb-2">
                <button data-bs-toggle="modal" data-bs-target="#scoreModal" class="btn btn-primary scores">Scores</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4 text-center mb-2">
                <p class="radio">
                    <input class="new16" type="radio" name="nombre" onclick="clicNouvellePartie(16)" /> Normal
                </p>
            </div>
            <div class="col-12 col-sm-4 text-center mb-2">
                <p class="radio">
                    <input class="new32" id="radio" type="radio" name="nombre" onclick="clicNouvellePartie(32)" />
                    Intermèdiaire
                </p>
            </div>
            <div class="col-12 col-sm-4 text-center mb-2">
                <p class="radio">
                    <input class="new54" type="radio" name="nombre" onclick="clicNouvellePartie(54)" />
                    Difficile
                </p>
            </div>
        </div>
        <div class="row mb-4">
            <div class="offset-1 col-10 entete">
                <div id="console">
                    Nouvelle Partie
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-10 offset-sm-0 col-sm-1" id="controles">
                <div class="row text-center mb-2">
                    <div class="col-12">
                    </div>
                </div>
                <div class="row text-center mb-2">
                    <div class="col-12">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12">



                        <div class="Gtime left">
                            Temps :
                            <div class="timer"></div>
                            <div class="offset-1 col-10" id="score">
                                Il reste 8 paires à découvrir
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-1 col-10 offset-sm-0 col-sm-10 plan">
                <div id="plan">
                    <div class="fondTapis clic">
                        <div id="jeu">

                        </div>
                        <div class="Gtime bas">
                            Temps :
                            <div class="timer mb-2"></div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php
        if (empty($_SESSION['token'])) { ?>
            <div class="text-center">
                <h2>Vous devez vous connecter pour que votre score soit enregistré !</h2>
            </div>
        <?php } ?>

        <input type="hidden" class="sat" data-play="0" data-difficulty="2">
        <script>
            $(document).ready(function() {
                var i = 0;
                var isPause = false

                function globalTime() {
                    var a = setInterval(timer, 100)

                    function timer() {
                        i++;
                        $('.timer').html('<span class="sec">' + (i / 10).toFixed(1) + '</span> secondes');
                        if (isPause == true) {
                            clearTimeout(a);
                        }
                        if ($('.sat').attr('data-play') == 1) {
                            clearTimeout(a);
                            $('.score').attr('data-time', i / 10)
                            const postScore = async function(data) {
                                try {
                                    let response = await fetch('https://www.api.apajh.jeseb.fr/public/v1/memoryScore', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                        },
                                        body: JSON.stringify(data)
                                    })
                                    if (response.ok) {
                                        let responseData = await response.json()
                                    } else {
                                        console.error('Retour : ', response.status)
                                    }
                                } catch (e) {
                                    console.log(e)
                                }
                            }
                            postScore({
                                score: $('.score').attr('data-score'),
                                time: $('.score').attr('data-time'),
                                difficulty: $('.sat').attr('data-difficulty')
                            })
                        }
                    }
                    $('.newGame').on('click', function() {
                        location.reload()
                    });
                    $('.new16').on('click', function() {
                        $('.score').attr('data-difficulty', 1)
                    });
                    $('.new32').on('click', function() {
                        $('.score').attr('data-difficulty', 2)
                    });
                    $('.new54').on('click', function() {
                        $('.score').attr('data-difficulty', 3)
                    });
                }

                var blockClic = false
                $('.clic').on('click', function(e) {
                    e.stopPropagation();
                    if (blockClic == false) {
                        $('.fondTapis').removeClass('clic')
                        if (isPause == false) {
                            blockClic = true
                            globalTime()
                        }
                    }
                });
            })
        </script>
        <input type="hidden" class="hiddenDifficulty" value="">
    </body>
    <!-- Modale de régle du jeu -->
    <div class="modal fade" id="regles" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>Règles du jeu</h2>
                    <p>Clic sur les cartes pour les retourner et les voir :</p>
                    <p>Si vous dévoilez une Paire, les cartes sont retirées du jeu</p>
                    <p>Sinon elle sont à nouveau cachées</p>
                    <p>Les Paires sont toutes affichées à la fin, là où elles ont été trouvées.</p>
                    <p>Le score donne le nombre moyen de Clics par Paire dévoilée.</p>
                    <p>2 Clics par Paire, c'est parfait !</p>
                    <p>Moins de 4 Clics par Paire, c'est bon . . .</p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- Modale de score -->
    <div class="modal fade" id="scoreModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content text-center">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="mb-4">Top 5 des joueurs :</h2>
                    <select class="catItem diffi" name="Category">
                        <option value="1">Normal</option>
                        <option value="2">Intermèdiaire</option>
                        <option value="3">Difficile</option>
                    </select>
                    <script>
                        $('.diffi').on('change', function(e) {
                            e.preventDefault();
                            $('.topFive').empty()
                            const getMemoryScore = async function(data) {
                                $('.diffi').attr('value', $('.diffi').val())
                                var difficulty = $('.diffi').val()
                                try {
                                    let response = await fetch('https://www.api.apajh.jeseb.fr/public/v1/memoryScores', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify(data)
                                    })
                                    if (response.ok) {
                                        let responseGetScore = await response.json()
                                        console.log(responseGetScore)
                                        var count = 1
                                        for (var resp in responseGetScore) {
                                            console.log(count)
                                            var name = (responseGetScore[resp].user_description == null ? responseGetScore[resp].user[0].mail : (responseGetScore[resp].user_description.firstname + ' ' +
                                                responseGetScore[resp].user_description.lastname))
                                            var topFive = '<div class="row mb-2"><div class="col-2">' + count++ + '</div> <div class="col-4">' +
                                                name + '</div> <div class="col-3">' + responseGetScore[resp].time + '</div> <div class="col-3">' + responseGetScore[resp].score + '</div></div>'
                                            $('.topFive').append(topFive)
                                        }
                                    } else {
                                        console.error('Retour : ', response.status)
                                    }
                                } catch (e) {
                                    console.log(e)
                                }
                            }
                            getMemoryScore({
                                difficulty: $(this).attr('value')
                            })
                        });
                    </script>
                    <div class="row mb-2">
                        <div class="col-2">Position</div>
                        <div class="col-4">Joueur</div>
                        <div class="col-3">Temps (secondes)</div>
                        <div class="col-3">Clics / paires</div>
                    </div>
                    <div class="topFive"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn modalBtn" id="modalBtn"><a href="">Rejouer</a></button>
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
</div>