
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
        <th>Gerecht</th>
        <th>Prijs</th>
        <th>Category</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $dishs query object, printing out topic info -->

    <?php foreach ($dishes as $dish): ?>
    <tr>
        <td>
            <?= $this->Html->link($dish->title, ['action' => 'view', $dish->id]) ?>
        </td>
        </td>
         <td>€ <?= $dish->price ?></td>
        <td>
          <?= $dish->category ?>
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
</table>
  </div>
</div>
</div>
</div>