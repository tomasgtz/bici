<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

?>


<section id="bienvenidos">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-11 col-sm-11 col-md-6 col-lg-3 espacio-izq espacio-arr">
				<p class="mi-titulo"><i>&iexcl;Bienvenidos!</i></p>

				<p class="mi-texto">
					Di untenim olorepeElessit alitaes sequiatem quassincitat
					quam is ea coressi nctotas di cusae quam repe occusdaepe
					d quodiae lam fugiam quo im vellate mporumet quuntur.
					Ferciis es aut ius incil ius ut laborit esciatem nonsequos
					veles aut qui volore nobitat enihillaut perit qui ditata dolen
					ditis mossimaxim que se magnistio mod ut qua. Ut acerum
					vellaut utat. Axim sitiis eatum soluptam volup.<br><br>
				</p>
				<input type="button" class="btn btn-warning2" name="" value="Registrarme" data-bs-toggle="modal" data-bs-target="#usuario-modal">
			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-10 col-lg-10 col-xl-10 col-xxl-10">
				<br><br><br><br><br>
				<?php echo $this->Html->image('logo_afd.png', [ 'width'=> '100px', 'class'=> 'espacio-arr espacio-izq' , 'alt'=>"Secretaria de Movilidad"]); ?>
				<?php echo $this->Html->image('logo_euroclima.png', [ 'width'=> '100px', 'class'=> 'espacio-arr espacio-izq', 'alt'=>"Secretaria de Movilidad"]); ?>
			</div>

			<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2" align="right">
				<br><br><br><br><br>
				<?php echo $this->Html->image('logo_semovi.png', ['width'=>"150", 'alt'=>"Secretaria de Movilidad"]); ?>
			</div>
		</div>			
		
	</div>
</section>

<section id="separador1">
	<div class="row">
		<div class="col-12">
			<br><br><br>
			<svg class="separador" width="100%" style="padding-left: 50px; padding-right: 50px;">
				<rect width="100%" height="10px" style="fill:rgb(224,221,0);stroke-width:3;stroke:rgb(224,221,0)" />
			</svg>
		</div>
	</div>
</section>


<section id="como-funciona">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-2 col-xxl-2"></div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 col-xxl-8 espacio-izq espacio-arr text-center">
				<p class="mi-titulo-blanco espacio-arr"><i>&iquest;C&oacute;mo funciona el<br>Biciestacionamiento Masivo?</i></p>
				<button class="btn btn-warning2" id="btn-paso1">Paso 1</button> 
				<button class="btn btn-warning2" id="btn-paso2">Paso 2</button> 
				<button class="btn btn-warning2" id="btn-paso3">Paso 3</button>	
				<br><br>
				<div id="imagenes_pasos">
					<?php echo $this->Html->image('iniciopaso1.png', ['id' => 'img-pasos', 'alt'=>"Paso 1"]); ?>
				</div><br>
				<input type="button" class="btn btn-warning2" name="" value="Registrarme" data-bs-toggle="modal" data-bs-target="#usuario-modal">
			</div>

			<div class="col-xl-2 col-xxl-2"></div>
		</div>
				
		
	</div>
</section>

<section id="separador2">
	<div class="row">
		<div class="col-12">
			<br><br><br>
			<svg class="separador" width="100%" style="padding-left: 50px; padding-right: 50px;">
				<rect width="100%" height="10px" style="fill:rgb(224,221,0);stroke-width:3;stroke:rgb(224,221,0)" />
			</svg>
		</div>
	</div>
</section>


