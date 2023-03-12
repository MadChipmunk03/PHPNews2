<?php
    require_once 'vendor/autoload.php';

    use Model\Database;
    use Model\ArticlesRepository;

    $db = new Database();
    $arr = new ArticlesRepository($db);

    $tabsNames = ['Články', 'Kategorie', 'Autoři', 'Administrace článků', 'Přidat Článek'];
    $tabsUrls = ['articles', 'categories', 'authors', 'manage-articles', 'add-article'];

    $URIArgs = explode("/", $_SERVER['REQUEST_URI']);
    $currentTab = end($URIArgs);
    if($currentTab == '') $currentTab = $tabsUrls[0] . '.php';

    $articles = $arr->getAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/global.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <header>
        <nav class="py-2 px-4 my-bg-primary mb-4">
            <div class="row">
                <div class="col"></div>
                <div class="col-8 d-flex justify-content-start">
                    <?php for($i = 0; $i < count($tabsNames); $i++):
                        $isCurrent = $currentTab == $tabsUrls[$i] . '.php';
                        ?>
                        <a href="<?= $tabsUrls[$i] ?>" class="mx-2 text-decoration-none <?= $isCurrent ? 'text-white' : 'text-muted' ?> position-relative">
                            <?= $tabsNames[$i] ?>
                            <?php if($isCurrent): ?>
                                <svg width="1em" height="1em" class="position-absolute top-100 start-50 translate-middle mt-1" fill="#FFF"><path d="M 2.451 12.14 L 7.247 5.48 L 12.043 12.14 L 2.451 12.14"/></svg>
                            <?php endif; ?>
                        </a>
                    <?php endfor; ?>
                </div>
                <div class="col"></div>
            </div>
        </nav>
    </header>

    <main>
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <h1 class="mt-4 my-primary-text">Články</h1>
                <p class="text-secondary">Nejnovější zprávy z IT</p>
                <?php foreach($articles as $article):
                    $date = new DateTime($article['published']);
                    $date = $date->format('d.m.Y h:i');
                    ?>
                    <a href="" class="text-decoration-none">
                        <section class="article">
                            <h3 class="article-title my-primary-text"><?= $article['title'] ?></h3>
                            <div class="d-flex justify-content-start">
                                <p class="text-secondary"><?= $date ?></p>
                                <a href="" class="mx-2 text-decoration-none my-primary-text"><?= $article['author'] ?></a>
                            </div>
                            <p class="article-text"><?= $article['text'] ?></p>
                            <div class="text-end">
                                <a href="" class="text-decoration-none my-primary-text">číst dál 🡆</a>
                            </div>
                        </section>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="col"></div>
        </div>
    </main>
</body>
</html>