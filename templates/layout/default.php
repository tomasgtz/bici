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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['bici']) ?>

    <?= $this->fetch('meta') ?>
    
	<link href="webroot/css/bootstrap.min.css" rel="stylesheet">
	<script src="webroot/js/jquery-3.3.1.slim.min.js"></script>
	<script src="webroot/js/popper.min.js"></script>
    <script src="webroot/js/bootstrap.min.js"></script>
</head>
<body>
	
	<nav class="navbar navbar-expand-lg ">
		<div class="d-flex flex-grow-1">
			<span class="w-100 d-lg-none d-block">
				<!-- hidden spacer to center brand on mobile --></span>
			<a class="navbar-brand d-none d-lg-inline-block px-4" href="#">
				<img src="webroot/img/logo_secretaria_movilidad.png" width="350" alt="Secretaria de Movilidad">
			</a>
			<a class="navbar-brand-two mx-auto d-lg-none d-inline-block px-4" href="#">
				<img src="webroot/img/logo_secretaria_movilidad.png" width="350" alt="Secretaria de Movilidad">
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
					<a href="#" class="nav-link m-2 menu-item nav-active">Secci&oacute;n</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link m-2 menu-item">Secci&oacute;n</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link m-2 menu-item">Secci&oacute;n</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link m-2 menu-item">Secci&oacute;n</a>
				</li>
			</ul>
		</div>
	</nav>

	
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer class="my-footer align-bottom"><div class="mt-2">&copy;Copyright 2021 Copyright.mx - Todos los derechos reservados | Aviso de privacidad</div></footer>
</body>
</html>