<section id="usuarios">
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-2 col-lg-3 col-xl-3 col-xxl-3"></div>

			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6 espacio-arr text-center">
				<p class="mi-titulo-blanco espacio-arr"><i>Usuarios del Biciestacionamiento Masivo</i></p>
			</div>
			
			<div class="col-md-2 col-lg-3 col-xl-3 col-xxl-3"></div>
		</div>

		<div class="row">
			
			<div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1"></div>

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-orange-col espacio-izq">
				<div class="row">
					<div class="col-3">
						<div class="center-1">
							<div class="center-2">
								<div><?= $total_mujeres ?></div>
							</div>
						</div>
					</div>
					
					<div class="col-9"><span class="titulo-usuarios ">Mujeres</span><br>
						<div class="mi-texto-usuarios" valign="middle">inscritas en el programa Biciestacionamiento Masivo</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-orange-col"> 
				<div class="row">
					<div class="col-3">
						<div class="center-1">
							<div class="center-2">
								<div><?= $total_hombres ?></div>
							</div>
						</div>
					</div>
					
					<div class="col-9"><span class="titulo-usuarios ">Hombres</span><br>
						<div class="mi-texto-usuarios" valign="middle">inscritos en el programa Biciestacionamiento Masivo</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-orange-col">
				<div class="row">
					<div class="col-3">
						<div class="center-1">
							<div class="center-2">
								<div><?= $total_hombres + $total_mujeres ?></div>
							</div>
						</div>
					</div>
					
					<div class="col-9"><span class="titulo-usuarios ">Usuarios totales</span><br>
						<div class="mi-texto-usuarios" valign="middle">inscritos en el programa Biciestacionamiento Masivo</div>
					</div>
				</div>
			</div>

			<div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1"></div>
		</div>

		<div class="row">

			<div class="col-md-2 col-lg-4 col-xl-4 col-xxl-4"></div>

			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 col-xxl-4 espacio-izq espacio-arr text-center">
				<p class="mi-titulo-blanco espacio-arr"><i>Viajes realizados</i></p>

				<div class="my-yellow-col">
					<div class="numero-azul"> <?= $viajes_realizados ?> </div>
						<span class="titulo-azul">&iexcl;Pr&oacute;ximamente!</span>
					<br>
					<?php echo $this->Html->image('icono-bici.png', [ 'width'=> '100px', 'alt'=>"Secretaria de Movilidad", 'class' => 'icon-bici']); ?>
				</div>

				<br>
				<input type="button" class="btn btn-warning2" name="" value="Registrarme" data-bs-toggle="modal" data-bs-target="#usuario-modal">	
			</div>
			
			<div class="col-md-2 col-lg-4 col-xl-4 col-xxl-4"></div>
		</div>
	</div>
</section>



<div class="modal fade" id="usuario-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content modal-morado">
			<div class="modal-header">
				<div class="modal-titulo text-center" id="exampleModalLabel">Formulario de registro</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<h4 class="modal-subtitulo text-center">Se invita al usuario a revisar el aviso de privacidad localizado en el sitio</h4>
						</div>
					</div>

					<div class="row text-center">
						<div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2"> </div>
						<div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8">
							<button id="btn-datos-personales" class="btn btn-warning2">Datos Personales</button> <button id="btn-datos-direccion" class="btn btn-warning2">Datos del domicilio</button> <button id="btn-datos-documentos" class="btn btn-warning2">Documentos</button>
							<?php echo $this->render('/Personas/add', 'empty', ['persona' => $persona]); ?>
							
						</div>
						<div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2"> </div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-cerrar" id="btn-cerrar" data-bs-dismiss="modal">Cerrar</button>
				
				<?= $this->Form->button(__('Registrarme'), ['class' => 'btn btn-warning2']) ?>
				<?= $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {

		$('#btn-datos-personales').on('click', function() {

			$('#registro-personales').addClass('d-block').removeClass('d-none');
			$('#registro-direccion').addClass('d-none').removeClass('d-block');
			$('#registro-documentos').addClass('d-none').removeClass('d-block');

		});

		$('#btn-datos-direccion').on('click', function() {
			
			$('#registro-personales').addClass('d-none').removeClass('d-block');
			$('#registro-direccion').addClass('d-block').removeClass('d-none');
			$('#registro-documentos').addClass('d-none').removeClass('d-block');

		});

		$('#btn-datos-documentos').on('click', function() {
			
			$('#registro-personales').addClass('d-none').removeClass('d-block');
			$('#registro-direccion').addClass('d-none').removeClass('d-block');
			$('#registro-documentos').addClass('d-block').removeClass('d-none');

		});
		

		$('#btn-registro-continuar').on('click', function() {
			
			if ($('#registro-personales').hasClass('d-block'))
				return $('#btn-datos-direccion').click();

			if ($('#registro-direccion').hasClass('d-block'))
				return $('#btn-datos-documentos').click();

			if ($('#registro-documentos').hasClass('d-block'))
				return $('#btn-datos-personales').click();
		});

		$('#btn-cerrar').on('click', function() {

			$('#forma_registro')[0].reset();

		});
		
		$('#btn-paso1').on('click', function() {
			$('#img-pasos').attr('src', '<?= $this->Url->image("iniciopaso1.png") ?>');
		});

		$('#btn-paso2').on('click', function() {
			$('#img-pasos').attr('src', '<?= $this->Url->image("iniciopaso2.png") ?>');
		});

		$('#btn-paso3').on('click', function() {
			$('#img-pasos').attr('src', '<?= $this->Url->image("iniciopaso3.png") ?>');
		});

	});



</script>