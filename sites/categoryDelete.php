<?php

require_once '../vendor/autoload.php';

use Model\Database;
use Model\CategoriesRepository;

$db = new Database();
$cr = new CategoriesRepository($db);

$cr->delete(intval($_GET['id']));

header('Location: categories.php');
die;