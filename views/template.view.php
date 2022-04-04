<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="https://bootswatch.com/5/slate/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/template.css">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= URL ?>accueil">BiblioTech</a>
            <button class="navbar-toggler burger-menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active accueil-nav px-3" href="<?= URL ?>accueil">Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active livres-nav px-3" href="<?= URL ?>livres">Livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active films-nav px-3" href="<?= URL ?>films">Films</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active series-nav px-3" href="<?= URL ?>series">Series</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row text-center  justify-content-center text-light">
       <h1 class="rounded p-2 m-4 bg-primary col-8 titre-page "><?= $titre ?></h1>
       </div>
        <?= $content ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>