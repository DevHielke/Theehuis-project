
  <div class="layout">
      <div class="layout-image"><br><br>
      <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Gerechten</h3>
  </div>
  <div class="panel-body">
 <p><?= $this->Html->link('Gerecht toevoegen', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Prijs</th>
        <th>Gerecht</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $dishs query object, printing out topic info -->

    <?php foreach ($dishes as $dish): ?>
    <tr>
        <td><?= $dish->id ?></td>
         <td><?= $dish->price ?></td>
        <td>
            <?= $this->Html->link($dish->title, ['action' => 'view', $dish->id]) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Verwijder',
                ['action' => 'delete', $dish->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Wijzig', ['action' => 'edit', $dish->id]) ?>
        </td>
    </tr>
  <?php endforeach; ?>
    <tr>
    <?php // if ($this->request->session()->read('Auth.User')){ ?>
        <td><?php  //<?= $this->Html->Link(__('Log out'),['controller'=>'users','action'=>'logout']) ?>  </td>
    <?php// }else{  ?>
        <td><?php // <?= $this->Html->Link(__('Login'),['controller'=>'users','action'=>'login']) ?>  </td>  
    <?php// } ?>
    
    </tr>
</table>
  </div>
</div>
</div>
</div>