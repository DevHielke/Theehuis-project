<!-- File: src/Template/Topics/edit.ctp -->
 <?php

require(dirname(__FILE__)."/../config.php");

  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqlmenu = "SELECT id, title  FROM menus";
$resultsmenu = $conn->query($sqlmenu);
?>

 <div class="layout">
      <div class="layout-image"><br><br>
      <div class="panel panel-primary">
  <div class="panel-heading">

    <h3 class="panel-title">Wijzig Categorie </h3>
  </div>
 <div class="panel-body">
<?php
    echo $this->Form->create($category);
    echo $this->Form->input('title');
?>
        <label>Menu</label>
    <select name="menu">
<?php foreach ($resultsmenu as $rowmenu): ?>
    <option value=<?= $rowmenu['title'] ?>> <?= $rowmenu['title'] ?> </option>
 <?php endforeach; ?>
</select>

  
 <?php

    if (!empty ($selectOption)) {
     $selectOption = $_POST['category']; 
    }

    echo $this->Form->input('content', ['rows' => '3']);	
    ?> <br> <?php
    echo $this->Form->button(__('Wijzig gerecht'));
    echo $this->Form->end();
?>
  </div>
</div>
</div>
</div>