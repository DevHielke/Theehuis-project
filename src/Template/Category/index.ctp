
  <div class="layout">
      <div class="layout-image"><br><br>
      <div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Categorie</h3>
  </div>
  <div class="panel-body">
 <p><?= $this->Html->link('Categorie toevoegen', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Titel</th>
        <th>Menu</th>
        <th></th>
    </tr>

<!-- Here's where we loop through our $cats query object, printing out  info -->

    <?php foreach ($category as $cat): ?>
    <tr>
        
        <td>
            <?= $this->Html->link($cat->title, ['action' => 'view', $cat->id]) ?>
        </td>
        <td><?= $cat->menu ?></td>
        <td>
            <?= $this->Form->postLink(
                'Verwijder',
                ['action' => 'delete', $cat->id],
                ['confirm' => 'Are you sure?'])
            ?>
         <?= $this->Html->link('Wijzig', ['action' => 'edit', $cat->id]) ?>
        </td>
    </tr>
  <?php endforeach; ?>
    <tr>
    </tr>
</table>

  </div>
</div>
</div>
</div>