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
  <div id="content" class="clearfix">
        <div id="items">
            <div id="item1" class="items">
            <h2>Lunch</h2><hr>

               <!--  <?php foreach ($optionscat as $cat): ?>
                  <?=  $cat['title'] ?> <br>
                 <?php endforeach; ?> -->
                 <?php foreach ($optiondish as $dish): ?>
                 <ul><li>
                   <?=  $dish['title'] ?><br>
                   <?= $dish['content'] ?><br>
                   € <?= $dish['price'] ?>
                 </li></ul>
                  <?php endforeach; ?>
            </div>
            <div id="item2" class="items">
                  <h2>Diner</h2><hr>
               <?php foreach ($optiondishes as $dishes): ?>
                  <ul><li>
                   <?=  $dishes['title'] ?><br>
                   <?= $dishes['content'] ?><br>
                   € <?= $dishes['price'] ?>
                 </li></ul>
                  <?php endforeach; ?>
            </div>
            <div id="item3" class="items">
                 <h2>Dessert</h2><hr>
               <?php foreach ($adish as $dish): ?>
                  <ul><li>
                   <?=  $dish['title'] ?><br>
                   <?= $dish['content'] ?><br>
                   € <?= $dish['price'] ?>
                 </li></ul>
                  <?php endforeach; ?>
            </div>
        </div>
</div>
</div>
    </div>
    </div>
    </div>

</body>
</html>

