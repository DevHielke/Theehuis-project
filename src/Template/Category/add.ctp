 <div class="layout">
      <div class="layout-image"><br><br>
     <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Categorie toevoegen</h3>
  </div>
  <div class="panel-body">
 <form action='' method='post'>
  <?php
    echo $this->Form->create($category);
    echo $this->Form->input('title'); ?>

     <label>Menu</label>
    <select name="menu">
  <?php foreach ($options as $option): ?>
    <option value=<?=  $option['title'] ?>> <?= $option['title'] ?> </option>
  <?php endforeach; ?>
</select>
<?php
    echo $this->Form->button(__('Maak categorie'));
    echo $this->Form->end();
?>


</form>
</div>
</div>
</div>
</div>

