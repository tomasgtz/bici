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

// $this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};


?>


<section>            
	<div class="container-fluid">
		<div class="row text-center">
			<!-- col-xs-10 col-sm-5 col-md-5 col-lg-2 col-xl-2 col-xxl-2 text-center my-orange-col -->
			<div class="col-xs-10 col-md-3 col-lg-2-10 col-xl-2-10 text-center my-orange-col">
				<a class="link-caja" href="#registro">
				<?php echo $this->Html->image('circulos_concentricos.png', ['class' => 'caja']); ?>
				<br><i>Registro</i>
				</a>
			</div>
		
			<div class="col-xs-10 col-md-3 col-lg-2-10 col-xl-2-10 text-center my-orange-col">
				<a class="link-caja" href="#lugares">
				<?php echo $this->Html->image('circulos_concentricos.png', ['class' => 'caja']); ?>
				<br><i>Lugares disponibles</i>
				</a>
			</div>
			
			<div class="col-xs-10 col-md-3 col-lg-2-10 col-xl-2-10 text-center my-orange-col">
				<a class="link-caja" href="#personas">
				<?php echo $this->Html->image('circulos_concentricos.png', ['class' => 'caja']); ?>
				<br><i>Personas inscritas</i>
				</a>
			</div>
	
			<div class="col-xs-10 col-md-3 col-lg-2-10 col-xl-2-10 text-center my-orange-col">
				<a class="link-caja" href="#viajes">
				<?php echo $this->Html->image('circulos_concentricos.png', ['class' => 'caja']); ?>
				<br><i>Viajes realizados</i>
				</a>
			</div>
	
			<div class="col-xs-10 col-md-3 col-lg-2-10 col-xl-2-10 text-center my-orange-col">
				<a class="link-caja" href="#funcionamiento">
				<?php echo $this->Html->image('circulos_concentricos.png', ['class' => 'caja']); ?>
				<br><i>Funcionamiento</i>
				</a>
			</div>

		</div>
	</div>
</section>

<section id="registro" class="blue-section">
	<div class="container-fluid">
		<div class="row mi-texto">
			<div class="col-xs-2 col-md-4 col-lg-4 col-xl-4 ">
				<?php echo $this->Html->image('BE_verde_azul.png', ['class' => 'be-verde-azul']); ?>
			</div>
			<div class="col-xs-10 col-md-12 col-lg-8 col-xl-8">
				<?php echo $this->render('/Personas/add', 'empty', ['persona' => $persona]); ?>
			</div>
		</div>
	</div>
</section>


<section id="lugares" class="orange-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
				<span class="mi-texto"><b>LUGARES DISPONIBLES</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
				<span class="mi-texto">Pr&oacute;ximamente</span>
			</div>
		</div>
	</div>
</section>

<section id="personas" class="orange-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
				<span class="mi-texto"><b>PERSONAS INSCRITAS</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-center">
				<span class="mi-texto">Hombres registrados<br><span class="kpi">110</span></span>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-center ">
				<span class="mi-texto">Mujeres registradas<br><span class="kpi">110</span></span>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4 text-center ">
				<span class="mi-texto">Total registrados<br><span class="kpi">220</span></span>
			</div>
		</div>
	</div>
</section>

<section id="viajes" class="orange-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
				<span class="mi-texto"><b>VIAJES REALIZADOS</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
				<span class="mi-texto">Pr&oacute;ximamente</span>
			</div>
		</div>
	</div>
</section>

<section id="funcionamiento" class="orange-section">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
				<span class="mi-texto"><b>FUNCIONAMIENTO</b></span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center">
				<span class="mi-texto">Pr&oacute;ximamente</span>
			</div>
		</div>
	</div>
</section>