<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center alerte">
            <h2>Avant de créer un contenu, assurez vous qu'il n'existe pas déjà !</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <p>Les étapes de la création d'un contenu vidéo :</p>
            <ul>
                <li>Créer un contenu</li>
                <li>Selectionner une catégorie de vidéo</li>
                <li>Ajouter une vidéo et son détail au contenu</li>
            </ul>
        </div>
    </div>
    <div class="voirCat">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <p>Ci-dessous la liste des catégories existante</p>
            </div>
        </div>
        <div class="row">
            <div class="catItem col-12 text-center">
                <select class="getCat" name="Category">
                    <option value="">--Catégories existantes--</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mt-2">
            <button class="btn btn-secondary seeVoirCat">Voir les catégories</button>
        </div>
    </div>
    <div class="creatCat">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <p>Si le contenu que vous voulez créer n'appartient à aucune de ses catégories, il faut créer la catégorie.</p>
            </div>
        </div>
        <div class="row">
            <div class="offset-2 col-8 text-center">
                <input class="form-control newCat" type="text" placeholder="Entrer ici le nom de la nouvelle catégorie" />
                <button class="btn btn-secondary addCat">Valider la catégorie</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mt-2">
            <button class="btn btn-secondary seeCreatCat">créer une catégorie</button>
        </div>
    </div>
    <div class="creatContent">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <h2>Créer un contenu (uniquement vidéo LdSf)</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-2 col-8 text-center">
                <input class="form-control newVideoContent" type="text" placeholder="Entrer ici le nom du contenu vidéo" />
                <input class="form-control newVideoContentType" type="hidden" value="2" />
                <button class="btn btn-secondary addVideoContent">Valider</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mt-2">
            <button class="btn btn-secondary seeCreatContent">Créer un contenu vidéo Ldsf</button>
        </div>
    </div>
    <div class="creatVideoContent">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <h2>Ajouter une vidéo au contenu venant d'être créé</h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-2 col-8 text-center">
                <label for="">Le remplissage du mot est automatique, il sera le même que celui du contenu créé ! AJOUTEZ UNIQUEMENT (version 2),...</label>
                <input class="form-control videoTitle" type="text" />
                <label for="">Entrer ici le texte descriptif ex: Mot vache en langue des signes française</label>
                <input class="form-control videoText" type="text" />
                <label for="">Fichier vidéo</label>
                <input class="form-control file" type="file" />
                <input class="hiddenFile" type="hidden">
                <input class="form-control id_content" type="hidden" value="" />
                <label for="">Choisissez la catégorie de la vidéo</label>
                <div class="catItem col-12 text-center">
                    <select class="getCategory" name="Category">
                        <option value="">--Choix de la catégories--</option>
                    </select>
                    <input class="catId" type="hidden" value="" />
                </div>
                <button class="btn btn-secondary addVideoToVideoContent">Valider</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="itIsOk text-center"></div>
            <div class="itIsNotOk text-center"></div>
        </div>
    </div>
    <hr class="mt-4" />
    <div class="row mt-4">
        <div class="col-12 text-center">
            <a class="btn btn-secondary" href="/webapp/public/admin-word">Gérer les vidéos existantes</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12 text-center offlineVideos">
        </div>
    </div>
</div>