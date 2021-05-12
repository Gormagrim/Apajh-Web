$(function () {
    $("#draggable1").draggable({ revert: true, helper: "clone" });
    // Je rends draggable les items qui auront l'id draggable1
});
if ($('.items').val() == "") { // condition qui me permet de faire apparaitre mon boutton jouer
    $('.button').html('<button type="button" class="btn btn-primary" name="button" id="buttonPlay"> Jouer</button>');
}
$(function () {
    // je crée un tableau contenant tout les items pour chaque séries, et un second tableau dans un ordre différent, jamais un même objet à la même position
    var fruits = ['pomme', 'orange', 'banane', 'poire', 'ananas'];
    var secondFruits = ['ananas', 'poire', 'orange', 'banane', 'pomme'];
    var animals = ['vache', 'mouton', 'cochon', 'poule', 'cheval'];
    var secondAnimals = ['cheval', 'poule', 'mouton', 'cochon', 'vache'];
    var clothing = ['culotte', 't-shirt', 'pull', 'chaussette', 'pantalon'];
    var secondClothing = ['pantalon', 'chaussette', 't-shirt', 'pull', 'culotte'];
    var fridge = ['yahourt', 'beurre', 'lait', 'jus d\'oranges', 'tomate'];
    var secondFridge = ['tomate', 'jus d\'oranges', 'beurre', 'lait', 'yahourt'];
    var seaAnimals = ['crabe', 'poisson', 'pieuvre', 'tortue', 'étoile de mer'];
    var secondSeaAnimals = ['étoile de mer', 'tortue', 'poisson', 'pieuvre', 'crabe'];
    // je crée un tableau contenant tout les tableaux créé au dessus, et un second tableau contenant les secondes versions des tableaux
    var firstItemArray = [fruits, animals, clothing, fridge, seaAnimals];
    var secondItemArray = [secondFruits, secondAnimals, secondClothing, secondFridge, secondSeaAnimals];
    var alea = Math.floor(Math.random() * 5); // je crée une variable contenant un nombre aléatoire entre 0 et 4
    var count = 0; // j'initialise le premier compteur à 0
    var secondCount = 0; // j'initialise le second compteur à 0
    var victoryCount = 0; // j'initialise le compteur de victoire à 0 (pour plus tard)
    $('#buttonPlay').click(function () { // fonction au clic de #buttonPlay
        // je fais apparaitre le boutton rejouer et sa fonction reload
        $('.button').html('<button type="button" class="btn btn-secondary btn-sm" name="button" id="buttonReplay"> Rejouer</button>');
        $('.theme').css('display', 'none');
        $('.objectNumber').css('display', 'none');
        $('.maxObject').css('display', 'none');
        $(function () {
            $('#buttonReplay').click(function () {
                location.reload();
            });
        });
        var max = +$('#itemMax').val() + 1; // variable contenant la valeur du select nombre d'objets maximum
        var number = Math.floor((Math.random() * max) + 1); // crée un nombre aléatoire entre 1 et var max
        var secondNumber = Math.floor((Math.random() * max) + 1); // cré un second nombre aléatoire entre 1 et var max
        console.log(number);
        console.log(max);
        var select = $('#theme').val(); // variable contenant la valeur du select théme 0 pour fruit, 1 pour animaux de la ferme, ...
        var selectedFirstItem = firstItemArray[select]; // selection du premier tableau : valeur select du tableau de tableau
        var selectedSecondItem = secondItemArray[select]; // selection du second tableau : valeur select du second tableau de tableau
        var selectedFirstIvtemAlea = selectedFirstItem[alea]; // selection du premier item : valeur aléa du premier tableau
        var selectedSecondItemAlea = selectedSecondItem[alea]; // selection du second item : valeur alea du second tableau
        var goal = ['table', 'prairie', 'valise', 'frigo', 'eau']; // variable qui stocke les valeurs des draggables
        var itemNumber = $('#itemNumber').val(); // variable contenant la valeur du select nombre d'objets différents (1 ou 2)
        if (itemNumber == 0) { // régle si 1 objet
            $('#gameRules').append('<h2>' + (goal[select] == 'table' ? 'Pose ' : (goal[select] == 'prairie' ? 'Pose ' : (goal[select] == 'valise' ? 'Pose ' : (goal[select] == 'frigo' ? 'Pose ' : (goal[select] == 'eau' ? 'Pose ' : ''))))) + number + ' ' + (selectedFirstIvtemAlea == 'cheval' && number > 1 ? 'chevaux' : (selectedFirstIvtemAlea == 'étoile de mer' && number > 1 ? 'étoiles de mer' : selectedFirstIvtemAlea)) + (number == '1' || selectedFirstIvtemAlea == 'ananas' || selectedFirstIvtemAlea == 'cheval' || selectedFirstIvtemAlea == 'jus d\'oranges' || selectedFirstIvtemAlea == 'étoile de mer' ? '' : 's ') + (goal[select] == 'table' ? ' sur la table' : (goal[select] == 'prairie' ? ' dans la prairie' : (goal[select] == 'valise' ? ' dans la valise' : (goal[select] == 'frigo' ? ' dans le frigidaire' : (goal[select] == 'eau' ? ' dans la mer' : ''))))) + '  <img class="speaker" src="assets/imgGames/speaker.png" alt="Un speaker qui parle"></h2>');
            $('.speaker').click(function () { // lecture vocal au clic
                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/' + goal[select] + '.mp3" autoplay></audio>'); }, 0);
                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/' + (selectedFirstIvtemAlea == 'banane' && number == 1 || selectedFirstIvtemAlea == 'orange' && number == 1 || selectedFirstIvtemAlea == 'pomme' && number == 1 || selectedFirstIvtemAlea == 'poire' && number == 1 || selectedFirstIvtemAlea == 'vache' && number == 1 || selectedFirstIvtemAlea == 'poule' && number == 1 || selectedFirstIvtemAlea == 'chaussette' && number == 1 || selectedFirstIvtemAlea == 'culotte' && number == 1 ? 'une' : number) + '.mp3" autoplay></audio>'); }, 2900);
                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/' + (selectedFirstIvtemAlea == 'orange' && number > 1 ? 'zorange' : (selectedFirstIvtemAlea == 'ananas' && number > 1 ? 'zananas' : (selectedFirstIvtemAlea == 'cheval' && number > 1 ? 'chevaux' : selectedFirstIvtemAlea))) + '.mp3" autoplay></audio>'); }, 3500);
            });
            if (select == 0) { // si le select thème = 0 c'est les fruits
                var x = 1;
                while (x < 2) { // boucle while qui fait apparaitre 10 fruits de chaque comme clonne de l'objet invisible # draggable 1. .draggable({ revert: "invalid" }) permet de faire revenir les objets si ils ne sont pas draggable
                    $('#draggable1').clone().prop('id', 'pomme').prop('class', 'pomme fruits img-fluid').prop('alt', 'une jolie pomme').attr('src', 'assets/imgGames/pomme.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'orange').prop('class', 'orange fruits img-fluid').prop('alt', 'une jolie orange').attr('src', 'assets/imgGames/orange.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'banane').prop('class', 'banane fruits img-fluid').prop('alt', 'une jolie banane').attr('src', 'assets/imgGames/banane.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'poire').prop('class', 'poire fruits img-fluid').prop('alt', 'une jolie poire').attr('src', 'assets/imgGames/poire.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'ananas').prop('class', 'ananas fruits img-fluid').prop('alt', 'un joli ananas').attr('src', 'assets/imgGames/ananas.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                // fait apparaite l'image de la table dans la div # table
                $('#table').append("<img class='img-fluid' src='assets/imgGames/table.png' alt='La table ou l'on pose les fruits' />")
            } else if (select == 1) { // si le select thème = 1 les annimaux de la ferme..... même chose qu'au dessus
                var x = 1;
                while (x < 2) {
                    $('#draggable1').clone().prop('id', 'vache').prop('class', 'vache animals img-fluid').prop('alt', 'une jolie vache').attr('src', 'assets/imgGames/vache.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'mouton').prop('class', 'mouton animals img-fluid').prop('alt', 'un joli mouton').attr('src', 'assets/imgGames/mouton.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'cochon').prop('class', 'cochon animals img-fluid').prop('alt', 'un petit cochon').attr('src', 'assets/imgGames/cochon.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'poule').prop('class', 'poule animals img-fluid').prop('alt', 'une petite poule').attr('src', 'assets/imgGames/poule.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'cheval').prop('class', 'cheval animals img-fluid').prop('alt', 'un joli cheval').attr('src', 'assets/imgGames/cheval.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                $('#table').append("<img class='img-fluid' src='assets/imgGames/prairie.jpg' alt='La pature ou se reposent les animaux' />")
            } else if (select == 2) {
                var x = 1;
                while (x < 2) {
                    $('#draggable1').clone().prop('id', 'culotte').prop('class', 'culotte clothing img-fluid').prop('alt', 'une petite culotte').attr('src', 'assets/imgGames/culotte.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 't-shirt').prop('class', 't-shirt clothing img-fluid').prop('alt', 'un joli t-shirt').attr('src', 'assets/imgGames/tshirt.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'pull').prop('class', 'pull clothing img-fluid').prop('alt', 'un pull de sport').attr('src', 'assets/imgGames/pull.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'chaussette').prop('class', 'chaussette clothing img-fluid').prop('alt', 'une petite chaussette').attr('src', 'assets/imgGames/chaussette.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'pantalon').prop('class', 'pantalon clothing img-fluid').prop('alt', 'un pantalon môche').attr('src', 'assets/imgGames/pantalon.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                $('#table').append("<img class='img-fluid' src='assets/imgGames/valise.png' alt='une valise pour partir en vacances' />")
            } else if (select == 3) {
                var x = 1;
                while (x < 2) {
                    $('#draggable1').clone().prop('id', 'yahourt').prop('class', 'yahourt fridge img-fluid').prop('alt', 'un yahourt à l\'Oréo').attr('src', 'assets/imgGames/yahourt.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'beurre').prop('class', 'beurre fridge img-fluid').prop('alt', 'un pot de beurre').attr('src', 'assets/imgGames/beurre.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'lait').prop('class', 'lait fridge img-fluid').prop('alt', 'un verre de lait').attr('src', 'assets/imgGames/lait.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'jus d\'oranges').prop('class', 'jus d\'oranges fridge img-fluid').prop('alt', 'une verre de jus d\'oranges').attr('src', 'assets/imgGames/jus d\'orange.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'tomate').prop('class', 'tomate fridge img-fluid').prop('alt', 'une belle tomate').attr('src', 'assets/imgGames/tomate.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                $('#table').append('<img class="img-fluid" src="assets/imgGames/fridge.png" alt="un frigidaire bien rempli" />')
            } else if (select == 4) {
                var x = 1;
                while (x < 2) {
                    $('#draggable1').clone().prop('id', 'crabe').prop('class', 'crabe seaAnimals img-fluid').prop('alt', 'un yahourt à l\'Oréo').attr('src', 'assets/imgGames/crabe.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'poisson').prop('class', 'poisson seaAnimals img-fluid').prop('alt', 'un pot de beurre').attr('src', 'assets/imgGames/poisson.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'pieuvre').prop('class', 'pieuvre seaAnimals img-fluid').prop('alt', 'un verre de lait').attr('src', 'assets/imgGames/pieuvre.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'tortue').prop('class', 'tortue seaAnimals img-fluid').prop('alt', 'une verre de jus d\'oranges').attr('src', 'assets/imgGames/tortue.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'étoile de mer').prop('class', 'étoile de mer seaAnimals img-fluid').prop('alt', 'une belle tomate').attr('src', 'assets/imgGames/étoile de mer.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                $('#table').append("<img class='img-fluid' src='assets/imgGames/eau.png' alt='la mer' />")
            }
        } else if (itemNumber == 1) { // régle su 2 objets ; pour le reste même chose qu'au dessus
            $('#gameRules').append('<h2>' + (goal[select] == 'table' ? 'Pose ' : (goal[select] == 'prairie' ? 'Pose ' : (goal[select] == 'valise' ? 'Pose ' : (goal[select] == 'frigo' ? 'Pose ' : (goal[select] == 'eau' ? 'Pose ' : ''))))) + number + ' ' + (selectedFirstIvtemAlea == 'cheval' && number > 1 ? 'chevaux' : (selectedFirstIvtemAlea == 'étoile de mer' && number > 1 ? 'étoiles de mer' : selectedFirstIvtemAlea)) + (number == '1' || selectedFirstIvtemAlea == 'ananas' || selectedFirstIvtemAlea == 'cheval' || selectedFirstIvtemAlea == 'jus d\'oranges' || selectedFirstIvtemAlea == 'étoile de mer' ? '' : 's ') + ' et ' + secondNumber + ' ' + (selectedSecondItemAlea == 'cheval' && secondNumber > 1 ? 'chevaux' : (selectedSecondItemAlea == 'étoile de mer' && secondNumber > 1 ? 'étoiles de mer' : selectedSecondItemAlea)) + (secondNumber == '1' || selectedSecondItemAlea == 'ananas' || selectedSecondItemAlea == 'cheval' || selectedSecondItemAlea == 'jus d\'oranges' || selectedSecondItemAlea == 'étoile de mer' ? '' : 's ') + (goal[select] == 'table' ? ' sur la table' : (goal[select] == 'prairie' ? ' dans la prairie' : (goal[select] == 'valise' ? ' dans la valise' : (goal[select] == 'frigo' ? ' dans le frigidaire' : (goal[select] == 'eau' ? ' dans la mer' : ''))))) + '  <img class="speaker" src="assets/imgGames/speaker.png" alt="Un speaker qui parle"></h2>');
            $('.speaker').click(function () {
                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/' + goal[select] + '.mp3" autoplay></audio>'); }, 0);
                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/' + (selectedFirstIvtemAlea == 'banane' && number == 1 || selectedFirstIvtemAlea == 'orange' && number == 1 || selectedFirstIvtemAlea == 'pomme' && number == 1 || selectedFirstIvtemAlea == 'poire' && number == 1 || selectedFirstIvtemAlea == 'vache' && number == 1 || selectedFirstIvtemAlea == 'poule' && number == 1 || selectedFirstIvtemAlea == 'culotte' && number == 1 || selectedFirstIvtemAlea == 'chaussette' && number == 1 || selectedFirstIvtemAlea == 'tomate' && number == 1 || selectedFirstIvtemAlea == 'étoile de mer' && number == 1 || selectedFirstIvtemAlea == 'tortue' && number == 1 || selectedFirstIvtemAlea == 'pieuvre' && number == 1 ? 'une' : number) + '.mp3" autoplay></audio>'); }, 3100);
                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/' + (selectedFirstIvtemAlea == 'orange' && number > 1 ? 'zorange' : (selectedFirstIvtemAlea == 'ananas' && number > 1 ? 'zananas' : (selectedFirstIvtemAlea == 'cheval' && number > 1 ? 'chevaux' : selectedFirstIvtemAlea))) + '.mp3" autoplay></audio>'); }, 3500);
                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/et.mp3" autoplay></audio>'); }, 4300);
                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/' + (selectedSecondItemAlea == 'banane' && secondNumber == 1 || selectedSecondItemAlea == 'orange' && secondNumber == 1 || selectedSecondItemAlea == 'pomme' && secondNumber == 1 || selectedSecondItemAlea == 'poire' && secondNumber == 1 || selectedSecondItemAlea == 'vache' && secondNumber == 1 || selectedSecondItemAlea == 'poule' && secondNumber == 1 || selectedSecondItemAlea == 'culotte' && secondNumber == 1 || selectedSecondItemAlea == 'chaussette' && secondNumber == 1 || selectedSecondItemAlea == 'tomate' && secondNumber == 1 || selectedSecondItemAlea == 'étoile de mer' && secondNumber == 1 || selectedSecondItemAlea == 'tortue' && secondNumber == 1 || selectedSecondItemAlea == 'pieuvre' && secondNumber == 1 ? 'une' : secondNumber) + '.mp3" autoplay></audio>'); }, 4500);
                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/' + (selectedSecondItemAlea == 'orange' && secondNumber > 1 ? 'zorange' : (selectedSecondItemAlea == 'ananas' && secondNumber > 1 ? 'zananas' : (selectedSecondItemAlea == 'cheval' && secondNumber > 1 ? 'chevaux' : selectedSecondItemAlea))) + '.mp3" autoplay></audio>'); }, 5000);
            });
            if (select == 0) {
                var x = 1;
                while (x < 2) {
                    $('#draggable1').clone().prop('id', 'pomme').prop('class', 'pomme fruits img-fluid').prop('alt', 'une jolie pomme').attr('src', 'assets/imgGames/pomme.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'orange').prop('class', 'orange fruits img-fluid').prop('alt', 'une jolie orange').attr('src', 'assets/imgGames/orange.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'banane').prop('class', 'banane fruits img-fluid').prop('alt', 'une jolie banane').attr('src', 'assets/imgGames/banane.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'poire').prop('class', 'poire fruits img-fluid').prop('alt', 'une jolie poire').attr('src', 'assets/imgGames/poire.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'ananas').prop('class', 'ananas fruits img-fluid').prop('alt', 'un joli ananas').attr('src', 'assets/imgGames/ananas.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                $('#table').append("<img class='img-fluid' src='assets/imgGames/table.png' alt='La table ou l'on pose les fruits' />")
            } else if (select == 1) {
                var x = 1;
                while (x < 2) {
                    $('#draggable1').clone().prop('id', 'vache').prop('class', 'vache animals img-fluid').prop('alt', 'une jolie vache').attr('src', 'assets/imgGames/vache.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'mouton').prop('class', 'mouton animals img-fluid').prop('alt', 'un joli mouton').attr('src', 'assets/imgGames/mouton.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'cochon').prop('class', 'cochon animals img-fluid').prop('alt', 'un petit cochon').attr('src', 'assets/imgGames/cochon.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'poule').prop('class', 'poule animals img-fluid').prop('alt', 'une petite poule').attr('src', 'assets/imgGames/poule.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'cheval').prop('class', 'cheval animals img-fluid').prop('alt', 'un joli cheval').attr('src', 'assets/imgGames/cheval.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                $('#table').append("<img class='img-fluid' src='assets/imgGames/prairie.jpg' alt='La pature ou se reposent les animaux' />")
            } else if (select == 2) {
                var x = 1;
                while (x < 2) {
                    $('#draggable1').clone().prop('id', 'culotte').prop('class', 'culotte clothing img-fluid').prop('alt', 'une petite culotte').attr('src', 'assets/imgGames/culotte.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 't-shirt').prop('class', 't-shirt clothing img-fluid').prop('alt', 'un joli t-shirt').attr('src', 'assets/imgGames/tshirt.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'pull').prop('class', 'pull clothing img-fluid').prop('alt', 'un pull de sport').attr('src', 'assets/imgGames/pull.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'chaussette').prop('class', 'chaussette clothing img-fluid').prop('alt', 'une petite chaussette').attr('src', 'assets/imgGames/chaussette.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'pantalon').prop('class', 'pantalon clothing img-fluid').prop('alt', 'un pantalon môche').attr('src', 'assets/imgGames/pantalon.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                $('#table').append("<img class='img-fluid' src='assets/imgGames/valise.png' alt='une valise pour partir en vacances' />")
            } else if (select == 3) {
                var x = 1;
                while (x < 2) {
                    $('#draggable1').clone().prop('id', 'yahourt').prop('class', 'yahourt fridge img-fluid').prop('alt', 'un yahourt à l\'Oréo').attr('src', 'assets/imgGames/yahourt.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'beurre').prop('class', 'beurre fridge img-fluid').prop('alt', 'un pot de beurre').attr('src', 'assets/imgGames/beurre.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'lait').prop('class', 'lait fridge img-fluid').prop('alt', 'un verre de lait').attr('src', 'assets/imgGames/lait.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'jus d\'oranges').prop('class', 'jus d\'oranges fridge img-fluid').prop('alt', 'une verre de jus d\'oranges').attr('src', 'assets/imgGames/jus d\'orange.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'tomate').prop('class', 'tomate fridge img-fluid').prop('alt', 'une belle tomate').attr('src', 'assets/imgGames/tomate.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                $('#table').append("<img class='img-fluid' src='assets/imgGames/fridge.png' alt='un frigidaire bien rempli' />")
            } else if (select == 4) {
                var x = 1;
                while (x < 2) {
                    $('#draggable1').clone().prop('id', 'crabe').prop('class', 'crabe seaAnimals img-fluid').prop('alt', 'un yahourt à l\'Oréo').attr('src', 'assets/imgGames/crabe.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'poisson').prop('class', 'poisson seaAnimals img-fluid').prop('alt', 'un pot de beurre').attr('src', 'assets/imgGames/poisson.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'pieuvre').prop('class', 'pieuvre seaAnimals img-fluid').prop('alt', 'un verre de lait').attr('src', 'assets/imgGames/pieuvre.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'tortue').prop('class', 'tortue seaAnimals img-fluid').prop('alt', 'une verre de jus d\'oranges').attr('src', 'assets/imgGames/tortue.png').prependTo("#panier").draggable({ revert: "invalid" });
                    $('#draggable1').clone().prop('id', 'étoile de mer').prop('class', 'étoile de mer seaAnimals img-fluid').prop('alt', 'une belle tomate').attr('src', 'assets/imgGames/étoile de mer.png').prependTo("#panier").draggable({ revert: "invalid" });
                    x++;
                }
                $('#table').append("<img src='assets/imgGames/eau.png' alt='la mer' />")
            }
        }
        $(".table").droppable({ // permet de rendre la class table droppable, c'est a dire receptive aux objets draggable
            accept(draggable) {
                var select = $('#theme').val();
                var selectedFirstItem = firstItemArray[select];
                var selectedSecondItem = secondItemArray[select];
                var selectedFirstIvtemAlea = selectedFirstItem[alea];
                var selectedSecondItemAlea = selectedSecondItem[alea];
                // voir commentaires plus haut
                var itemNumber = $('#itemNumber').val();
                if (itemNumber == 0) { // si le nombre d'objet est 1
                    const validFruits = [selectedFirstIvtemAlea]; // le premier item selectionner seul sera valide
                    let isValid = false;
                    validFruits.forEach((c) => (isValid = draggable.hasClass(c) ? true : isValid));
                    return isValid;
                } else if (itemNumber == 1) { // si le nombre d'objets est 2
                    const validFruits = [selectedFirstIvtemAlea, selectedSecondItemAlea]; // les deux items sélectionnés seront valide
                    let isValid = false;
                    validFruits.forEach((c) => (isValid = draggable.hasClass(c) ? true : isValid));
                    return isValid;
                }
            },
            drop: function (event, ui) { // On entre dans l'event drop
                var currentId = $(ui.draggable).attr("id"); // valeur de l'id de l'objet
                var select = $('#theme').val();
                var selectedFirstItem = firstItemArray[select];
                var selectedSecondItem = secondItemArray[select];
                var selectedFirstIvtemAlea = selectedFirstItem[alea];
                var selectedSecondItemAlea = selectedSecondItem[alea];
                var itemNumber = $('#itemNumber').val();
                // voir commentaires plus haut
                if (currentId === selectedFirstIvtemAlea) { // on controle si l'id de le premier objet correspond bien a ce qui est attendu
                    count++; // j'incrémente mon premier compteur
                    if (count < number) { // si le nombre de premier objet posé est inférieur au nombre requis (number) il ne se passe rien, l'objet retourne à se position d'origine si il ne correspond pas
                        if (select == 0) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'pomme').prop('class', 'pomme fruits img-fluid').prop('alt', 'une jolie pomme').attr('src', 'assets/imgGames/pomme.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'orange').prop('class', 'orange fruits img-fluid').prop('alt', 'une jolie orange').attr('src', 'assets/imgGames/orange.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'banane').prop('class', 'banane fruits img-fluid').prop('alt', 'une jolie banane').attr('src', 'assets/imgGames/banane.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'poire').prop('class', 'poire fruits img-fluid').prop('alt', 'une jolie poire').attr('src', 'assets/imgGames/poire.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'ananas').prop('class', 'ananas fruits img-fluid').prop('alt', 'un joli ananas').attr('src', 'assets/imgGames/ananas.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        } else if (select == 1) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'vache').prop('class', 'vache animals img-fluid').prop('alt', 'une jolie vache').attr('src', 'assets/imgGames/vache.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'mouton').prop('class', 'mouton animals img-fluid').prop('alt', 'un joli mouton').attr('src', 'assets/imgGames/mouton.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'cochon').prop('class', 'cochon animals img-fluid').prop('alt', 'un petit cochon').attr('src', 'assets/imgGames/cochon.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'poule').prop('class', 'poule animals img-fluid').prop('alt', 'une petite poule').attr('src', 'assets/imgGames/poule.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'cheval').prop('class', 'cheval animals img-fluid').prop('alt', 'un joli cheval').attr('src', 'assets/imgGames/cheval.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        } else if (select == 2) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'culotte').prop('class', 'culotte clothing img-fluid').prop('alt', 'une petite culotte').attr('src', 'assets/imgGames/culotte.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 't-shirt').prop('class', 't-shirt clothing img-fluid').prop('alt', 'un joli t-shirt').attr('src', 'assets/imgGames/tshirt.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'pull').prop('class', 'pull clothing img-fluid').prop('alt', 'un pull de sport').attr('src', 'assets/imgGames/pull.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'chaussette').prop('class', 'chaussette clothing img-fluid').prop('alt', 'une petite chaussette').attr('src', 'assets/imgGames/chaussette.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'pantalon').prop('class', 'pantalon clothing img-fluid').prop('alt', 'un pantalon môche').attr('src', 'assets/imgGames/pantalon.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        } else if (select == 3) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'yahourt').prop('class', 'yahourt fridge img-fluid').prop('alt', 'un yahourt à l\'Oréo').attr('src', 'assets/imgGames/yahourt.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'beurre').prop('class', 'beurre fridge img-fluid').prop('alt', 'un pot de beurre').attr('src', 'assets/imgGames/beurre.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'lait').prop('class', 'lait fridge img-fluid').prop('alt', 'un verre de lait').attr('src', 'assets/imgGames/lait.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'jus d\'oranges').prop('class', 'jus d\'oranges fridge img-fluid').prop('alt', 'une verre de jus d\'oranges').attr('src', 'assets/imgGames/jus d\'orange.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'tomate').prop('class', 'tomate fridge img-fluid').prop('alt', 'une belle tomate').attr('src', 'assets/imgGames/tomate.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        } else if (select == 4) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'crabe').prop('class', 'crabe seaAnimals img-fluid').prop('alt', 'un yahourt à l\'Oréo').attr('src', 'assets/imgGames/crabe.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'poisson').prop('class', 'poisson seaAnimals img-fluid').prop('alt', 'un pot de beurre').attr('src', 'assets/imgGames/poisson.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'pieuvre').prop('class', 'pieuvre seaAnimals img-fluid').prop('alt', 'un verre de lait').attr('src', 'assets/imgGames/pieuvre.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'tortue').prop('class', 'tortue seaAnimals img-fluid').prop('alt', 'une verre de jus d\'oranges').attr('src', 'assets/imgGames/tortue.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'étoile de mer').prop('class', 'étoile de mer seaAnimals img-fluid').prop('alt', 'une belle tomate').attr('src', 'assets/imgGames/étoile de mer.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        }
                    } else if (count > number) { // si le nombre de premier objet posé est supérieur à number : message d'erreur
                        $('#looseModal').modal('show')
                        $('.bigLoose').html("Tu as posé trop " + (selectedFirstIvtemAlea == 'ananas' || selectedFirstIvtemAlea == 'orange' ? 'd\'' : 'de ') + selectedFirstIvtemAlea + (selectedFirstIvtemAlea == 'ananas' ? '' : 's '))
                    } else if (count = number) { // si le nombre de premier objet posé est = à number c'est gagné pour le premier objet
                        $("#gameRules").append("<h2 class='win'><center>Félicitation, tu as posé " + (selectedFirstIvtemAlea == 'ananas' || selectedFirstIvtemAlea == 'mouton' || selectedFirstIvtemAlea == 'cochon' || selectedFirstIvtemAlea == 'cheval' || selectedFirstIvtemAlea == 'pantalon' || selectedFirstIvtemAlea == 'pull' || selectedFirstIvtemAlea == 't-shirt' || selectedFirstIvtemAlea == 'poisson' || selectedFirstIvtemAlea == 'crabe' || selectedFirstIvtemAlea == 'lait' || selectedFirstIvtemAlea == 'beurre' || selectedFirstIvtemAlea == 'yahourt' || selectedFirstIvtemAlea == 'jus d\'oranges' ? 'tous ' : 'toutes ') + "les " + (selectedFirstIvtemAlea == 'cheval' ? 'chevaux' : (selectedFirstIvtemAlea == 'étoile de mer' ? 'étoiles de mer' : selectedFirstIvtemAlea)) + (selectedFirstIvtemAlea == 'ananas' || selectedFirstIvtemAlea == 'cheval' || selectedFirstIvtemAlea == 'étoile de mer' || selectedFirstIvtemAlea == 'jus d\'oranges' ? '' : 's ') + "</center></h2><audio src='assets/audio/bravo2.ogg' autoplay></audio>");
                        $('#gameRules').append("<div class='victoryOne' style='visibility: hidden;'>" + selectedFirstIvtemAlea + number + "</div>");
                        // condition pour victoire globale si il n'y a qu'un objet dans le jeu ou si il y en a deux
                        // premiere condition : si il y a deux objet et que le premier est terminé en premier
                        if (itemNumber == 1 && $('.victoryOne').html() == selectedFirstIvtemAlea + number && $('.victoryTwo').html() == selectedSecondItemAlea + secondNumber) {
                            $('#winModal').modal('show')
                            $('.speakerWin').click(function () {
                                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/gagne.mp3" autoplay></audio>'); }, 500);
                            });
                            victoryCount++; // j'incrémante pour plus tard le compteur de victoire
                            // condition si il n'y a qu'un seul objet en jeu
                        } else if (itemNumber == 0 && $('.victoryOne').html() == selectedFirstIvtemAlea + number) {
                            $('#winModal').modal('show')
                            $('.speakerWin').click(function () {
                                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/gagne.mp3" autoplay></audio>'); }, 500);
                            });
                        }
                    }
                } else if (currentId === selectedSecondItemAlea) { // on contrôle que le second objet correspond bien a ce qui est attendu
                    secondCount++; // j'incrémente mon second compteur
                    if (secondCount < secondNumber) { // si le nombre de second objet posé est inférieur au nombre requis (secondNumber) il ne se passe rien, l'objet retourne à se position d'origine si il ne correspond pas
                        if (select == 0) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'pomme').prop('class', 'pomme fruits img-fluid').prop('alt', 'une jolie pomme').attr('src', 'assets/imgGames/pomme.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'orange').prop('class', 'orange fruits img-fluid').prop('alt', 'une jolie orange').attr('src', 'assets/imgGames/orange.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'banane').prop('class', 'banane fruits img-fluid').prop('alt', 'une jolie banane').attr('src', 'assets/imgGames/banane.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'poire').prop('class', 'poire fruits img-fluid').prop('alt', 'une jolie poire').attr('src', 'assets/imgGames/poire.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'ananas').prop('class', 'ananas fruits img-fluid').prop('alt', 'un joli ananas').attr('src', 'assets/imgGames/ananas.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        } else if (select == 1) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'vache').prop('class', 'vache animals img-fluid').prop('alt', 'une jolie vache').attr('src', 'assets/imgGames/vache.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'mouton').prop('class', 'mouton animals img-fluid').prop('alt', 'un joli mouton').attr('src', 'assets/imgGames/mouton.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'cochon').prop('class', 'cochon animals img-fluid').prop('alt', 'un petit cochon').attr('src', 'assets/imgGames/cochon.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'poule').prop('class', 'poule animals img-fluid').prop('alt', 'une petite poule').attr('src', 'assets/imgGames/poule.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'cheval').prop('class', 'cheval animals img-fluid').prop('alt', 'un joli cheval').attr('src', 'assets/imgGames/cheval.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        } else if (select == 2) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'culotte').prop('class', 'culotte clothing img-fluid').prop('alt', 'une petite culotte').attr('src', 'assets/imgGames/culotte.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 't-shirt').prop('class', 't-shirt clothing img-fluid').prop('alt', 'un joli t-shirt').attr('src', 'assets/imgGames/tshirt.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'pull').prop('class', 'pull clothing img-fluid').prop('alt', 'un pull de sport').attr('src', 'assets/imgGames/pull.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'chaussette').prop('class', 'chaussette clothing img-fluid').prop('alt', 'une petite chaussette').attr('src', 'assets/imgGames/chaussette.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'pantalon').prop('class', 'pantalon clothing img-fluid').prop('alt', 'un pantalon môche').attr('src', 'assets/imgGames/pantalon.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        } else if (select == 3) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'yahourt').prop('class', 'yahourt fridge img-fluid').prop('alt', 'un yahourt à l\'Oréo').attr('src', 'assets/imgGames/yahourt.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'beurre').prop('class', 'beurre fridge img-fluid').prop('alt', 'un pot de beurre').attr('src', 'assets/imgGames/beurre.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'lait').prop('class', 'lait fridge img-fluid').prop('alt', 'un verre de lait').attr('src', 'assets/imgGames/lait.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'jus d\'oranges').prop('class', 'jus d\'oranges fridge img-fluid').prop('alt', 'une verre de jus d\'oranges').attr('src', 'assets/imgGames/jus d\'orange.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'tomate').prop('class', 'tomate fridge img-fluid').prop('alt', 'une belle tomate').attr('src', 'assets/imgGames/tomate.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        } else if (select == 4) {
                            var x = 1;
                            while (x < 2) {
                                $('#draggable1').clone().prop('id', 'crabe').prop('class', 'crabe seaAnimals img-fluid').prop('alt', 'un yahourt à l\'Oréo').attr('src', 'assets/imgGames/crabe.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'poisson').prop('class', 'poisson seaAnimals img-fluid').prop('alt', 'un pot de beurre').attr('src', 'assets/imgGames/poisson.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'pieuvre').prop('class', 'pieuvre seaAnimals img-fluid').prop('alt', 'un verre de lait').attr('src', 'assets/imgGames/pieuvre.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'tortue').prop('class', 'tortue seaAnimals img-fluid').prop('alt', 'une verre de jus d\'oranges').attr('src', 'assets/imgGames/tortue.png').prependTo("#panier").draggable({ revert: "invalid" });
                                $('#draggable1').clone().prop('id', 'étoile de mer').prop('class', 'étoile de mer seaAnimals img-fluid').prop('alt', 'une belle tomate').attr('src', 'assets/imgGames/étoile de mer.png').prependTo("#panier").draggable({ revert: "invalid" });
                                x++;
                            }
                        }
                        // pour les reste les commentaire du dessus s'appliquent également
                    } else if (secondCount > secondNumber) {
                        $('#looseModal').modal('show')
                        $('.bigLoose').html("Tu as posé trop " + (selectedSecondItemAlea == 'ananas' || selectedSecondItemAlea == 'orange' ? 'd\'' : 'de ') + selectedSecondItemAlea + (selectedSecondItemAlea == 'ananas' ? '' : 's '))
                    } else if (secondCount = secondNumber) {
                        $("#gameRules").append("<h2 class='win'><center>Félicitation, tu as posé " + (selectedSecondItemAlea == 'ananas' || selectedSecondItemAlea == 'mouton' || selectedSecondItemAlea == 'cochon' || selectedSecondItemAlea == 'cheval' || selectedSecondItemAlea == 'pantalon' || selectedSecondItemAlea == 'pull' || selectedSecondItemAlea == 't-shirt' || selectedSecondItemAlea == 'poisson' || selectedSecondItemAlea == 'crabe' || selectedSecondItemAlea == 'lait' || selectedSecondItemAlea == 'beurre' || selectedSecondItemAlea == 'yahourt' || selectedSecondItemAlea == 'jus d\'oranges' ? 'tous ' : 'toutes ') + "les " + (selectedSecondItemAlea == 'cheval' ? 'chevaux' : (selectedSecondItemAlea == 'étoile de mer' ? 'étoiles de mer' : selectedSecondItemAlea)) + (selectedSecondItemAlea == 'ananas' || selectedSecondItemAlea == 'cheval' || selectedSecondItemAlea == 'étoile de mer' || selectedSecondItemAlea == 'jus d\'oranges' ? '' : 's ') + "</center></h2><audio src='assets/audio/bravo2.ogg' autoplay></audio>");
                        $('#gameRules').append("<div class='victoryTwo' style='visibility: hidden;'>" + selectedSecondItemAlea + secondNumber + "</div>");
                        if (itemNumber == 1 && $('.victoryOne').html() == selectedFirstIvtemAlea + number && $('.victoryTwo').html() == selectedSecondItemAlea + secondNumber) {
                            $('#winModal').modal('show')
                            $('.speakerWin').click(function () {
                                setTimeout(function () { $('#gameRules').append('<audio src="assets/audio/gagne.mp3" autoplay></audio>'); }, 500);
                            });
                            victoryCount++;
                        }
                    }
                }
            }
        });
    });

});
