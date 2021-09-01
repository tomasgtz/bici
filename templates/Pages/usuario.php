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

<section id="como-subir">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 text-center">

				<p class="mi-titulo-blanco"><i>&iquest;C&oacute;mo subir y bajar tu bicicleta?</i></p>
				
				
				
				<?php echo $this->Html->link(
						$this->Html->image('como_subir_tu_bicicleta.png', ['width' => '500px']),
						'/downloads/Infografias/como_subir_una_bicicleta.pdf', ['target'=> '_blank', 'escape' => false, 'class' => 'no-spaces']
					);
				?><?php echo $this->Html->link(
						$this->Html->image('como_bajar_tu_bicicleta.png', ['width' => '500px']),
						'/downloads/Infografias/como_bajar_una_bicicleta.pdf', ['target'=> '_blank', 'escape' => false, 'class' => 'no-spaces']
					);
				?>

			</div>		
		</div>
	</div>
</section>

<section id="separador2">
	<div class="row">
		<div class="col-12">
			<svg class="separador" width="100%" style="padding-left: 50px; padding-right: 50px;">
				<rect width="100%" height="10px" style="fill:rgb(224,221,0);stroke-width:3;stroke:rgb(224,221,0)" />
			</svg>
		</div>
	</div>
</section>

<section id="lugares-disponibles">
	<div class="container-fluid">
		<div class="row">

			<div class="col-md-2 col-lg-3 col-xl-3 col-xxl-3"></div>

			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6 espacio-arr text-center">
				<p class="mi-titulo-blanco espacio-arr"><i>Lugares disponibles</i></p>
			</div>
			
			<div class="col-md-2 col-lg-3 col-xl-3 col-xxl-3"></div>
		</div>

		<div class="row">
			
			<div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1"></div>

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-orange-col espacio-izq  text-center">
				<div class="row">
					<div class="col-12"><span class="titulo-usuarios">Lugares totales</span><br></div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="center-1">
							<div class="center-2">
								<div><?= $total_lugares ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-orange-col text-center"> 
				<div class="row">
					<div class="col-12"><span class="titulo-usuarios">Lugares ocupados</span><br></div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="center-1">
							<div class="center-2">
								<div><?= $total_ocupados ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3 my-orange-col text-center">
				<div class="row">
					<div class="col-12"><span class="titulo-usuarios">Lugares disponibles</span><br></div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="center-1">
							<div class="center-2">
								<div><?= $total_disponibles ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-1 col-lg-1 col-xl-1 col-xxl-1"></div>
		</div>

	</div>
</section>
