<div class="layout">
      <div class="layout-image"><br><br>
      <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Menus</h3>
  </div>
  <div class="panel-body">
	<p><?= $this->Html->link('Menu toevoegen', ['action' => 'add']) ?></p>

	<table>
	    <tr>
	        <th>Id</th>
	        <th>Titel</th>
	       
	        <th></th>
	    </tr>
	 
	<!-- Here's where we loop through our $topics query object, printing out topic info -->
	 
	    <?php foreach ($menus as $menu): ?>
	    <tr>
	        <td><?= $menu->id ?></td>
	        <td>
	            <?= $this->Html->link($menu->title, ['action' => 'view', $menu->id]) ?>
	        </td>
	      
	        <td>
	        	            <?= $this->Form->postLink(
	                'Verwijder',
	                ['action' => 'delete', $menu->id],
	                ['confirm' => 'Are you sure?'])
	            ?>
	            <?= $this->Html->link('Wijzig', ['action' => 'edit', $menu->id]) ?>
	        </td>
	    </tr>
	    <?php endforeach; ?>
	 
	</table>


		</div>
	</div>
	</div>
	</div>

