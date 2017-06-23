<div class="layout">
      <div class="layout-image"><br><br>
      <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Menu toevoegen</h3>
  </div>
  <div class="panel-body">
	<?php
	echo $this->Form->create($menus);
	echo $this->Form->input('title');
	echo $this->Form->input('content', ['rows' => '3']);
	//echo $this->Form->input('tags'); 
	//echo $this->Form->input('author');   
	echo $this->Form->button(__('Save Menu'));
	echo $this->Form->end();
	?>
	</div>
	</div>
	</div>
	</div>
