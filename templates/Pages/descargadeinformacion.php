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
	
<div class="container-fluid">
	<div class="content">
		<div class="row">
			<div class="col-12">
			
				<?= $this->Html->link('Encuesta de talleres', 'downloads/Encuesta de talleres/Encuesta_de_talleres.zip') ?><br><br>

				<?= $this->Html->link('Presentación realizadas en los talleres', 'downloads/Presentaciones realizadas en los talleres/Presentaciones_realizadas_en_los_talleres.zip') ?><br><br>

				<?= $this->Html->link('Base de datos del diagnóstico de movilidad', 'downloads/Base de datos del diagnostico de movilidad/') ?><br><br>

				<?= $this->Html->link('Infografías', 'downloads/Infografias/Infografias_proceso_participativo.pptx') ?><br><br>

				<?= $this->Html->link('Seguimiento', 'downloads/Seguimiento/base_de_datos_Seguimiento.rtf') ?><br><br>
				
			</div>
		</div>
	</div>

	
</div>
