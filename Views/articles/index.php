<section class="articles pt-lg-2">
    
    <h1>Les derniers articles</h1>

    <div class="articles-container col-lg-8">

        <?php foreach ($articles as $article) : ?>

            <article class="col-lg-4 p-lg-4">

                <h2><?= $article['title'] ?></h2>

                <?php foreach ($users as $user) : ?>

                    <?php if ($article['users_id'] == $user['id']) : ?>
                        <p>
                            <?= 'Posté par ' . $user['pseudo'] . ' le ' . date('d/m/Y à H:i', strtotime($article['date'])) ?>
                        </p>
                    <?php endif; ?>


                <?php endforeach; ?>


                <?php foreach ($categories as $categorie) : ?>

                    <?php if ($article['categories_id'] == $categorie['id']) : ?>

                        <p>Dans :
                            <?=' '. $categorie['name'] ?>
                        </p>

                    <?php endif; ?>


                <?php endforeach; ?>

                <p><?= substr($article['content'], 0, 560) ?>...</p>

                <a href="articles/read/<?= $article['id'] ?>">Lire la suite</a>

            </article>

        <?php endforeach; ?>


    </div>

</section>