<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Persona $persona
 */
?>


<div class="usuarios form content">
	<span class="mi-texto"><?= 'Favor de completar los campos para registrarse' ?></span><br><br>
	<?= $this->Form->create($persona, ['type' => 'file', 'action'=> 'Personas/add']) ?>
	<fieldset id="registro-personales" class="d-block">
		<?php
			echo $this->Form->control('nombre', ['class' => 'form-control', 'placeholder'=>'Nombre']);
			echo $this->Form->control('apellido_paterno', ['class' => 'form-control', 'placeholder'=>'Apellido Paterno']);
			echo $this->Form->control('apellido_materno', ['class' => 'form-control', 'placeholder'=>'Apellido Materno']);
			echo $this->Form->control('curp', ['class' => 'form-control', 'placeholder'=>'CURP']);
			echo $this->Form->control('correo', ['class' => 'form-control', 'placeholder'=>'Correo electrónico']);
		?>
	</fieldset>

	<fieldset id="registro-direccion" class="d-none">
		<?php
			echo $this->Form->control('cp', ['class' => 'form-control', 'placeholder'=>'Código postal']);
			echo $this->Form->control('calle', ['class' => 'form-control', 'placeholder'=>'Calle']);
			echo $this->Form->control('numero_exterior', ['class' => 'form-control', 'placeholder'=>'Número exterior']);
			echo $this->Form->control('numero_interior', ['class' => 'form-control', 'placeholder'=>'Número interior']);
		?>
	</fieldset>

	<fieldset id="registro-documentos" class="d-none">
		<?php
			echo $this->Form->control('foto_bici', ['class' => 'form-control', 'type' => 'file']);
			echo '<br><span class="mi-texto" id="leyenda_id">Si es menor de edad, favor de agregar la identificacion del menor y del padre o la madre</span>';
			echo $this->Form->control('identificacion', ['class' => 'form-control', 'type' => 'file', 'label' => 'Identificacion adulto']);
			echo $this->Form->control('identificacion_menor', ['class' => 'form-control', 'type' => 'file']);
		?>
	</fieldset>

	<br>
	<?= $this->Form->button(__('Continuar'), ['id' => 'btn-registro-continuar', 'type' => 'button', 'class' => 'btn btn-warning2']) ?>

</div>


<script>
	

	$('#curp').on('change', function() {
		
		var intValue = this.value.substring(4,6) * 1;
		var month = this.value.substring(6,8) - 1;
		var day = this.value.substring(8,10);
		
		if (Number.isInteger(intValue))
		{
			intValue = intValue.toLocaleString('en-US', {
				minimumIntegerDigits: 2,
				useGrouping: false
			  });

			if (intValue < 35)
				year = "20" + intValue;
			else
				year = "19" + intValue;

			var birth = moment([year, month, day]);
			var today = moment();
			var age = today.diff(birth, 'years');
			
			if (age < 18)
			{
				$('#identificacion-menor').show();
				$('#identificacion-menor').parent().show();
				$('#leyenda_id').show();
				$("#identificacion-menor").prop("required", true);
			} 
			else
			{
				$("#identificacion-menor").prop("required", false);
				$('#identificacion-menor').hide();
				$('#identificacion-menor').parent().hide();
				$('#leyenda_id').hide();
			}	
		} 
		else 
		{
			alert("CURP no valido");	

		}
		

	});

</script>