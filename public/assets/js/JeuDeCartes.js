/*globals document, clicCarte */
//============= listeAuHasard =============
// Liste des nombres de 0 à (n-1) en ordre aléatoire
function listeAuHasard(n) {
	var k, h;
	var a = [];
	var b = [];
	for (k = 0; k < n; k += 1) {
		a[k] = k;
	}
	k = 0;
	while (k < n) {
		h = Math.floor(Math.random() * n);
		while (a[h] < 0) {
			h = Math.floor(Math.random() * n);
		}
		b[k] = a[h];
		a[h] = -1;
		k += 1;
	}
	return b;
}

//============= Carte =============
function Carte(couleur, hauteur, nom, img) {
	// Joker 0, Trèfle 1, Carreau 2, Cœur 3, Pique 4
	this.couleur = couleur;
	// 1 ... 13, Joker 0
	this.hauteur = hauteur;
	this.nom = nom;
	this.img = img;
	this.dom = null;
	this.visible = false;
	this.presente = true;
}

//============= Carte.image =============
Carte.prototype.image = function () {
	if (!this.presente) {
		return "assets/imgMemory/absente.png";
	} else if (this.visible) {
		return this.img;
	} else {
		return "assets/imgMemory/verso2.png";
	}
};

//============= Carte.rafraichir =============
Carte.prototype.rafraichir = function () {
	this.dom.setAttribute("src", this.image());
};

//============= Carte.toString =============
Carte.prototype.toString = function () {
	return this.nom;
};

