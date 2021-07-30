<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Persona[]|\Cake\Collection\CollectionInterface $personas
 */
?>
<div class="personas index content">
    <?= $this->Html->link(__('New Persona'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Personas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('apellido_paterno') ?></th>
                    <th><?= $this->Paginator->sort('apellido_materno') ?></th>
                    <th><?= $this->Paginator->sort('curp') ?></th>
                    <th><?= $this->Paginator->sort('sexo') ?></th>
                    <th><?= $this->Paginator->sort('correo') ?></th>
                    <th><?= $this->Paginator->sort('cp') ?></th>
                    <th><?= $this->Paginator->sort('calle') ?></th>
                    <th><?= $this->Paginator->sort('numero_exterior') ?></th>
                    <th><?= $this->Paginator->sort('numero_interior') ?></th>
                    <th><?= $this->Paginator->sort('foto_bici') ?></th>
                    <th><?= $this->Paginator->sort('identificacion') ?></th>
                    <th><?= $this->Paginator->sort('identificacion_menor') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personas as $persona): ?>
                <tr>
                    <td><?= $this->Number->format($persona->id) ?></td>
                    <td><?= h($persona->nombre) ?></td>
                    <td><?= h($persona->apellido_paterno) ?></td>
                    <td><?= h($persona->apellido_materno) ?></td>
                    <td><?= h($persona->curp) ?></td>
                    <td><?= h($persona->sexo) ?></td>
                    <td><?= h($persona->correo) ?></td>
                    <td><?= h($persona->cp) ?></td>
                    <td><?= h($persona->calle) ?></td>
                    <td><?= $this->Number->format($persona->numero_exterior) ?></td>
                    <td><?= h($persona->numero_interior) ?></td>
                    <td><?= h($persona->foto_bici) ?></td>
                    <td><?= h($persona->identificacion) ?></td>
                    <td><?= h($persona->identificacion_menor) ?></td>
                    <td><?= h($persona->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $persona->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $persona->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
