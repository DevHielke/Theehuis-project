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


// DINNER   WHERE email='$emailid'";

$sqlselectmenu = "SELECT id, title, menu FROM category WHERE menu = 'Dessert'";
$resultselectmenu = $conn->query($sqlselectmenu);


?>
       <?php foreach ($resultmenu as $rowmenu): ?>
     <p> <?= $rowmenu['title'] ?> 
         <?php //    <?= $this->Html->link($menu->title, ['action' => 'view', $menu->id]) ?>  </p>
  
      <?php endforeach; ?>







<?php foreach ($resultmenu as $rowmenu): ?>
<div class="list-group">
  <p class="list-group-item  active">
    <?= $rowmenu['title'] ?>
  </p>
  <?php foreach ($resultscat as $rowcat): ?>
  <a href="#" class="list-group-item"><strong><?= $rowcat['title'] ?></strong></a>
   <?php foreach ($resultdish as $rowdish): ?>
 <a href="" class="list-group-item">
 <ul><li><?= $rowdish['title'] ?></li></ul> </a>
    <?php endforeach; ?>
    <?php endforeach; ?>
  </a>
</div>
  <?php endforeach; ?>




<br><br>
 <!--  
  DISHES
  -->
 <?php foreach ($resultdish as $row): ?>
    <div class="panel panel-default">
  <div class="panel-body">
    <h3 class="panel-title"><?= $row['title'] ?></h3>
  </div>
  <div class="panel-body">
         <p>Prijs: <?= $row['price'] ?> </o><br>
      <p> Beschrijving:  <td><?= $row['content'] ?> </p>
       <p> Categorie:  <td><?= $row['category'] ?> </p>
        <?php //echo " " . $row["id"]. ": " . $row["title"]. " " . $row["content"]. ": " . $row["price"].  "<br>"; ?></td>
      </div>
</div>
  <?php endforeach; ?>

 <!--  
  MENUS
  -->
 <?php foreach ($resultmenu as $rowmenu): ?>
    <div class="panel panel-default">
  <div class="panel-body">
    <h3 class="panel-title"><?= $rowmenu['title'] ?></h3>
  </div>
  <div class="panel-body">  
      <p> Beschrijving:  <td><?= $rowmenu['content'] ?> </p>
      </div>
</div>
  <?php endforeach; ?>
 <!--  
  CATEGORY
  -->
 <?php foreach ($resultscat as $rowcat): ?>
    <div class="panel panel-default">
  <div class="panel-body">
    <h3 class="panel-title"><?= $rowcat['title'] ?></h3>
  </div>
  <div class="panel-body">  
      <p> Menu:  <td><?= $rowcat['menu'] ?> </p>
      </div>
</div>
  <?php endforeach; ?>
    </div>
    </div>
    </div>
    </div>
</body>
</html>
