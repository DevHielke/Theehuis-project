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
  <?php foreach ($optionscat as $cat): ?>
    <option value=<?=  $cat['title'] ?>> <?= $cat['title'] ?> </option>
  <?php endforeach; ?>
</select>
   <label>Menu</label>
    <select name="menu">
  <?php foreach ($options as $option): ?>
    <option value=<?=  $option['title'] ?>> <?= $option['title'] ?> </option>
  <?php endforeach; ?>
</select>


<?php foreach ($optionscat as $cat): ?>
<input type="hidden" name="categoryId" value=<?= $cat['id'] ?> />
   <?php endforeach; ?>
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