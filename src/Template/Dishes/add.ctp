
 <div class="layout">
      <div class="layout-image"><br><br>
     <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Gerecht toevoegen</h3>
  </div>
  <div class="panel-body">
  <form action='' method='post'>
<?php
require(dirname(__FILE__)."/../config.php");

  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqlcat = "SELECT id, title FROM category";
$resultscat = $conn->query($sqlcat);

$sqlmenu = "SELECT id, title FROM menus";
$resultsmenu = $conn->query($sqlmenu);



    echo $this->Form->create($dishes);
    echo $this->Form->input('title');
    echo $this->Form->input('price'); 

    ?>


   <?php //echo $this->Form->input('category'); ?>

    <label>Categorie</label>
    <select name="category">
<?php foreach ($resultscat as $rowcat): ?>
   <option value=<?= $rowcat['title'] ?>> <?= $rowcat['title'] ?> </option>
 <?php endforeach; ?>
</select>

  <label>Menu</label>
      <select name="menu">
<?php foreach ($resultsmenu as $rowmenu): ?>
   <option value=<?= $rowmenu['title'] ?>> <?= $rowmenu['title'] ?> </option>
 <?php endforeach; ?>
</select>


<?php foreach ($resultscat as $rowcat): ?>
<input type="hidden" name="categoryId" value=<?= $rowcat['id'] ?> />
   <?php endforeach; ?>


 <?php

    //var_dump($selectOption);die;
    echo $this->Form->input('content', ['rows' => '3']);
    ?> <br> <?php
    echo $this->Form->button(__('Maak gerecht'));
    echo $this->Form->end();
?>
</form>
</div>
</div>
</div>
</div>

