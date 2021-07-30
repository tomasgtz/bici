<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Persona $persona
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Persona'), ['action' => 'edit', $persona->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Persona'), ['action' => 'delete', $persona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Personas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Persona'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="personas view content">
            <h3><?= h($persona->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($persona->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido Paterno') ?></th>
                    <td><?= h($persona->apellido_paterno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido Materno') ?></th>
                    <td><?= h($persona->apellido_materno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Curp') ?></th>
                    <td><?= h($persona->curp) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo') ?></th>
                    <td><?= h($persona->correo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cp') ?></th>
                    <td><?= h($persona->cp) ?></td>
                </tr>
                <tr>
                    <th><?= __('Calle') ?></th>
                    <td><?= h($persona->calle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero Interior') ?></th>
                    <td><?= h($persona->numero_interior) ?></td>
                </tr>
                <tr>
                    <th><?= __('Foto Bici') ?></th>
                    <td><?= h($persona->foto_bici) ?></td>
                </tr>
                <tr>
                    <th><?= __('Identificacion') ?></th>
                    <td><?= h($persona->identificacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Identificacion Menor') ?></th>
                    <td><?= h($persona->identificacion_menor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($persona->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero Exterior') ?></th>
                    <td><?= $this->Number->format($persona->numero_exterior) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($persona->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
