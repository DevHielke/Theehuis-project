 <div class="layout">
      <div class="layout-image"><br><br>
      <div class="panel panel-primary">
  <div class="panel-heading">

    <h3 class="panel-title">Wijzig menu</h3>
  </div>
 <div class="panel-body">
<?php
    echo $this->Form->create($menu);
    echo $this->Form->input('Title');
    echo $this->Form->input('Beschrijving', ['rows' => '3']);
    //echo //$this->Form->input('tags');	
    //echo $this->Form->input('author');	
    echo $this->Form->button(__('Maak menu'));
    echo $this->Form->end();
?>
  </div>
</div>
</div>
</div>