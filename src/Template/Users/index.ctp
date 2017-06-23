<div class="layout">
      <div class="layout-image">
      <br><br>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Beheer gebruikers</h3>
  </div>
  <div class="panel-body">
  <p><?= $this->Html->link('Gebruiker toevoegen', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>


    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
        <td>
            <?= $this->Html->link($user->email, ['action' => 'view', $user->id]) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Verwijder',
                ['action' => 'delete', $user->id],
                ['confirm' => __('Wil je deze gebruiker echt verwijderen?  id # {0}?',$user->id)])
            ?>
            <?= $this->Html->link('Wijzig', ['action' => 'edit', $user->id])?>
        </td>
    </tr>
    <?php endforeach; ?>

</table>
  </div>
</div>

</div>
</div>