//============= JeuDeCartes =============
function JeuDeCartes(nombreDeCartes) {
	var k, n, hauteurs;
	var couleurs = [" de Trèfle", " de Carreau", " de Cœur", " de Pique"];
	var numCouleurs = ["t", "k", "c", "p"];
	if (nombreDeCartes === 32) {
		hauteurs = ["As", "7", "8", "9", "10", "Valet", "Dame", "Roi"];
		this.nombreDeCartes = 32;
		this.nombreParCouleur = 8;
		this.nombreDeCouleurs = 4;
		this.li = 3;
		this.co = 12;
	} else if (nombreDeCartes === 54) {
		hauteurs = ["As", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Valet", "Dame", "Roi"];
		this.nombreDeCartes = 54;
		this.nombreParCouleur = 13;
		this.nombreDeCouleurs = 4;
		this.li = 5;
		this.co = 12;
	} else {
		hauteurs = ["Alex", "Sardine", "Wapiti", "Tibia", "Plouf", "Nestor", "Zoé", "Fleur"];
		couleurs = ["", ""];
		numCouleurs = ["w", "w"];
		this.nombreDeCartes = 16;
		this.nombreParCouleur = 8;
		this.nombreDeCouleurs = 2;
		this.li = 2;
		this.co = 8;
	}
	this.jeu = [];
	for (k = 0; k < this.nombreDeCouleurs; k += 1) {
		for (n = 0; n < this.nombreParCouleur; n += 1) {
			this.jeu.push(new Carte((k + 1), n, (hauteurs[n] + couleurs[k]), ("assets/imgMemory/" + numCouleurs[k] + (this.nombreDeCartes === 16 ? n : (this.nombreDeCartes === 54 ? n + 1 : (n === 0 ? 1 : n + 6))) + ".png")));
		}
	}
	if (this.nombreDeCartes === 54) {
		this.jeu.push(new Carte(0, 0, "Joker Rouge", "assets/imgMemory/j1.png"));
		this.jeu.push(new Carte(0, 0, "Joker Bleu", "assets/imgMemory/j2.png"));
	}
	this.melanger();
}

//============= JeuDeCartes.melanger =============
JeuDeCartes.prototype.melanger = function () {
	var k;
	var l = listeAuHasard(this.nombreDeCartes);
	this.cartesVues = [];
	this.jeuBattu = [];
	for (k = 0; k < this.nombreDeCartes; k += 1) {
		this.jeuBattu[k] = this.jeu[l[k]];
		this.jeuBattu[k].visible = false;
		this.jeuBattu[k].presente = true;
		this.cartesVues[k] = false;
	}
	this.hauteursVues = [];
	for (k = 0; k < this.nombreParCouleur; k += 1) {
		this.hauteursVues[k] = 0;
	}
	this.pairesAVoir = this.nombreDeCartes / 2;
	this.etat = 1;
	this.c1 = -1;
	this.c2 = -1;
	this.jeuParPaires = [];
	this.messageAffichable = ["", "", ""];
	this.clics = 0;
	this.clicsInutiles = 0;
};

//============= JeuDeCartes.afficherDans =============
JeuDeCartes.prototype.afficherDans = function (dom) {
	var l, c, k, div, td, img;
	k = 0;
	for (l = 0; l < this.li; l += 1) {
		tr = document.createElement('div');
		tr.classList.add('row');
		tr.classList.add('mb-2');
		dom.appendChild(tr);
		for (c = 0; c < this.co; c += 1) {
			td = document.createElement("div");
			td.classList.add('col-3');
			td.classList.add('col-sm-1');
			td.classList.add('text-center');
			td.width = 80;
			td.height = 100;
			tr.appendChild(td);
			img = document.createElement("img");
			img.width = 80;
			img.height = 100;
			img.src = this.jeuBattu[k].image();
			img.indexK = k;
			img.onclick = clicCarte;
			td.appendChild(img);
			this.jeuBattu[k].dom = img;
			k += 1;
		}
	}
};

//============= JeuDeCartes.afficherReponses =============
JeuDeCartes.prototype.afficherReponses = function () {
	var l, c, k, img;
	k = 0;
	for (l = 0; l < this.li; l += 1) {
		for (c = 0; c < this.co; c += 1) {
			img = this.jeuBattu[k].dom;
			this.jeuBattu[k].presente = true;
			this.jeuBattu[k].visible = true;
			img.src = this.jeuBattu[k].image();
			k += 1;
		}
	}
};

//============= JeuDeCartes.cacherCarte1 =============
JeuDeCartes.prototype.cacherCarte1 = function () {
	this.jeuBattu[this.c1].presente = false;
	this.jeuBattu[this.c1].rafraichir();
	this.jeuParPaires.push(this.jeuBattu[this.c1]);
	this.c1 = -1;
};

//============= JeuDeCartes.cacherCarte2 =============
JeuDeCartes.prototype.cacherCarte2 = function () {
	this.jeuBattu[this.c2].presente = false;
	this.jeuBattu[this.c2].rafraichir();
	this.jeuParPaires.push(this.jeuBattu[this.c2]);
	this.c2 = -1;
	this.etat = 1;
	this.pairesAVoir -= 1;
};

//============= JeuDeCartes.retournerCarte1 =============
JeuDeCartes.prototype.retournerCarte1 = function () {
	this.jeuBattu[this.c1].visible = false;
	this.jeuBattu[this.c1].rafraichir();
	this.c1 = -1;
};

//============= JeuDeCartes.retournerCarte2 =============
JeuDeCartes.prototype.retournerCarte2 = function () {
	this.jeuBattu[this.c2].visible = false;
	this.jeuBattu[this.c2].rafraichir();
	this.c2 = -1;
	this.etat = 1;
};

//============= JeuDeCartes.clicCarte =============
JeuDeCartes.prototype.clicCarte = function (n) {
	var reponse = null; // coup nul
	this.messageAffichable[0] = "";
	if (this.cartesVues[n]) {
		this.messageAffichable[this.etat] = ' <span class="rouge">déjà vu</span>';
		this.clicsInutiles += 1;
	} else {
		this.messageAffichable[this.etat] = "";
	}
	// on mémorise que la carte a été vue
	this.cartesVues[n] = true;
	// on mémorise que la hauteur a été vue une fois de plus
	this.hauteursVues[this.jeuBattu[n].hauteur] += 1;
	this.clics += 1;
	this.jeuBattu[n].visible = !this.jeuBattu[n].visible;
	if (this.etat === 1) { // levée carte n° 1
		this.c1 = n;
		this.etat = 2; // on attend la levée de la carte n° 2
		reponse = null; // coup sans résultat
	} else { // levéee carte n° 2
		if (n === this.c1) {
			// Si même carte que la première on la cache
			this.c1 = -1;
			this.etat = 1; // on attend la levée de la carte n° 1
			reponse = null; // coup sans résultat
		} else {
			this.c2 = n;
			// on contrôle si les deux cartes sont les mêmes
			if (this.ok()) {
				this.messageAffichable[0] = ' &nbsp; <span class="rouge gras">Bravo !</span>';
				if (this.messageAffichable[1] !== "") {
					this.messageAffichable[1] = "";
					this.clicsInutiles -= 1;
				}
				if (this.messageAffichable[2] !== "") {
					this.messageAffichable[2] = "";
					this.clicsInutiles -= 1;
				}
				this.hauteursVues[this.jeuBattu[n].hauteur] -= 2;
				reponse = 1; // coup gagnant
			} else {
				reponse = 2; // coup perdant
			}
			this.etat = 0; // on ignore les clics suivant
			// on mémorise que la carte a été vue
		}
	}
	// modification affichage
	this.jeuBattu[n].rafraichir();
	return reponse;
};

//============= JeuDeCartes.ok =============
JeuDeCartes.prototype.ok = function () {
	if (this.c2 < 0) {
		return false;
	}
	return this.jeuBattu[this.c2].hauteur === this.jeuBattu[this.c1].hauteur;
};

//============= JeuDeCartes.score =============
JeuDeCartes.prototype.score = function () {
	var txt = "";
	var p, pp, k;
	var pairesRestantes = this.nombreDeCartes / 2 - this.pairesAVoir;
	if (this.pairesAVoir > 0) {
		txt += "Il reste " + this.pairesAVoir + (this.pairesAVoir > 1 ? " paires à découvrir" : " paire à découvrir");
	} else {
		txt += '<span class="rouge gras">Bravo vous avez vu toutes les Paires !</span>';
	}
	if (this.clics > 0) {
		txt += "<br>Vous avez fait " + this.clics + (this.clics > 1 ? " clics" : " clic");
	}
	if (this.clicsInutiles > 0) {
		txt += ' <span class="bleu italique"> dont ' + this.clicsInutiles + (this.clicsInutiles > 1 ? " inutiles" : " inutile") + "</span>";
	}
	if (pairesRestantes > 0) {
		p = Math.floor(10 * this.clics / pairesRestantes) / 10;
	} else {
		p = Math.floor(20 * this.clics / this.nombreDeCartes) / 10;
	}
	// Paire vues et non découvertes
	if (this.pairesAVoir > 0) {
		var n = 0;
		var hVues = [];
		for (k = 0; k < this.nombreParCouleur; k += 1) {
			hVues[k] = 0;
		}
		for (k = 0; k < this.nombreDeCartes; k += 1) {
			if (this.cartesVues[k] && this.jeuBattu[k].presente) {
				hVues[this.jeuBattu[k].hauteur] += 1;
			}
		}
		for (k = 0; k < this.nombreParCouleur; k += 1) {
			if (hVues[k] > 1) {
				n += 1;
			}
		}
		if (n > 0 && this.etat < 2) {
			txt += "<br> &nbsp; &nbsp; " + n + (n > 1 ? " paires ont été dévoilées" : " paire a été dévoilée");
		}
	}
	// Moyenne
	pp = "" + p;
	pp = pp.replace(".", ",");
	if (p > 0) {
		txt += '<br><br><span class="bleu gras score" data-time="" data-score="' + pp + '">Moyenne : ' + pp + (p > 1 ? " clics par Paire" : " clic par Paire</span>");
		
	}
	return txt;
};

//============= JeuDeCartes.message =============
JeuDeCartes.prototype.message = function () {
	var txt = "";
	if (this.c1 > -1) {
		txt += this.jeuBattu[this.c1].toString() + this.messageAffichable[1];
	} else {
		return "Bon Jeu !";
	}
	if (this.c2 > -1) {
		txt += " et " + this.jeuBattu[this.c2].toString() + this.messageAffichable[2];
	}
	return txt + this.messageAffichable[0];
};


