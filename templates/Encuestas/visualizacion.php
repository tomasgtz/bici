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



<style>
	.testt {
		height:auto!important;
		background-color:#F18627;
		z-index:-10000;
		display: block;
		overflow:auto;
	}
	.radio {
		margin-left:30px;
		margin-right:30px;
	}
	.radio-d {
		margin-left:60px;
		margin-right:60px;
	}
	.label-radio {
		padding-left:30px;
		padding-right:30px;
	}
	

	#mapa_coordenadas {
		width:auto;
		height:500px;
	}

    .espacio{
        height:60px;
    }
	</style>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <div class="container-fluid">
            <div class="content">
                <div class="row">
					<div class="col">
						<nav>
							<div class="nav nav-tabs tabtop" id="nav-tab" role="tablist">
								<button class="nav-link <?= $s1active; ?> tabtitle" id="nav-resinfo-tab" data-bs-toggle="tab" data-bs-target="#nav-resinfo" type="button" role="tab" aria-controls="nav-resinfo" aria-selected="true">Resultados (Infograf&iacute;a)</button>
								<button class="nav-link                   tabtitle" id="nav-resdata-tab" data-bs-toggle="tab" data-bs-target="#nav-resdata" type="button" role="tab" aria-controls="nav-resdata" aria-selected="true">Resultados Datos</button>
								<button class="nav-link <?= $s2active; ?> tabtitle" id="nav-desarrollo-tab" data-bs-toggle="tab" data-bs-target="#nav-desarrollo" type="button" role="tab" aria-controls="nav-encuesta" aria-selected="false">Desarrollo</button>
								<button class="nav-link <?= $s3active; ?> tabtitle" id="nav-met-tab" data-bs-toggle="tab" data-bs-target="#nav-met" type="button" role="tab" aria-controls="nav-met" aria-selected="false">Metodolog&iacute;a</button>
								<button class="nav-link <?= $s4active; ?> tabtitle" id="nav-seg-tab" data-bs-toggle="tab" data-bs-target="#nav-seg" type="button" role="tab" aria-controls="nav-seg" aria-selected="false">Seguimiento</button>
								<button class="nav-link <?= $s5active; ?> tabtitle" id="nav-res-tab" data-bs-toggle="tab" data-bs-target="#nav-res" type="button" role="tab" aria-controls="nav-res" aria-selected="false">Resultados</button>
							</div>
						</nav>
						<div class="tab-content tabcontents" id="nav-tabContent">
							<div class="tab-pane fade show scroll-section <?= $s1active; ?>" id="nav-resinfo" role="tabpanel" aria-labelledby="nav-resinfo-tab">
								<div class="container-fluid">
									<div class="scroll-section-in row">
										<div class="col-12 text-center">

											<p class="tabcontentsheader"><i>&iquest;Cu&aacute;les fueron los principales resultados del proceso participativo?</i></p>
											<?= $this->Html->image('proceso_participativo_resultados.png', ['class' => 'ppimg']) ?><br><br>
											<?= $this->Html->image('proceso_participativo_resultados2.png', ['class' => 'ppimg']) ?>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade show scroll-section" id="nav-resdata" role="tabpanel" aria-labelledby="nav-resdata-tab" >
								<div class="container-fluid">
									<div class="scroll-section-in row">
										<div class="col-12 text-center">
											<p class="tabcontentsheader"><i>Resultados Datos</i></p>
											<p>Filtrar por sexo: 
												<select name="filtro_sexo" id="filtro_sexo">
													<option value="todos">Todos</option>
													<option value="femenino">Femenino</option>
													<option value="masculino">Masculino</option>
													<option value="prefirio no contestar">Prefirio no contestar</option>
												</select>
												<div id="piechart" class="gchart"></div><br>
											<div id="columnchart_material" class="gchart"></div><br>
											<div id="dual_x_div" class="gchart"></div><br>
											<div id="nivel_de_problematica" class="gchart"></div><br>
											<div id="nivel_de_concordancia" class="gchart"></div><br>
											<div id="falta" class="gchart"></div>
										</div>	
									</div>
								</div>
							</div>
		
							<div class="tab-pane fade show scroll-section <?= $s2active; ?>" id="nav-desarrollo" role="tabpanel" aria-labelledby="nav-desarrollo-tab">
								<div class="container-fluid">
									<div class="scroll-section-in row">
										<div class="col-12 text-center">
											<p class="tabcontentsheader"><i>&iquest;C&oacute;mo se llev&oacute; a cabo el proceso participativo?</i></p>
											<?= $this->Html->image('proceso_participativo_desarrollo.png', ['class' => 'ppimg']) ?>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show scroll-section <?= $s3active; ?>" id="nav-met" role="tabpanel" aria-labelledby="nav-met-tab">
								<div class="container-fluid">
									<div class="scroll-section-in row">
										<div class="col-12 text-center">
											<p class="tabcontentsheader"><i>&iquest;Cu&aacute;les son las etapas del proceso participativo?</i></p>
											<?= $this->Html->image('proceso_participativo_metodologia.png', ['class' => 'ppimg']) ?><br><br>
											<p class="tabcontentsheader"><i>&iquest;C&oacute;mo se desarroll&oacute; el proceso participativo?</i></p>
											<?= $this->Html->image('proceso_participativo_metodologia2.png', ['class' => 'ppimg']) ?><br><br>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show <?= $s4active; ?>" id="nav-seg" role="tabpanel" aria-labelledby="nav-seg-tab"> Seguimiento 
								<div class="testt">
									
								</div>

							</div>
							<div class="tab-pane fade show <?= $s5active; ?>" id="nav-res" role="tabpanel" aria-labelledby="nav-res-tab">
								<div class="testt">
									RESULTADOS

										

									<?php echo @$this->render('/Encuestas/add-res', 'empty', ['encuesta' => $encuesta]); ?>
									 


                    
								</div>

							</div>
						</div>
					</div>
                </div>
            </div>

			
        </div>


		<script src="https://maps.googleapis.com/maps/api/js?key=<?= $gkey; ?>&callback=initMap"></script>
		


		<script>
