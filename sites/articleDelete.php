<?php

require_once '../vendor/autoload.php';

use Model\Database;
use Model\ArticlesRepository;

$db = new Database();
$arr = new ArticlesRepository($db);

$arr->delete($_GET['id']);

header('Location: articles.php');
die;