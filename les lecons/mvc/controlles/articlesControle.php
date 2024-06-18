<?php
require './models/articlesControle.php';

$articles = getListeArticles();

require './views/articlesControle.php';