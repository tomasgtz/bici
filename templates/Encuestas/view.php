<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Encuesta $encuesta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Encuesta'), ['action' => 'edit', $encuesta->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Encuesta'), ['action' => 'delete', $encuesta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $encuesta->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Encuestas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Encuesta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="encuestas view content">
            <h3><?= h($encuesta->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Utiliza Bicileta') ?></th>
                    <td><?= h($encuesta->utiliza_bicileta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fub Ocio Deportiva') ?></th>
                    <td><?= h($encuesta->fub_ocio_deportiva) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fub Transporte') ?></th>
                    <td><?= h($encuesta->fub_transporte) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fub Ir Trabajar') ?></th>
                    <td><?= h($encuesta->fub_ir_trabajar) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Sacar Meter Domicilio') ?></th>
                    <td><?= h($encuesta->idd_sacar_meter_domicilio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd No Transporte Publico') ?></th>
                    <td><?= h($encuesta->idd_no_transporte_publico) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Robo Estacionada') ?></th>
                    <td><?= h($encuesta->idd_robo_estacionada) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Dificultad Estacionada Seguro') ?></th>
                    <td><?= h($encuesta->idd_dificultad_estacionada_seguro) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Falta Ciclovia') ?></th>
                    <td><?= h($encuesta->idd_falta_ciclovia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Vias Alto Flujo') ?></th>
                    <td><?= h($encuesta->idd_vias_alto_flujo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Invacion Ciclovias Peatones Coches') ?></th>
                    <td><?= h($encuesta->idd_invacion_ciclovias_peatones_coches) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Conflictos Conductores Automoviles Motos Autobuses') ?></th>
                    <td><?= h($encuesta->idd_conflictos_conductores_automoviles_motos_autobuses) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Conflictos Peatones No Respetan') ?></th>
                    <td><?= h($encuesta->idd_conflictos_peatones_no_respetan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd No Conocer Normas') ?></th>
                    <td><?= h($encuesta->idd_no_conocer_normas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Conflictos Otros Ciclistas') ?></th>
                    <td><?= h($encuesta->idd_conflictos_otros_ciclistas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Idd Peligro Circulacion Ciudad') ?></th>
                    <td><?= h($encuesta->idd_peligro_circulacion_ciudad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nub No Disponer Bicicleta') ?></th>
                    <td><?= h($encuesta->nub_no_disponer_bicicleta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nub No Condicion Fisica') ?></th>
                    <td><?= h($encuesta->nub_no_condicion_fisica) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nub Sacar Meter Bicileta') ?></th>
                    <td><?= h($encuesta->nub_sacar_meter_bicileta) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nub Imagen Social') ?></th>
                    <td><?= h($encuesta->nub_imagen_social) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nub No Poder Llevar Bici Transporte') ?></th>
                    <td><?= h($encuesta->nub_no_poder_llevar_bici_transporte) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nub Conflictos Conductores Autobuses') ?></th>
                    <td><?= h($encuesta->nub_conflictos_conductores_autobuses) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nub Conflictos Peatones') ?></th>
                    <td><?= h($encuesta->nub_conflictos_peatones) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nub Conflictos Otros Ciclistas') ?></th>
                    <td><?= h($encuesta->nub_conflictos_otros_ciclistas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nub Peligro Circulacion Ciudad') ?></th>
                    <td><?= h($encuesta->nub_peligro_circulacion_ciudad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ip') ?></th>
                    <td><?= h($encuesta->ip) ?></td>
                </tr>
                <tr>
                    <th><?= __('Coordenadas') ?></th>
                    <td><?= h($encuesta->coordenadas) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($encuesta->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($encuesta->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Beneficios Considera') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($encuesta->beneficios_considera)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
