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

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>

        <div class="container">
            <div class="content">
                <div class="row">
                    <nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<button class="nav-link active" id="nav-met-tab" data-bs-toggle="tab" data-bs-target="#nav-met" type="button" role="tab" aria-controls="nav-met" aria-selected="true">Metodolog&iacute;a</button>
							<button class="nav-link" id="nav-encuesta-tab" data-bs-toggle="tab" data-bs-target="#nav-encuesta" type="button" role="tab" aria-controls="nav-encuesta" aria-selected="false">Encuesta</button>
							<button class="nav-link" id="nav-resultados1-tab" data-bs-toggle="tab" data-bs-target="#nav-resultados1" type="button" role="tab" aria-controls="nav-resultados1" aria-selected="false">Resultados (infograf&iacute;a)</button>
							<button class="nav-link" id="nav-resultados2-tab" data-bs-toggle="tab" data-bs-target="#nav-resultados2" type="button" role="tab" aria-controls="nav-resultados2" aria-selected="false">Resultados (gr&aacute;ficos)</button>
						</div>
					</nav>
					
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active" id="nav-met" role="tabpanel" aria-labelledby="nav-met-tab"> Metodolog&iacute;a texto</div>
						<div class="tab-pane fade" id="nav-encuesta" role="tabpanel" aria-labelledby="nav-encuesta-tab"> Encuesta texto</div>
						<div class="tab-pane fade" id="nav-resultados1" role="tabpanel" aria-labelledby="nav-resultados1-tab"> Resultados (infograf&iacute;a) texto</div>
						<div class="tab-pane fade" id="nav-resultados2" role="tabpanel" aria-labelledby="nav-resultados2-tab"> Resultados (graficos) texto</div>
					</div>
                </div>
               
            </div>
        </div>

