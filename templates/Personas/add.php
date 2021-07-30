<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Persona $persona
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
			<span class="mi-texto"><?= 'Favor de completar los campos para registrarse' ?></span><br><br>
        </div>
    </aside>
    <div class="column-responsive column-80 col-xxl-6 col-xl-6 col-md-6 col-md-6 col-sm-12 col-xs-12">
        <div class="usuarios form content">
            <?= $this->Form->create($persona, ['type' => 'file', 'action'=> 'Personas/add']) ?>
            <fieldset>
                <?php
					echo $this->Form->control('nombre', ['class' => 'form-control']);
					echo $this->Form->control('apellido_paterno', ['class' => 'form-control']);
					echo $this->Form->control('apellido_materno', ['class' => 'form-control']);
					echo $this->Form->control('curp', ['class' => 'form-control']);
					echo $this->Form->control('correo', ['class' => 'form-control']);
					echo $this->Form->control('cp', ['class' => 'form-control']);
					echo $this->Form->control('calle', ['class' => 'form-control']);
					echo $this->Form->control('numero_exterior', ['class' => 'form-control']);
					echo $this->Form->control('numero_interior', ['class' => 'form-control']);
					echo $this->Form->control('foto_bici', ['class' => 'form-control', 'type' => 'file']);
					
					echo '<br><span class="mi-texto">Si es menor de edad, favor de agregar la identificacion del menor y del padre o la madre</span>';
					echo $this->Form->control('identificacion', ['class' => 'form-control', 'type' => 'file', 'label' => 'Identificacion adulto']);

					echo $this->Form->control('identificacion_menor', ['class' => 'form-control', 'type' => 'file']);
                ?>
            </fieldset>
			<br>
            <?= $this->Form->button(__('Registrarse')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<!-- col-xxl-6 col-xl-6 col-md-6 col-md-6 col-sm-12 col-xs-12 -->
