<div class="container-fluid">
    <div class="row">
        <div class="offset-1 col-10 text-center">
            <div class="row">
                <div class="col-12">
                    <h1>Jeu de la langue des signes</h1>
                </div>
                <div class="col-12 difficultySelect">
                    <select class="catItem diffSelect" name="Category">
                        <option value="">--Choisis une difficulté--</option>
                        <option value="0">Facile</option>
                        <option value="1">Difficile</option>
                    </select>
                </div>
            </div>
            <span hidden class="difficulty"></span>
            <script>
                $(document).ready(function() {
                    $('.diffSelect').on('change', function(event) {
                        event.preventDefault();
                        $('.difficulty').empty()
                        var diff = $(this).val()
                        $('.difficulty').append(diff)
                        $('.difficulty').attr('data-value', diff)
                        if ($('.difficulty').attr('data-value') == '0') {
                            $('.gameDisplay').css('display', 'block')
                            $('.displayDifficulty').css('display', 'none')
                        } else {
                            $('.gameDisplay').css('display', 'none')
                            $('.displayDifficulty').css('display', 'block')
                        }
                    });
                });
                $(document).ready(function() {
                    const getvideos = async function(data) {
                        try {
                            let response = await fetch('https://www.api.apajh.jeseb.fr/public/v1/videos', {
                                method: 'GET',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                                }
                            })
                            if (response.ok) {
                                let responseGetVideos = await response.json()
                                console.log(responseGetVideos)

                                var catNumber = responseGetVideos.length
                                // fait apparaitre une vidéo aléatoire de la catégorie chosie
                                var min = 0;
                                var max = catNumber;
                                var aleaCat = Math.floor(Math.random() * max);
                                console.log(aleaCat)
                                $('span.value').attr('data-id', aleaCat)
                            } else {
                                console.error('Retour : ', response.status)
                            }
                        } catch (e) {
                            console.log(e)
                        }
                    }
                    getvideos()
                });
            </script>
            <div class="row">
                <div class="gameDisplay">
                    <div class="col-12 gameButton">
                        <button type="button" class="btn btn-primary play mt-5">Jouer</button>
                    </div>
                </div>
                <div class="displayDifficulty">
                    <div class="col-12 gameButtonDifficulty">
                        <button type="button" class="btn btn-primary playDifficulty mt-5">Jouer</button>
                    </div>
                </div>
            </div>
            <span hidden class="value"></span>
            <div class="row">
            <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 mt-5 scoreDiv">
                <div class="gamePlayed">Parties jouées :</div>
                <div class="gameWin">Parties gagnées :</div>
            </div>
                <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10 mt-5 jeuVideo">
                    <div class="row">
                        <div class="offset-1 col-10 offset-sm-2 col-sm-8">
                            <p class="explication"></p>
                            <div class="ratio ratio-16x9 videoView"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 offset-sm-2 col-sm-2 choice_0 choice"></div>
                        <div class="offset-1 col-10 offset-sm-0 col-sm-2 choice_1 choice"></div>
                        <div class="offset-1 col-10 offset-sm-0 col-sm-2 choice_2 choice"></div>
                        <div class="offset-1 col-10 offset-sm-0 col-sm-2 choice_3 choice"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modale du mode facile -->
    <div class="modal fade" id="easyModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">

                    <button type="button" class="btn-close closer" data-bs-dismiss="modal" aria-label="Close"><a href=""></a></button>
                </div>
                <div class="modal-body text-center">
                    <h2 class="bigg"></h2>
                    <div class="gifff"></div>
                </div>
                <div class="modal-footer">
                    <div class="gameInfo text-center"></div>
                    <a href="/jeu-auditif" type="button" class="btn btn-primary mt-5">Changer de catégorie ou de difficulté</a>
                    <button type="button" data-played="1" class="btn btn-primary play mt-5">Rejouer</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var played = 1
            $('.play').on('click', function(event) {
                event.preventDefault();

                $('#easyModal').modal('hide')
                $('#easyModal').attr('data-victory', 0)
                $('#easyModal').attr('data-answer', undefined)
                $('.choice_0').empty()
                $('.choice_1').empty()
                $('.choice_2').empty()
                $('.choice_3').empty()
                $('.choice_0').css('display', 'block')
                $('.choice_1').css('display', 'block')
                $('.choice_2').css('display', 'block')
                $('.choice_3').css('display', 'block')
                $('.gameDisplay').css('display', 'none')
                $('.difficultySelect').css('display', 'none')
                const reGetVideoByCatEasy = async function(data) {
                    try {
                        let response = undefined
                        response = await fetch('https://www.api.apajh.jeseb.fr/public/v1/videos-cat', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(data)
                        })
                        if (response.ok) {
                            <?php
                            if (!empty($_SESSION['token'])) {
                            ?>
                                const PartieJoue = async function(data) {
                                    try {
                                        let responseP = await fetch('https://www.api.apajh.jeseb.fr/public/v1/lsfplay', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                            },
                                            body: JSON.stringify(data)
                                        })
                                        if (responseP.ok) {
                                            let responsePlay = await responseP.json()
                                        } else {
                                            console.error('Retour : ', responseP.status)
                                        }
                                    } catch (e) {
                                        console.log(e)
                                    }
                                }
                                PartieJoue({
                                    difficulty: $('span.difficulty').attr('data-value')
                                })
                                const myScore = async function(data) {
                                    try {
                                        let response = await fetch('https://www.api.apajh.jeseb.fr/public/v1/mylsfscore', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                            },
                                            body: JSON.stringify(data)
                                        })
                                        if (response.ok) {
                                            let responseMyScore = await response.json()
                                            console.log(responseMyScore)
                                            $('.gamePlayed').html('Partie jouées :<br />' + responseMyScore[0].trials)
                                            $('.gameWin').html('Partie gagnées :<br />' + responseMyScore[0].victory)
                                        } else {
                                            console.error('Retour : ', response.status)
                                        }
                                    } catch (e) {
                                        console.log(e)
                                    }
                                }
                                myScore({
                                    difficulty: $('.difficulty').attr('data-value')
                                })
                            <?php } ?>
                            let responseDataCatId = undefined
                            responseDataCatId = await response.json()

                            console.log(responseDataCatId)
                            var videoNumber = responseDataCatId.length
                            // fait apparaitre une vidéo aléatoire de la catégorie chosie
                            var min = 1;
                            var max = videoNumber;
                            var alea = Math.floor(Math.random() * max);
                            $('#easyModal').attr('data-answer', responseDataCatId[alea].videoTitle)
                            var answer = responseDataCatId[alea].videoTitle
                            var x = -1;
                            arrayTest = []
                            while (x < videoNumber - 1) {
                                x++;
                                arrayTest.push(x)
                            }
                            arrayTest.splice(alea, 1)
                            $('.explication').empty()
                            $('.videoView').empty()
                            $('.explication').append('Sélectionne le bon mot, correspondant à la vidéo.')
                            $('.videoView').append('<video id="ldsVideo" class="ldsVideo" contextmenu="return false;" oncontextmenu="return false;" controls muted autoplay loop><source src="https://www.api.apajh.jeseb.fr/public' +
                                responseDataCatId[alea].videoLink + '" type="video/mp4"></video>')
                            // position des mots
                            var choiceTab = [0, 1, 2, 3]
                            var choice = 3
                            // position aléatoire du bon mot
                            var aleaPos = Math.floor(Math.random() * choice)
                            // fais apparaitre le bon mot a une position aléatoire
                            $('.choice_' + aleaPos).append(responseDataCatId[alea].videoTitle)
                            $('.choice_' + aleaPos).attr('data-answer', responseDataCatId[alea].videoTitle)
                            // retire la position du bon mot du tableau de position
                            choiceTab.splice(aleaPos, 1)
                            // créé 3 nombres aléatoires pour les mauvais mots
                            //nombre aléatoire 1 et sa position
                            var randomIndex = Math.floor(Math.random() * arrayTest.length);
                            var alea_2 = arrayTest[randomIndex];
                            if (alea > alea_2) {
                                arrayTest.splice(alea_2, 1)
                            } else {
                                arrayTest.splice(alea_2 - 1, 1)
                            }
                            var randomPos = Math.floor(Math.random() * choiceTab.length);
                            var aleaPos_2 = choiceTab[randomPos]
                            if (aleaPos > aleaPos_2) {
                                choiceTab.splice(aleaPos_2, 1)
                            } else {
                                choiceTab.splice(aleaPos_2 - 1, 1)
                            }
                            $('.choice_' + aleaPos_2).append(responseDataCatId[alea_2].videoTitle)
                            $('.choice_' + aleaPos_2).attr('data-answer', responseDataCatId[alea_2].videoTitle)
                            var randomIndex_2 = Math.floor(Math.random() * arrayTest.length);
                            var alea_3 = arrayTest[randomIndex_2];
                            if (alea > alea_3 && alea_2 > alea_3) {
                                arrayTest.splice(alea_3, 1)
                            } else if (alea > alea_3 || alea_2 > alea_3) {
                                arrayTest.splice(alea_3 - 1, 1)
                            } else {
                                arrayTest.splice(alea_3 - 2, 1)
                            }
                            var randomPos_2 = Math.floor(Math.random() * choiceTab.length);
                            var aleaPos_3 = choiceTab[randomPos_2]
                            $('.choice_' + aleaPos_3).append(responseDataCatId[alea_3].videoTitle)
                            $('.choice_' + aleaPos_3).attr('data-answer', responseDataCatId[alea_3].videoTitle)
                            if (aleaPos > aleaPos_3 && aleaPos_2 > aleaPos_3) {
                                choiceTab.splice(aleaPos_3, 1)
                            } else if (aleaPos > aleaPos_3 || aleaPos_2 > aleaPos_3) {
                                choiceTab.splice(aleaPos_3 - 1, 1)
                            } else {
                                choiceTab.splice(aleaPos_3 - 2, 1)
                            }
                            var randomPos_3 = Math.floor(Math.random() * choiceTab.length);
                            var aleaPos_4 = choiceTab[randomPos_3]
                            var randomIndex_3 = Math.floor(Math.random() * arrayTest.length);
                            var alea_4 = arrayTest[randomIndex_3];
                            $('.choice_' + aleaPos_4).append(responseDataCatId[alea_4].videoTitle)
                            $('.choice_' + aleaPos_4).attr('data-answer', responseDataCatId[alea_4].videoTitle)

                            $('.choice').on('click', function(event) {
                                event.preventDefault();
                                played++
                                $('.play').attr('data-played', played)
                                $('#easyModal').modal('show')
                                if ($('.play').attr('data-played') == 16) {
                                    $('.play').attr('hidden', 'hidden')
                                    $('.gameInfo').html('Vous devez changer de catégorie tous les 5 mots !')
                                }
                                if ($(this).attr('data-answer') == answer) {
                                    $('#easyModal').attr('data-victory', 1)
                                    console.log($('#easyModal').attr('data-answer'))
                                    $('.gifff').empty()
                                    $('.bigg').empty()
                                    $('.bigg').append('Bravo ! Le bon mot était bien "' + answer + '"')
                                    $('.gifff').append('<img class="win" src="assets/imgGames/gagne.gif" alt="Gagné ! En langue des signes">')
                                    if ($('#easyModal').attr('data-victory') == 1) {
                                        <?php
                                        if (!empty($_SESSION['token'])) {
                                        ?>
                                            victory()
                                        <?php } ?>
                                    }
                                } else {
                                    $('.gifff').empty()
                                    $('.bigg').empty()
                                    $('.bigg').append('Dommage, le bon mot était "' + answer + '"')
                                    $('.gifff').append('<img class="loose" src="assets/imgGames/perdu.gif" alt="Perdu ! En langue des signes">')
                                }

                            });
                            //   $('.choice_' + aleaPos_2 || '.choice_' + aleaPos_3 || '.choice_' + aleaPos_4).on('click', function(event) {
                            //       event.preventDefault();
                            //       $('#easyModal').modal('show')
                            //       $('.gifff').empty()
                            //       $('.bigg').empty()
                            //       $('.bigg').append('Dommage, le bon mot était "' + answer + '"')
                            //       $('.gifff').append('<img class="loose" src="assets/imgGames/perdu.gif" alt="Perdu ! En langue des signes">')
                            //   });

                            function victory() {
                                const PartieGagne = async function(data) {
                                    try {
                                        let responseP = await fetch('https://www.api.apajh.jeseb.fr/public/v1/lsfvictory', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                            },
                                            body: JSON.stringify(data)
                                        })
                                        if (responseP.ok) {
                                            let responseGetVideos = await responseP.json()
                                        } else {
                                            console.error('Retour : ', responseP.status)
                                        }
                                    } catch (e) {
                                        console.log(e)
                                    }
                                }
                                PartieGagne({
                                    difficulty: $('.difficulty').attr('data-value')
                                })
                            }
                        } else {
                            console.error('Retour : ', response.status)
                        }
                    } catch (e) {
                        console.log(e)
                    }
                }
                reGetVideoByCatEasy({
                    id_category: $('span.value').attr('data-id')
                })
            });
        });
    </script>
    <!-- Modale de victoire Hard -->
    <div class="modal fade" id="HardModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">

                    <button type="button" class="btn-close closer" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h2 class="big"></h2>
                    <div class="giff"></div>
                </div>
                <div class="modal-footer">
                    <a href="/jeu-auditif" type="button" class="btn btn-primary mt-5">Changer de catégorie ou de difficulté</a>
                    <button type="button" class="btn btn-primary playDifficulty mt-5">Rejouer</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var played = 1
            $('.playDifficulty').on('click', function(event) {
                event.preventDefault();
                $('#HardModal').modal('hide')
                $('.choice_0').empty()
                $('.choice_1').empty()
                $('.choice_2').empty()
                $('.choice_3').empty()
                $('.choice_0').css('display', 'block')
                $('.choice_1').css('display', 'block')
                $('.choice_2').css('display', 'block')
                $('.choice_3').css('display', 'block')
                $('.gameButtonDifficulty').css('display', 'none')
                $('.difficultySelect').css('display', 'none')
                const getVideoByCatHard = async function(data) {
                    try {
                        let response = await fetch('https://www.api.apajh.jeseb.fr/public/v1/allvideo', {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })
                        if (response.ok) {
                            <?php
                            if (!empty($_SESSION['token'])) {
                            ?>
                                const PartieJoue = async function(data) {
                                    try {
                                        let responseP = await fetch('https://www.api.apajh.jeseb.fr/public/v1/lsfplay', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                            },
                                            body: JSON.stringify(data)
                                        })
                                        if (responseP.ok) {
                                            let responsePlay = await responseP.json()
                                        } else {
                                            console.error('Retour : ', responseP.status)
                                        }
                                    } catch (e) {
                                        console.log(e)
                                    }
                                }
                                PartieJoue({
                                    difficulty: $('span.difficulty').attr('data-value')
                                })
                                const myScore = async function(data) {
                                    try {
                                        let response = await fetch('https://www.api.apajh.jeseb.fr/public/v1/mylsfscore', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                            },
                                            body: JSON.stringify(data)
                                        })
                                        if (response.ok) {
                                            let responseMyScore = await response.json()
                                            console.log(responseMyScore)
                                            $('.gamePlayed').html('Partie jouées :<br />' + responseMyScore[0].trials)
                                            $('.gameWin').html('Partie gagnées :<br />' + responseMyScore[0].victory)
                                        } else {
                                            console.error('Retour : ', response.status)
                                        }
                                    } catch (e) {
                                        console.log(e)
                                    }
                                }
                                myScore({
                                    difficulty: $('.difficulty').attr('data-value')
                                })
                            <?php } ?>
                            let responseVideo = await response.json()
                            var allVideoNumber = responseVideo.length
                            var min = 1;
                            var max = allVideoNumber;
                            var alea = Math.floor(Math.random() * max);
                            $('#HardModal').attr('data-answer', responseVideo[alea].video[0].videoTitle)
                            var hardAnswer = responseVideo[alea].video[0].videoTitle
                            var x = -1;
                            arrayTest = []
                            while (x < allVideoNumber - 1) {
                                x++;
                                arrayTest.push(x)
                            }
                            arrayTest.splice(alea, 1)

                            $('.explication').empty()
                            $('.videoView').empty()
                            $('.explication').append('Sélectionne le bon mot, correspondant à la vidéo.')
                            $('.videoView').append('<video id="ldsVideo" class="ldsVideo" contextmenu="return false;" oncontextmenu="return false;" controls muted autoplay loop><source src="https://www.api.apajh.jeseb.fr/public' +
                                responseVideo[alea].video[0].videoLink + '" type="video/mp4"></video>')
                            // position des mots
                            var choiceTab = [0, 1, 2, 3]
                            var choice = 3
                            // position aléatoire du bon mot
                            var aleaPoss = Math.floor(Math.random() * choice)
                            // fais apparaitre le bon mot a une position aléatoire
                            $('.choice_' + aleaPoss).append(responseVideo[alea].video[0].videoTitle)
                            $('.choice_' + aleaPoss).attr('data-answer', responseVideo[alea].video[0].videoTitle)
                            choiceTab.splice(aleaPoss, 1)
                            // créé 3 nombres aléatoires pour les mauvais mots
                            //nombre aléatoire 1 et sa position
                            var randomIndex = Math.floor(Math.random() * arrayTest.length);
                            var alea_2 = arrayTest[randomIndex];
                            if (alea > alea_2) {
                                arrayTest.splice(alea_2, 1)
                            } else {
                                arrayTest.splice(alea_2 - 1, 1)
                            }
                            var randomPos = Math.floor(Math.random() * choiceTab.length);
                            var aleaPoss_2 = choiceTab[randomPos]
                            if (aleaPoss > aleaPoss_2) {
                                choiceTab.splice(aleaPoss_2, 1)
                            } else {
                                choiceTab.splice(aleaPoss_2 - 1, 1)
                            }
                            $('.choice_' + aleaPoss_2).append(responseVideo[alea_2].video[0].videoTitle)
                            $('.choice_' + aleaPoss_2).attr('data-answer', responseVideo[alea_2].video[0].videoTitle)
                            var randomIndex_2 = Math.floor(Math.random() * arrayTest.length);
                            var alea_3 = arrayTest[randomIndex_2];
                            if (alea > alea_3 && alea_2 > alea_3) {
                                arrayTest.splice(alea_3, 1)
                            } else if (alea > alea_3 || alea_2 > alea_3) {
                                arrayTest.splice(alea_3 - 1, 1)
                            } else {
                                arrayTest.splice(alea_3 - 2, 1)
                            }
                            var randomPos_2 = Math.floor(Math.random() * choiceTab.length);
                            var aleaPoss_3 = choiceTab[randomPos_2]
                            $('.choice_' + aleaPoss_3).append(responseVideo[alea_3].video[0].videoTitle)
                            $('.choice_' + aleaPoss_3).attr('data-answer', responseVideo[alea_3].video[0].videoTitle)
                            if (aleaPoss > aleaPoss_3 && aleaPoss_2 > aleaPoss_3) {
                                choiceTab.splice(aleaPoss_3, 1)
                            } else if (aleaPoss > aleaPoss_3 || aleaPoss_2 > aleaPoss_3) {
                                choiceTab.splice(aleaPoss_3 - 1, 1)
                            } else {
                                choiceTab.splice(aleaPoss_3 - 2, 1)
                            }
                            var randomPos_3 = Math.floor(Math.random() * choiceTab.length);
                            var aleaPoss_4 = choiceTab[randomPos_3]
                            var randomIndex_3 = Math.floor(Math.random() * arrayTest.length);
                            var alea_4 = arrayTest[randomIndex_3];
                            $('.choice_' + aleaPoss_4).append(responseVideo[alea_4].video[0].videoTitle)
                            $('.choice_' + aleaPoss_4).attr('data-answer', responseVideo[alea_4].video[0].videoTitle)
                            $('.choice').on('click', function(event) {
                                event.preventDefault();
                                played++
                                $('.playDifficulty').attr('data-played', played)
                                $('#HardModal').modal('show')
                                if ($('.playDifficulty').attr('data-played') == 16) {
                                    $('.playDifficulty').attr('hidden', 'hidden')
                                    $('.gameInfo').html('Vous devez changer de catégorie tous les 5 mots !')
                                }
                                if ($(this).attr('data-answer') == hardAnswer) {
                                    $('#HardModal').attr('data-victory', 1)
                                    console.log($('#HardModal').attr('data-answer'))
                                    $('.giff').empty()
                                    $('.big').empty()
                                    $('.big').append('Bravo ! Le bon mot était bien "' + hardAnswer + '"')
                                    $('.giff').append('<img class="win" src="assets/imgGames/gagne.gif" alt="Gagné ! En langue des signes">')
                                    if ($('#HardModal').attr('data-victory') == 1) {
                                        <?php
                                        if (!empty($_SESSION['token'])) {
                                        ?>
                                            victory()
                                        <?php } ?>
                                    }
                                } else {
                                    $('.giff').empty()
                                    $('.big').empty()
                                    $('.big').append('Dommage, le bon mot était "' + hardAnswer + '"')
                                    $('.giff').append('<img class="loose" src="assets/imgGames/perdu.gif" alt="Perdu ! En langue des signes">')
                                }
                            });

                            function victory() {
                                const PartieGagne = async function(data) {
                                    try {
                                        let responseP = await fetch('https://www.api.apajh.jeseb.fr/public/v1/lsfvictory', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                            },
                                            body: JSON.stringify(data)
                                        })
                                        if (responseP.ok) {
                                            let responseGetVideos = await responseP.json()
                                        } else {
                                            console.error('Retour : ', responseP.status)
                                        }
                                    } catch (e) {
                                        console.log(e)
                                    }
                                }
                                PartieGagne({
                                    difficulty: $('.difficulty').attr('data-value')
                                })
                            }
                        } else {
                            console.error('Retour : ', response.status)
                        }
                    } catch (e) {
                        console.log(e)
                    }
                }
                getVideoByCatHard({
                    id_category: $('span.value').attr('data-id')
                })

            });
        });
        $(document).on('click', '.closer', function(event) {
            event.preventDefault();
            window.location.reload();
        })
    </script>
    <!-- fin du container fluid -->
</div>