function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapa_coordenadas"), mapOptions);
    map.setTilt(50);
        
    // Multiple markers location, latitude, and longitude
    var markers = [
		<?php
		foreach($coordenadasQuery as $fila){
			$c= $fila->coordenadas;
			$c = str_replace("[","[' ',",$c);
			$c = str_replace("]","],",$c);
			echo $c;
		}
		?>	
    ];
                        
    // Info window content
    var infoWindowContent = [
      
    ];
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Place each marker on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);
    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
}
// Load initialize function
google.maps.event.addDomListener(window, 'load', initMap);
</script>

<script>
$(function() {
	  
	function drawColumnChart() {
        var data = google.visualization.arrayToDataTable(<?=$str;?>);

        var options = {
          title: 'USO DE LA BIBICLETA',
		  titleTextStyle: {color: 'black', fontSize: 16, bold: true},
		  width: 800,
          height: 500,
		  colors:['#633729','#CB6E2D', '#FEB346'],
	      legend: {position: 'top', textStyle: {color: '#633729', fontSize: 11}},
		  vAxis: {title: '%', titleTextStyle: {color: 'black', fontSize: 11, bold: true}},
        };

		var view = new google.visualization.DataView(data);
		view.setColumns([0,{ 
						 calc: "stringify",
                         sourceColumn: 0,
                         type: "string",
                         role: "none" 
					    },1,
						{ 
						 calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" 
						},2,
						{ 
						 calc: "stringify",
                         sourceColumn: 2,
                         type: "string",
                         role: "annotation" 
						},
						3,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}	]);

		var chart = new google.visualization.ColumnChart(document.getElementById('grafica_utiliza_bicicleta'));

        chart.draw(view, options);
	}	

	function drawGraficaUtilizaBicicleta() {
        var data = google.visualization.arrayToDataTable(<?=$strTieneBicicleta;?>);

        var options = {
          title: 'Indique la importancia que tienen las cuestiones siguientes en cuanto suponene dificultdes para desplazarte por este medio.',
		  titleTextStyle: {color: 'black', fontSize: 16, bold: true},
		  width: 1200,
          height: 500,
		  colors:['#633729','#CB6E2D', '#FEB346','#E74C3C','#D98880','#C0392B','#A569BD','#943126','#626567','#707B7C','#F39C12'],
	      legend: {position: 'top', textStyle: {color: '#633729', fontSize: 11}},
		  vAxis: {title: '%', titleTextStyle: {color: 'black', fontSize: 11, bold: true}},
        };

		var view = new google.visualization.DataView(data);
		view.setColumns([0,{ 
						 calc: "stringify",
                         sourceColumn: 0,
                         type: "string",
                         role: "none" 
					    },1,
						{ 
						 calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" 
						},2,
						{ 
						 calc: "stringify",
                         sourceColumn: 2,
                         type: "string",
                         role: "annotation" 
						},
						3,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						},
						4,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}
						,
						5,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}
						,
						6,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						},
						7,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						},
						8,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}
						,
						9,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}
						,
						10,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}
						,
						11,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						},
						12,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}]);

		var chart = new google.visualization.ColumnChart(document.getElementById('grafica_importancia_uitiliza_bicicleta'));

        chart.draw(view, options);
	}	


	
	function drawGraficaSinBicicleta() {
        var data = google.visualization.arrayToDataTable(<?=$strSinBicicleta;?>);

        var options = {
          title: 'Dificultdes para desplazarte por este medio',
		  titleTextStyle: {color: 'black', fontSize: 16, bold: true},
		  width: 1200,
          height: 500,
		  colors:['#633729','#CB6E2D', '#FEB346','#E74C3C','#D98880','#C0392B','#A569BD','#943126','#626567'],
	      legend: {position: 'top', textStyle: {color: '#633729', fontSize: 11}},
		  vAxis: {title: '%', titleTextStyle: {color: 'black', fontSize: 11, bold: true}},
        };

		var view = new google.visualization.DataView(data);
		view.setColumns([0,{ 
						 calc: "stringify",
                         sourceColumn: 0,
                         type: "string",
                         role: "none" 
					    },1,
						{ 
						 calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" 
						},2,
						{ 
						 calc: "stringify",
                         sourceColumn: 2,
                         type: "string",
                         role: "annotation" 
						},
						3,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						},
						4,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}
						,
						5,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}
						,
						6,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						},
						7,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						},
						8,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}
						,
						9,
						{ 
						 calc: "stringify",
                         sourceColumn: 3,
                         type: "string",
                         role: "annotation" 
						}
						]);

		var chart = new google.visualization.ColumnChart(document.getElementById('strSinBicicleta'));

        chart.draw(view, options);
	}
	google.charts.setOnLoadCallback(function() { drawColumnChart();});
	google.charts.setOnLoadCallback(function() { drawGraficaUtilizaBicicleta();});
	google.charts.setOnLoadCallback(function() { drawGraficaSinBicicleta();});
	
		
		 
});
</script>


