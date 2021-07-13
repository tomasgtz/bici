<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Secretar&iacute;a de movilidad: Biciestacionamiento
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['bici']) ?>

    <?= $this->fetch('meta') ?>
    
	<?php echo $this->Html->css('bootstrap.min.css'); ?>
	<?php echo $this->Html->script('jquery-3.3.1.slim.min'); ?>
	<?php echo $this->Html->script('popper.min'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
	<?php echo $this->Html->script('bootstrap.bundle'); ?>

</head>
<body>
	
	<nav class="navbar navbar-expand-lg ">
		<div class="d-flex flex-grow-1">
			<span class="w-100 d-lg-none d-block">
				<!-- hidden spacer to center brand on mobile --></span>
			<a class="navbar-brand d-none d-lg-inline-block px-4" href="#">
				<?php echo $this->Html->image('logo_secretaria_movilidad.png', ['width'=>"150", 'alt'=>"Secretaria de Movilidad"]); ?>
			</a>
			<a class="navbar-brand-two mx-auto d-lg-none d-inline-block px-4" href="#">
				<?php echo $this->Html->image('logo_secretaria_movilidad.png', ['width'=>"150", 'alt'=>"Secretaria de Movilidad"]); ?>
			</a>
			<div class="m-2 w-100 text-right">
				<button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
					<span class="navbar-toggler-icon custom-toggler"></span>
				</button>
			</div>
		</div>
		<div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
			<ul class="navbar-nav ms-auto flex-nowrap">
				<li class="nav-item">
					<a href="#" class="nav-link m-2 menu-item nav-active">Inicio</a>
				</li>

				<li class="nav-item dropdown" id="myDropdown">
					<a class="nav-link" href="#" data-bs-toggle="dropdown">Proceso participativo</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#"> Encuesta de percepci&oacute;n de talleres </a>
							<ul class="submenu dropdown-menu">
								<li><a class="dropdown-item" href="#">Metodolog&iacute;a</a></li>
								<li><a class="dropdown-item" href="#">Encuesta</a></li>
								<li><a class="dropdown-item" href="#">Resultados (infograf&iacute;a)</a></li>
								<li><a class="dropdown-item" href="#">Resultados (gr&aacute;ficas)</a></li>
							</ul>
						</li>
						<li><a class="dropdown-item" href="#"> Encuesta de satisfacci&oacute;n </a>
							<ul class="submenu dropdown-menu">
								<li><a class="dropdown-item" href="#">Metodolog&iacute;a</a></li>
								<li><a class="dropdown-item" href="#">Encuesta</a></li>
								<li><a class="dropdown-item" href="#">Resultados (infograf&iacute;a)</a></li>
								<li><a class="dropdown-item" href="#">Resultados (gr&aacute;ficas)</a></li>
							</ul>
						</li>
						<li><a class="dropdown-item" href="#"> Encuesta de apropiaci&oacute;n de espacios p&uacute;blicos </a>
							<ul class="submenu dropdown-menu">
								<li><a class="dropdown-item" href="#">Metodolog&iacute;a</a></li>
								<li><a class="dropdown-item" href="#">Encuesta</a></li>
								<li><a class="dropdown-item" href="#">Resultados (infograf&iacute;a)</a></li>
								<li><a class="dropdown-item" href="#">Resultados (gr&aacute;ficas)</a></li>
							</ul>
						</li>
					</ul>
				</li>
				  
		
					<?php // echo $this->Html->link('Proceso Participativo', [
						//'controller' => 'Pages',
						//'action' => 'procesoparticipativo'
					//], ['class' => 'nav-link m-2 menu-item']); ?>
				
				<li class="nav-item">
					<a href="#" class="nav-link m-2 menu-item">Mapa interactivo</a>
				</li>
			</ul>
		</div>
	</nav>

	
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
		
		<div class="container">
			<div class="row">
				<div class="col-10"></div>
				<div class="col-2"><?php echo $this->Html->image('logo_semovi.png', ['width'=>"150", 'alt'=>"Secretaria de Movilidad"]); ?></div>
			</div>
		</div>
		
    </main>

	
    <footer class="my-footer align-bottom"><div class="mt-2">&copy;Copyright 2021 Copyright.mx - Todos los derechos reservados | Aviso de privacidad</div></footer>
</body>
</html>
