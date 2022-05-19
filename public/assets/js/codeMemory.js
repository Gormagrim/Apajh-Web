/*globals document, JeuDeCartes, setTimeout */
var dom_body, dom_boutonAide, dom_aide, dom_console, dom_score, dom_jeu, cartes, nombreDeCartes, reponse, isPause;

//================== swapImage ==================
function swapImage(moi, img) {
	moi.src = "images/" + img;
}

//================== effacerElementsDe ==================
function effacerElementsDe(dom) {
	while (dom.firstChild) {
		dom.removeChild(dom.firstChild);
	}
}

//============= afficherSurConsole =============
function afficherSurConsole(html) {
	dom_console.innerHTML = html;
}

//================== afficherScore ==================
function afficherScore(html) {
	dom_score.innerHTML = html;
}

//================== remiseAZero ==================
function remiseAZero() {
	cartes = new JeuDeCartes(nombreDeCartes);

	effacerElementsDe(dom_jeu);
	cartes.afficherDans(dom_jeu);

	afficherScore(cartes.score());
	afficherSurConsole(cartes.message());
}

//================== clicNouvellePartie ==================
function clicNouvellePartie(n) {
	if (n) {
		nombreDeCartes = n;
	}
	if (n == 16) {
		$('.sat').attr('data-difficulty', 1)
	} else if (n == 32) {
		$('.sat').attr('data-difficulty', 2)
	} else {
		$('.sat').attr('data-difficulty', 3)
	}
	remiseAZero();
	afficherSurConsole("Nouvelle Partie");
}
//================== clicOuvrirAide ==================
function clicOuvrirAide() {
	dom_aide.className = null;
}

//================== clicFermerAide ==================
function clicFermerAide() {
	dom_aide.className = "invisible";
}

//================== finDePartie ==================
function finDePartie() {
	afficherSurConsole('<span class="rouge gras">Bravo !</span> &nbsp; <span class="bleu">Fin de Partie</span>');
	cartes.afficherReponses(dom_jeu);
	afficherScore(cartes.score());
}

//============= aFaire2 =============
function aFaire2() {
	switch (reponse) {
		case 1:
			cartes.cacherCarte2();
			break;
		case 2:
			cartes.retournerCarte2();
			break;
	}
	afficherScore(cartes.score());
	afficherSurConsole(cartes.message());
	if (cartes.pairesAVoir === 0) {
		finDePartie();
		$('.sat').attr('data-play', 1)
		isPause = true
	}
	dom_body.className = null;
}

//============= aFaire1 =============
function aFaire1() {
	switch (reponse) {
		case 1:
			cartes.cacherCarte1();
			setTimeout(aFaire2, 200);
			break;
		case 2:
			cartes.retournerCarte1();
			setTimeout(aFaire2, 600);
			break;
	}
}

//================== clicCarte ==================
function clicCarte() {
	var n = this.indexK;
	if (cartes.etat === 0 || !cartes.jeuBattu[n].presente) {
		return;
	}
	reponse = cartes.clicCarte(n);
	afficherScore(cartes.score());
	afficherSurConsole(cartes.message());
	switch (reponse) {
		case 1:
			dom_body.className = "vu";
			setTimeout(aFaire1, 200);
			break;
		case 2:
			setTimeout(aFaire1, 600);
			break;
	}
}

//================== init ==================
function init() {
	dom_body = document.getElementById("body");
	// zone d'affichage de l'aide (bouton aide au dÃ©part)
	dom_aide = document.getElementById("aide");
	// zone d'affichage des informations (* au dÃ©part)
	dom_console = document.getElementById("console");
	// zone d'affichage du score (vide au dÃ©part)
	dom_score = document.getElementById("score");
	// zone de dÃ©finition du jeu (vide au dÃ©part)
	dom_jeu = document.getElementById("jeu");
	document.getElementById("plan").setAttribute("align", "center");
	document.getElementById("radio").checked = true;
	nombreDeCartes = 32;
	remiseAZero();
}