<!-- File: src/Template/Topics/edit.ctp -->
 <?php

require(dirname(__FILE__)."/../config.php");

  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqlcat = "SELECT id, title, content FROM category";
$resultscat = $conn->query($sqlcat);
?>

 <div class="layout">
      <div class="layout-image"><br><br>
      <div class="panel panel-primary">
  <div class="panel-heading">

    <h3 class="panel-title">Wijzig gerecht</h3>
  </div>
 <div class="panel-body">
<?php
    echo $this->Form->create($dishes);
    echo $this->Form->input('title');
    echo $this->Form->input('price');
?>
        <label>Categorie</label>
    <select name="category">
<?php foreach ($resultscat as $rowcat): ?>
    <option value=<?= $rowcat['title'] ?>> <?= $rowcat['title'] ?> </option>
 <?php endforeach; ?>
</select>

  
 <?php

    if (!empty ($selectOption)) {
     $selectOption = $_POST['category']; 
    }

    echo $this->Form->input('content', ['rows' => '3']);	
    echo $this->Form->button(__('Wijzig gerecht'));
    echo $this->Form->end();
?>
  </div>
</div>
</div>
</div>