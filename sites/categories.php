<?php

    require_once '../vendor/autoload.php';
    require_once '../navbarTabs.php';

/**
 * @var $tabsNames
 * @var $tabsUrls
 * @var $currentTab
 */

    use Model\Database;
    use Model\CategoriesRepository;
    use Model\ArticlesRepository;

    $db = new Database();
    $cr = new CategoriesRepository($db);
    $arr = new ArticlesRepository($db);

    $categories = $cr->getAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategorie</title>
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
            <h2>Kategorie</h2>
            <table class="table table-striped">
                <tr class="my-primary-bg">
                    <th class="text-white">Id</th>
                    <th class="text-white">Název</th>
                    <th class="text-white text-center">Akce</th>
                </tr>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td class="text-center">
                            <a href="categoryForm.php?id=<?= $category['id'] ?>" class="text-decoration-none">✏</a>
                            <?php if(intval($category['articleCount']) == 0): ?>
                                <a href="categoryDelete.php?id=<?= $category['id'] ?>" class="text-decoration-none">❌</a>
                            <?php else: echo '✖' ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="text-end">
                <a href="categoryForm.php">
                    <button class="btn btn-primary">Přidat</button>
                </a>
            </div>
        </div>
        <div class="col"></div>
    </div>
</main>

</body>
</html>
