<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
</head>

<nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <strong><h1><a href="http://localhost:8080/Theehuis/code/users/">HET THEEHUIS</a></h1></strong>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a href="http://localhost:8080/Theehuis/code/users/">Users</a></li>
                <li><a href="http://localhost:8080/Theehuis/code/dishes/">Gerechten</a></li>
                <li><a href="http://localhost:8080/Theehuis/code/menus">Menus</a></li>
                <li><a href="http://localhost:8080/Theehuis/code/category">Categorie</a></li>
                <li><a href="http://localhost:8080/Theehuis/code/users/login/">Login</a></li>
                <li><a href="http://localhost:8080/Theehuis/code/users/logout">Logout</a></li>
            </ul>
        </div>
    </nav>
<body class="home">
<div class="layout">
      <div class="layout-image"><br><br>
<?php
require(dirname(__FILE__)."/../config.php");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Dishes
$sql = "SELECT id, title, content, price, category FROM dishes";
$resultdish = $conn->query($sql);
// Menus
$sqlmenu = "SELECT id, title, content FROM menus";
$resultmenu = $conn->query($sqlmenu);

$sqlmenutitel = "SELECT title FROM menus";
$resultmenutitel = $conn->query($sqlmenutitel);

// Category
$sqlcat = "SELECT id, title, menu FROM category";
$resultscat = $conn->query($sqlcat);



// LUNCH

$sqlselectmenu = "SELECT id, title, menu FROM category WHERE menu = 'Lunch'";
$resultselectmenu = $conn->query($sqlselectmenu);

$sqlbroodjes = "SELECT id, title, content, price, category FROM dishes WHERE categoryId ='7'";
$resultbroodjes = $conn->query($sqlbroodjes); 

$sqlsalads = "SELECT id, title, content, price, category FROM dishes WHERE categoryId ='17'";
$resultsalads = $conn->query($sqlsalads); 

$sqlwraps = "SELECT id, title, content, price, category FROM dishes WHERE categoryId ='15'";
$resultwraps = $conn->query($sqlwraps); ?>
<!-- Dinner -->
   <?php

$sqlselectmenu1 = "SELECT id, title, menu FROM category WHERE menu = 'Dinner'";
$resultselectmenu1 = $conn->query($sqlselectmenu1);

$sqldinnerdish = "SELECT id, title, content, price, category FROM dishes WHERE categoryId =id";
$resultdinner = $conn->query($sqldinnerdish);

?>

  <div class="list-group">
    <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong>Lunch</strong></h4><hr>
      <p class="list-group-item-text"><strong>Broodjes</strong></p>
          <?php foreach ($resultbroodjes as $rowbrood): ?>
     <ul><li>  <?= $rowbrood['title'] ?> </br>
 <?= $rowbrood['content'] ?> <br>
  € <?= $rowbrood['price'] ?>  </li></ul>
     <?php endforeach; ?>
    </a>

  <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong></strong></h4>
      <p class="list-group-item-text"><strong>Salades</strong></p>
         <?php foreach ($resultsalads as $rowsalad): ?>
        <ul><li>  <?= $rowsalad['title'] ?> </br>
 <?= $rowsalad['content'] ?> <br>
  € <?= $rowsalad['price'] ?>  </li></ul>
        <?php endforeach; ?>
    </a>
     <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong></strong></h4>
      <p class="list-group-item-text"><strong>Wraps</strong></p>
         <?php foreach ($resultwraps as $rowrap): ?>
        <ul><li>  <?= $rowrap['title'] ?> </br>
 <?= $rowrap['content'] ?> <br>
  € <?= $rowrap['price'] ?>  </li></ul>
        <?php endforeach; ?>
    </a>
  </div>



<div class="list-group">
  <p class="list-group-item  active">
    Lunch
  </p>
  <a href="#" class="list-group-item"><strong>Broodjes</strong></a>
   <?php foreach ($resultbroodjes as $rowbrood): ?>
 <a href="" class="list-group-item">
 <ul><li>  <?= $rowbrood['title'] ?> </br>
 <?= $rowbrood['content'] ?> <br>
  € <?= $rowbrood['price'] ?>  </li></ul>
  <button class="btn btn-primary"> Bestel </button>
   </a>
    <?php endforeach; ?> 
</div>

<div class="list-group">
  <p class="list-group-item  active">
    Dinner
  </p>
  <?php foreach ($resultselectmenu1 as $rowmenuselects): ?>
  <a href="#" class="list-group-item"><strong><?= $rowmenuselects['title'] ?></strong></a>
   <?php foreach ($resultbroodjes as $rowbrood): ?>
 <a href="" class="list-group-item">
 <ul><li>  <?= $rowbrood['title'] ?> </br>
 <?= $rowbrood['content'] ?> <br>
  € <?= $rowbrood['price'] ?>  </li></ul>
  <button class="btn btn-primary"> Bestel </button>
   </a>
    <?php endforeach; ?>
    <?php endforeach; ?>
  </a>
</div>











    </div>
    </div>
    </div>
    </div>
</body>
</html>
