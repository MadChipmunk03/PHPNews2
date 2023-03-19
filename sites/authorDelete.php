<?php

require_once '../vendor/autoload.php';

use Model\Database;
use Model\AuthorsRepository;

$db = new Database();
$aur = new AuthorsRepository($db);

$aur->delete($_GET['id']);

header('Location: authors.php');