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
                <li><a href="http://localhost:8080/Theehuis/code/users/">Gebruikers</a></li>
                <li><a href="http://localhost:8080/Theehuis/code/menus">Menus</a></li>
                <li><a href="http://localhost:8080/Theehuis/code/category">Categorie</a></li>
                 <li><a href="http://localhost:8080/Theehuis/code/dishes/">Gerechten</a></li>
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


// LUNCH

$sqlbroodjes = "SELECT id, title, content, price, category FROM dishes WHERE category ='Broodjes'";
$resultbroodjes = $conn->query($sqlbroodjes); 

$sqlsalads = "SELECT id, title, content, price, category FROM dishes WHERE category ='Salades'";
$resultsalads = $conn->query($sqlsalads); 

$sqlwraps = "SELECT id, title, content, price, category FROM dishes WHERE category ='Wraps'";
$resultwraps = $conn->query($sqlwraps); 

$sqlclubs = "SELECT id, title, content, price, category FROM dishes WHERE category ='Clubs'";
$resultclubs = $conn->query($sqlclubs); 

$sqlsoep = "SELECT id, title, content, price, category FROM dishes WHERE category ='Soep'";
$resultsoep = $conn->query($sqlsoep); 

$sqlwarm = "SELECT id, title, content, price, category FROM dishes WHERE category ='Warm'";
$resultwarm = $conn->query($sqlwarm); 

$sqlkids = "SELECT id, title, content, price, category FROM dishes WHERE category ='Kids'";
$resultkids = $conn->query($sqlkids); 

$sqlstevig = "SELECT id, title, content, price, category FROM dishes WHERE category ='Stevigehap'";
$resultstevig = $conn->query($sqlstevig); ?>
<!-- Dinner -->
   <?php
$sqlvoorgerecht = "SELECT id, title, content, price, category FROM dishes WHERE category ='Voorgerechten'";
$resultvoorgerecht = $conn->query($sqlvoorgerecht); 

$sqlhoofdgerecht = "SELECT id, title, content, price, category FROM dishes WHERE category ='Hoofdgerechten'";
$ressulthoofdgerechten = $conn->query($sqlhoofdgerecht);
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
        <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong></strong></h4>
      <p class="list-group-item-text"><strong>Clubs</strong></p>
         <?php foreach ($resultclubs as $clubs): ?>
        <ul><li>  <?= $clubs['title'] ?> </br>
 <?= $clubs['content'] ?> <br>
  € <?= $clubs['price'] ?>  </li></ul>
        <?php endforeach; ?>
    </a>
      <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong></strong></h4>
      <p class="list-group-item-text"><strong>Soep</strong></p>
         <?php foreach ($resultsoep as $soep): ?>
        <ul><li>  <?= $soep['title'] ?> </br>
 <?= $soep['content'] ?> <br>
  € <?= $soep['price'] ?>  </li></ul>
        <?php endforeach; ?>
    </a>

       <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong></strong></h4>
      <p class="list-group-item-text"><strong>Warm</strong></p>
         <?php foreach ($resultwarm as $warmm): ?>
        <ul><li>  <?= $warmm['title'] ?> </br>
 <?= $warmm['content'] ?> <br>
  € <?= $warmm['price'] ?>  </li></ul>
        <?php endforeach; ?>
    </a>
       <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong></strong></h4>
      <p class="list-group-item-text"><strong>Kids</strong></p>
         <?php foreach ($resultkids as $kids): ?>
        <ul><li>  <?= $kids['title'] ?> </br>
 <?= $kids['content'] ?> <br>
  € <?= $kids['price'] ?>  </li></ul>
        <?php endforeach; ?>
    </a>

         <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong></strong></h4>
      <p class="list-group-item-text"><strong>Stevige hap</strong></p>
         <?php foreach ($resultstevig as $stevig): ?>
        <ul><li>  <?= $stevig['title'] ?> </br>
 <?= $stevig['content'] ?> <br>
  € <?= $stevig['price'] ?>  </li></ul>
        <?php endforeach; ?>
    </a>
  </div>

<!-- DINNER -->

    <div class="list-group">
    <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong>Dinner</strong></h4><hr>
      <p class="list-group-item-text"><strong>Voorgerechten</strong></p>
          <?php foreach ($resultvoorgerecht as $voorgerecht): ?>
     <ul><li>  <?= $voorgerecht['title'] ?> </br>
 <?= $voorgerecht['content'] ?> <br>
  € <?= $voorgerecht['price'] ?>  </li></ul>
     <?php endforeach; ?>
    </a>

  <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong></strong></h4>
      <p class="list-group-item-text"><strong>Hoofdgerechten</strong></p>
         <?php foreach ($ressulthoofdgerechten as $hoofdgerecht): ?>
        <ul><li>  <?= $hoofdgerecht['title'] ?> </br>
 <?= $hoofdgerecht['content'] ?> <br>
  € <?= $hoofdgerecht['price'] ?>  </li></ul>
        <?php endforeach; ?>
    </a>
  </div>
    <div class="list-group">
    <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading"><strong>Dinner</strong></h4><hr>
      <p class="list-group-item-text"><strong>Kijk voor de actuele desserts
op de borden in het paviljoen
</strong></p>
          
    </a></div>
        

    </div>
    </div>
    </div>
    </div>
</body>
</html>

