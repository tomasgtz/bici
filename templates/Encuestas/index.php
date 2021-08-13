<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Encuesta[]|\Cake\Collection\CollectionInterface $encuestas
 */
?>
<div class="encuestas index content">
    <?= $this->Html->link(__('New Encuesta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Encuestas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('utiliza_bicileta') ?></th>
                    <th><?= $this->Paginator->sort('fub_ocio_deportiva') ?></th>
                    <th><?= $this->Paginator->sort('fub_transporte') ?></th>
                    <th><?= $this->Paginator->sort('fub_ir_trabajar') ?></th>
                    <th><?= $this->Paginator->sort('idd_sacar_meter_domicilio') ?></th>
                    <th><?= $this->Paginator->sort('idd_no_transporte_publico') ?></th>
                    <th><?= $this->Paginator->sort('idd_robo_estacionada') ?></th>
                    <th><?= $this->Paginator->sort('idd_dificultad_estacionada_seguro') ?></th>
                    <th><?= $this->Paginator->sort('idd_falta_ciclovia') ?></th>
                    <th><?= $this->Paginator->sort('idd_vias_alto_flujo') ?></th>
                    <th><?= $this->Paginator->sort('idd_invacion_ciclovias_peatones_coches') ?></th>
                    <th><?= $this->Paginator->sort('idd_conflictos_conductores_automoviles_motos_autobuses') ?></th>
                    <th><?= $this->Paginator->sort('idd_conflictos_peatones_no_respetan') ?></th>
                    <th><?= $this->Paginator->sort('idd_no_conocer_normas') ?></th>
                    <th><?= $this->Paginator->sort('idd_conflictos_otros_ciclistas') ?></th>
                    <th><?= $this->Paginator->sort('idd_peligro_circulacion_ciudad') ?></th>
                    <th><?= $this->Paginator->sort('nub_no_disponer_bicicleta') ?></th>
                    <th><?= $this->Paginator->sort('nub_no_condicion_fisica') ?></th>
                    <th><?= $this->Paginator->sort('nub_sacar_meter_bicileta') ?></th>
                    <th><?= $this->Paginator->sort('nub_imagen_social') ?></th>
                    <th><?= $this->Paginator->sort('nub_no_poder_llevar_bici_transporte') ?></th>
                    <th><?= $this->Paginator->sort('nub_conflictos_conductores_autobuses') ?></th>
                    <th><?= $this->Paginator->sort('nub_conflictos_peatones') ?></th>
                    <th><?= $this->Paginator->sort('nub_conflictos_otros_ciclistas') ?></th>
                    <th><?= $this->Paginator->sort('nub_peligro_circulacion_ciudad') ?></th>
                    <th><?= $this->Paginator->sort('ip') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('coordenadas') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($encuestas as $encuesta): ?>
                <tr>
                    <td><?= $this->Number->format($encuesta->id) ?></td>
                    <td><?= h($encuesta->utiliza_bicileta) ?></td>
                    <td><?= h($encuesta->fub_ocio_deportiva) ?></td>
                    <td><?= h($encuesta->fub_transporte) ?></td>
                    <td><?= h($encuesta->fub_ir_trabajar) ?></td>
                    <td><?= h($encuesta->idd_sacar_meter_domicilio) ?></td>
                    <td><?= h($encuesta->idd_no_transporte_publico) ?></td>
                    <td><?= h($encuesta->idd_robo_estacionada) ?></td>
                    <td><?= h($encuesta->idd_dificultad_estacionada_seguro) ?></td>
                    <td><?= h($encuesta->idd_falta_ciclovia) ?></td>
                    <td><?= h($encuesta->idd_vias_alto_flujo) ?></td>
                    <td><?= h($encuesta->idd_invacion_ciclovias_peatones_coches) ?></td>
                    <td><?= h($encuesta->idd_conflictos_conductores_automoviles_motos_autobuses) ?></td>
                    <td><?= h($encuesta->idd_conflictos_peatones_no_respetan) ?></td>
                    <td><?= h($encuesta->idd_no_conocer_normas) ?></td>
                    <td><?= h($encuesta->idd_conflictos_otros_ciclistas) ?></td>
                    <td><?= h($encuesta->idd_peligro_circulacion_ciudad) ?></td>
                    <td><?= h($encuesta->nub_no_disponer_bicicleta) ?></td>
                    <td><?= h($encuesta->nub_no_condicion_fisica) ?></td>
                    <td><?= h($encuesta->nub_sacar_meter_bicileta) ?></td>
                    <td><?= h($encuesta->nub_imagen_social) ?></td>
                    <td><?= h($encuesta->nub_no_poder_llevar_bici_transporte) ?></td>
                    <td><?= h($encuesta->nub_conflictos_conductores_autobuses) ?></td>
                    <td><?= h($encuesta->nub_conflictos_peatones) ?></td>
                    <td><?= h($encuesta->nub_conflictos_otros_ciclistas) ?></td>
                    <td><?= h($encuesta->nub_peligro_circulacion_ciudad) ?></td>
                    <td><?= h($encuesta->ip) ?></td>
                    <td><?= h($encuesta->created) ?></td>
                    <td><?= h($encuesta->coordenadas) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $encuesta->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $encuesta->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $encuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $encuesta->id)]) ?>
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
