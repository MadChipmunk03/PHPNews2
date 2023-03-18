<?php

$tabsNames = ['Články', 'Kategorie', 'Autoři', 'Administrace článků', 'Přidat Článek'];
$tabsUrls = ['main.php', 'categories.php', 'authors.php', 'articles.php', 'articleForm.php'];

$URIArgs = explode("/", $_SERVER['REQUEST_URI']);
$currentTab = end($URIArgs);
if($currentTab == '') $currentTab = $tabsUrls[0];