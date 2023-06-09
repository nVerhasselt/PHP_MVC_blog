<div class="container-fluid">
    <div class="row">

        <section class="formClass">
            <form class="col-lg-6" method="POST" action="/articles/add">
                <fieldset>
                    <h1>Créer un article</h1>
                    <div class="form-group">
                            <label for="titre" class="form-label mt-4">titre : </label>
                            <input type="text" class="form-control" id="titre" name="titre" aria-describedby="titre" placeholder="Entrez votre titre">
                        </div>
                
                    <div class="form-group">
                        <label for="categorie" class="form-label mt-4">Catégories : </label>
                        <select name="categorie" id="categorie">
                            <option value="" selected="selected" disabled>Choisissez votre categorie :</option>
                            <?php foreach ($categories as $categorie) { ?>
                                <option value="<?= $categorie['id']; ?>"><?= $categorie['name']; ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="contenu" class="form-label mt-4">Votre article :</label>
                        <textarea class="form-control" id="contenu" name="contenu" rows="3"></textarea>
                    </div>

                </fieldset>
                <button type="submit">Valider</button>
            </form>
        </section>

    </div>
</div>