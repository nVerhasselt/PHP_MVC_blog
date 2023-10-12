<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Google Font-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!--Bootswatch-->
  <link rel="stylesheet" href="https://bootswatch.com/5/simplex/bootstrap.min.css">

  <!--Font Awesome-->
  <script src="https://kit.fontawesome.com/7bcc19db14.js" crossorigin="anonymous"></script>

  <!--CSS-->
  <link rel="stylesheet" href="/Assets/style.css">

  <title><?= $title = isset($t) ? $t : 'default' ?></title>
</head>


<body>
  <nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="/">Accueil
            </a>
          </li>

          <?php if (isset($articles) && isset($categories)) : ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Catégories</a>
              <div class="dropdown-menu">

                <?php foreach ($categories as $categorie) : ?>

                  <a class="dropdown-item" href="/articles/displaycat/<?= $categorie['id'] ?>"><?= $categorie['name'] ?></a>
                <?php endforeach; ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/articles">Tous les articles</a>
              </div>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="/articles">Articles</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/test/add">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Créer un compte</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Se connecter</a>
          </li>

        </ul>
        <form class="d-flex">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit"> <a href="/articles/add"> Créer un article</a></button>
        </form>

      </div>
    </div>
  </nav>


  <main>

    <?= $content ?>

  </main>

  <footer>
    <div id="reseaux">
      <i class="fa-brands fa-facebook fa-2x"></i>
      <i class="fa-brands fa-square-instagram fa-2x"></i>
      <i class="fa-brands fa-square-twitter fa-2x"></i>
    </div>

    <p>Full Music - Tous droits réservés, 2023</p>

  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>