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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $encuesta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $encuesta->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Encuestas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="encuestas form content">
            <?= $this->Form->create($encuesta) ?>
            <fieldset>
                <legend><?= __('Edit Encuesta') ?></legend>
                <?php
                    echo $this->Form->control('utiliza_bicileta');
                    echo $this->Form->control('beneficios_considera');
                    echo $this->Form->control('fub_ocio_deportiva');
                    echo $this->Form->control('fub_transporte');
                    echo $this->Form->control('fub_ir_trabajar');
                    echo $this->Form->control('idd_sacar_meter_domicilio');
                    echo $this->Form->control('idd_no_transporte_publico');
                    echo $this->Form->control('idd_robo_estacionada');
                    echo $this->Form->control('idd_dificultad_estacionada_seguro');
                    echo $this->Form->control('idd_falta_ciclovia');
                    echo $this->Form->control('idd_vias_alto_flujo');
                    echo $this->Form->control('idd_invacion_ciclovias_peatones_coches');
                    echo $this->Form->control('idd_conflictos_conductores_automoviles_motos_autobuses');
                    echo $this->Form->control('idd_conflictos_peatones_no_respetan');
                    echo $this->Form->control('idd_no_conocer_normas');
                    echo $this->Form->control('idd_conflictos_otros_ciclistas');
                    echo $this->Form->control('idd_peligro_circulacion_ciudad');
                    echo $this->Form->control('nub_no_disponer_bicicleta');
                    echo $this->Form->control('nub_no_condicion_fisica');
                    echo $this->Form->control('nub_sacar_meter_bicileta');
                    echo $this->Form->control('nub_imagen_social');
                    echo $this->Form->control('nub_no_poder_llevar_bici_transporte');
                    echo $this->Form->control('nub_conflictos_conductores_autobuses');
                    echo $this->Form->control('nub_conflictos_peatones');
                    echo $this->Form->control('nub_conflictos_otros_ciclistas');
                    echo $this->Form->control('nub_peligro_circulacion_ciudad');
                    echo $this->Form->control('ip');
                    echo $this->Form->control('coordenadas');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
