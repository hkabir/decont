<td><?= $this->Number->format($type->id) ?></td>
<td><?= h($type->name) ?> </td>
<td><?= $this->Html->link('Editare', ['action' => 'edit', $type->id], ['class' => 'btn btn-primary']) ?> | <?= $this->Form->postLink('Sterge', ['action' => 'delete', $type->id], ['class' => 'btn btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $type->id)]) ?> </td>
