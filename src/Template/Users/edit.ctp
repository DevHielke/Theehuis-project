<div class="layout">
      <div class="layout-image"><br><br>
      <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Gebruiker wijzigen</h3>
  </div>
  <div class="panel-body">
   <?php

    echo $this->Form->create($user);
    echo $this->Form->input('name');
 	echo $this->Form->input('email');
 	echo $this->Form->input('password');
 	echo $this->Form->input('password2');			
    echo $this->Form->button(__('Save'));
    echo $this->Form->end();
?>
  </div>
</div>


</div>
</div>