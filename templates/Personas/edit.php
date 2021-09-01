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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $persona->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $persona->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Personas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="personas form content">
            <?= $this->Form->create($persona) ?>
            <fieldset>
                <legend><?= __('Edit Persona') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('apellido_paterno');
                    echo $this->Form->control('apellido_materno');
                    echo $this->Form->control('curp');
                    echo $this->Form->control('correo');
                    echo $this->Form->control('cp');
                    echo $this->Form->control('calle');
                    echo $this->Form->control('numero_exterior');
                    echo $this->Form->control('numero_interior');
                    echo $this->Form->control('foto_bici');
                    echo $this->Form->control('identificacion');
                    echo $this->Form->control('identificacion_menor');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
