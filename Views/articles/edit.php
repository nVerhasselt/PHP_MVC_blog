

<div class="container-fluid">
  <div class="row">

        <section class="formClass">
            <form class="col-lg-6" method="POST" action="/articles/edit/<?=$article['id']?>">
                <fieldset>
                    <h1>Modifier votre article</h1>

                        <div class="form-group">
                            <label for="title" class="form-label mt-4">Modifier le titre :</label>
                            <textarea class="form-control" id="title" rows="2" name="title"><?=$article['title']?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="category" class="form-label mt-4">Modifier la catégorie</label>
                            <select class="form-select" id="category" name="category">
                            <?php foreach ($categories as $categorie) { ?>
                                <option value="<?= $categorie['id']; ?>"><?= $categorie['name']; ?></option>
                            <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="content" class="form-label mt-4">Modifier votre article :</label>
                            <textarea class="form-control" id="content" rows="20" name="content"><?=$article['content']?></textarea>
                        </div>

                </fieldset>

                <button type="submit" class="btn btn-primary">Poster les modifications</button>
            </form>
        </section>

    </div>
</div>

