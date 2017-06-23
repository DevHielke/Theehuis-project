<!-- File: src/Template/Topics/edit.ctp -->
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
    echo $this->Form->input('content', ['rows' => '3']);	
    echo $this->Form->button(__('Wijzig gerecht'));
    echo $this->Form->end();
?>
  </div>
</div>
</div>
</div>