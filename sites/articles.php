<?php

    require_once '../vendor/autoload.php';
    require_once '../navbarTabs.php';

    /**
     * @var $tabsNames
     * @var $tabsUrls
     * @var $currentTab
     */

    use Model\Database;
    use Model\ArticlesRepository;

    $db = new Database();
    $arr = new ArticlesRepository($db);

    $articles = $arr->getAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Články</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/global.css">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<header>
    <nav class="py-2 px-4 my-bg-primary mb-4">
        <div class="row">
            <div class="col"></div>
            <div class="col-8 d-flex justify-content-start">
                <?php for($i = 0; $i < count($tabsNames); $i++):
                    $isCurrent = $currentTab == $tabsUrls[$i];
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
    <div class="row m-0">
        <div class="col"></div>
        <div class="col-8">
            <h2>Články</h2>
            <table class="table table-striped">
                <tr class="my-primary-bg">
                    <th class="text-white">Id</th>
                    <th class="text-white">Titulek</th>
                    <th class="text-white">Autor</th>
                    <th class="text-white">Kategorie</th>
                    <th class="text-center text-white">Akce</th>
                </tr>
                <?php foreach($articles as $article): ?>
                    <tr>
                        <td><?= $article['id'] ?></td>
                        <td><?= $article['title'] ?></td>
                        <td>
                            <a href="authorForm.php?id=<?= $article['author_id'] ?>"><?= $article['author'] ?></a>
                        </td>
                        <td>
                            <a href="categoryForm.php?id=<?= $article['category_id'] ?>"><?= $article['category'] ?></a>
                        </td>
                        <td class="text-center">
                            <a href="articleForm.php?id=<?= $article['id'] ?>" class="text-decoration-none">✏</a>
                            <a href="articleDelete.php?id=<?= $article['id'] ?>" class="text-decoration-none">❌</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="text-end">
                <a href="articleForm.php">
                    <button class="btn btn-primary">Přidat</button>
                </a>
            </div>
        </div>
        <div class="col"></div>
    </div>
</main>
</body>
</html>
