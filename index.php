<?php
    require_once 'vendor/autoload.php'


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
                    <a class="mx-2 text-decoration-none text-white">Články</a>
                    <a class="mx-2 text-decoration-none text-white">Kategorie</a>
                    <a class="mx-2 text-decoration-none text-white">Autoři</a>
                    <a class="mx-2 text-decoration-none text-white">Administrace článků</a>
                    <a class="mx-2 text-decoration-none text-white">Přidat článek</a>
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
                <section class="article">
                    <h3 class="article-title my-primary-text">Let's Encrypt zablokoval</h3>
                    <div class="d-flex justify-content-start">
                        <p class="text-secondary">11.1.2018</p>
                        <p class="atricle-author my-primary-text">Karel Vágner</p>
                    </div>
                    <p class="article-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus at cupiditate, dolore earum harum ipsum officia perferendis quaerat quam quia quibusdam sunt. Beatae error eveniet ipsam mollitia quisquam sit tempora!</p>
                </section>
                <div class="text-end">
                    <a href="" class="text-decoration-none my-primary-text">číst dál 🡆</a>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </main>
</body>
</html>