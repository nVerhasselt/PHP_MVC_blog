<div class="container-fluid">
    <div class="row">

        <section class="detail_article col-lg-8">
            <section>
                <h1><?= $article['title'] ?></h1>
                <p><?= $article['date'] ?> <?= $user['lName'] . $user['fName'] ?> / <?= $categorie['name'] ?></p>
                <p><?= $article['content'] ?></p>
            </section>

            <!-- MODIFIER SUPPRIMER -->
            <div>
                <button type="button" class="btn btn-secondary"><a href="/articles/edit/<?= $article['id'] ?>">Modifier</a></button>
                <button type="button" class="btn btn-secondary"><a href="/articles/remove/<?= $article['id'] ?>">Supprimer</a></button>
            </div>

            <!-- COMMENTS -->
            <section class="col-lg-12">

                <h2>Commentaires</h2>

                <?php foreach ($comments as $comment) : ?>
                    <?php if ($comment['articles_id'] == $article['id']) : ?>

                        <!--COMMENT HEADER-->
                        <div class="card bg-light mb-3">
                            <div class="card-header">
                                <p><?= $comment['date'] ?>/<?= $user['fName'] . $user['fName'] ?></p>
                            </div>

                            <!--COMMENT BODY-->
                            <div class="card-body">
                                <p class="card-text">
                                    <?= $comment['content'] ?>
                                </p>

                                <button type="button" class="btn btn-secondary" style="width:100px">
                                    <a href="/comments/remove/<?= $comment['id'] ?>">Supprimer</a>
                                </button>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <!-- ADD COMMENT -->

                    <form class="addComment col-lg-8" action="/comments/add/<?= $article['id'] ?>" method="POST">
                    
                        <fieldset>

                            <legend>Ajouter un commentaire</legend>

                            <div class="form-group">
                                <label for="content" class="form-label mt-4">Entrez votre commentaire :</label>
                                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                            </div>

                        </fieldset>

                        <button type="submit" class="btn btn-primary">Envoyer votre commentaire</button>

                    </form>

            </section>

        </section>

    </div>
</div>