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
    use Model\AuthorsRepository;
    use Model\CategoriesRepository;

    $db = new Database();
    $arr = new ArticlesRepository($db);
    $aur = new AuthorsRepository($db);
    $cr = new CategoriesRepository($db);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(intval($_REQUEST['id']) == 0)
            $arr->add($_REQUEST);
        else
            $arr->update($_REQUEST);

        header('Location: articles.php');
    }
    else {
        if(isset($_REQUEST['id'])) {
            $article = $arr->getById($_REQUEST['id']);
        }

        $authors = $aur->getAll();
        $categories = $cr->getAll();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editor Článku</title>
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
            <form action="articleForm.php" method="post">
                <input type="hidden" name="id" value="<?= $article['id'] ?? 0 ?>">
                <div class="form-group mb-2">
                    <label for="title">Titulek</label>
                    <input class="form-control" type="text" id="title" name="title" value="<?= $article['title'] ?? '' ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="subtitle">Podtitulek</label>
                    <textarea class="form-control" id="subtitle" name="subtitle"><?= $article['subtitle'] ?? '' ?></textarea>
                </div>
                <div class="form-group mb-2">
                    <label for="author_id">Autor</label>
                    <select class="form-select" name="author_id" id="author_id" name="author_id">
                        <?php foreach($authors as $author): ?>
                            <option value="<?= $author['id'] ?>" <?= $author['id'] == ($article['author_id'] ?? 0) ? 'selected' : '' ?>><?= $author['name'] ?> <?= $author['surname'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="category_id">Kategorie</label>
                    <select class="form-select" name="category_id" id="category_id" name="category_id">
                        <?php foreach($categories as $category): ?>
                            <option value="<?= $category['id'] ?>" <?= $category['id'] == ($article['author_id'] ?? 0) ? 'selected' : '' ?>><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="subtitle">Obsah</label>
                    <textarea id="editor" class="mb-2" name="text"><?= $article['text'] ?? '' ?></textarea>
                </div>

                <!-- https://github.com/froala/wysiwyg-editor#load-from-cdn  -->
                <link href="https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js"></script>
                <script> let editor = new FroalaEditor('textarea#editor') </script>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Potvrdit</button>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</main>
</body>
</html>
