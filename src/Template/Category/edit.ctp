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
  <?php foreach ($options as $option): ?>
    <option value=<?=  $option['title'] ?>> <?= $option['title'] ?> </option>
  <?php endforeach; ?>
</select>

  
 <?php

    if (!empty ($selectOption)) {
     $selectOption = $_POST['category']; 
    }
    ?> <br> <?php
    echo $this->Form->button(__('Wijzig gerecht'));
    echo $this->Form->end();
?>
  </div>
</div>
</div>
</div>