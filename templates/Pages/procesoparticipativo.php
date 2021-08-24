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
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<style>
	.testt {
		height:auto!important;
		background-color:#F18627;
		z-index:-10000;
		display: block;
		overflow:auto;
	}
	.radio {
		margin-left:80px;
		margin-right:80px;
	}
	.radio-d {
		margin-left:60px;
		margin-right:60px;
	}
	.label-radio {
		padding-left:50px;
		padding-right:50px;
	}
	
	#contener-maps {
		display:none;
		background-color:transparent;
		margin-top: -700px;
		padding-left: 200px;
		position:absolute;
	}

	#maps {
		display:block;
		width:900px;
		height:600px;
		background-color:#F18627;
		
	}
	.btnCerrarMaps {
		color:#F18627;
	}
	
	#error_utiliza_bicicleta,#error_fub_ocio_deportiva,#error_fub_transporte,#error_fub_ir_trabajar,
	#error_idd_sacar_meter_domicilio,#error_idd_no_transporte_publico,#error_idd_robo_estacionada,
	#error_idd_dificultad_estacionada_seguro,#error_idd_falta_ciclovia,#error_idd_vias_alto_flujo,
	#error_idd_invacion_ciclovias_peatones_coches,#error_idd_conflictos_conductores_automoviles_motos_autobuses,
	#error_idd_conflictos_peatones_no_respetan,#error_idd_no_conocer_normas,#error_idd_conflictos_otros_ciclistas,
	#error_idd_peligro_circulacion_ciudad,#error_nub_no_disponer_bicicleta,#error_nub_no_condicion_fisica,
	#error_nub_sacar_meter_bicileta,#error_nub_imagen_social,#error_nub_no_poder_llevar_bici_transporte,
	#error_nub_conflictos_conductores_autobuses,#error_nub_conflictos_peatones,#error_nub_conflictos_otros_ciclistas,
	#error_nub_peligro_circulacion_ciudad,#error_beneficios_considera,#error_coordenadas {
	display:none;
	}
</style>

<script>
	function abrirMapa(){
		document.querySelector('#contener-maps').style.display = 'block';
	}
	function cerrarMapa(){
		document.querySelector('#contener-maps').style.display = 'none';
	}
</script>
<script>
      (() => {
        
        var e = {
            d: (o, t) => {
              for (var n in t)
                e.o(t, n) &&
                  !e.o(o, n) &&
                  Object.defineProperty(o, n, { enumerable: !0, get: t[n] });
            },
            o: (e, o) => Object.prototype.hasOwnProperty.call(e, o),
            r: (e) => {
              "undefined" != typeof Symbol &&
                Symbol.toStringTag &&
                Object.defineProperty(e, Symbol.toStringTag, {
                  value: "Module",
                }),
                Object.defineProperty(e, "__esModule", { value: !0 });
            },
          },
          o = {};
        function t() {
          
          const e = { lat: 19.040513592328864, lng: -98.19399714573103 },
            o = new google.maps.Map(document.getElementById("maps"), {
              zoom: 11,
              center: e,
            });
          let t = new google.maps.InfoWindow({
            content: "Click the map to get Lat/Lng!",
            position: e,
          });
          t.open(o),
            o.addListener("click", (e) => {
              t.close(),
                (t = new google.maps.InfoWindow({ position: e.latLng })),
                t.setContent(JSON.stringify(e.latLng.toJSON(), null, 2)),
                t.open(o);
                // desmenusar esta info y meterla en un input oculto
                let informacion = JSON.stringify(e.latLng.toJSON(), null, 2);
                document.querySelector('#coordenadas').value=informacion;

            });
        }
        e.r(o), e.d(o, { initMap: () => t });
        var n = window;
        for (var l in o) n[l] = o[l];
        o.__esModule && Object.defineProperty(n, "__esModule", { value: !0 });
      })();
    </script>
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
							<div class="tab-pane fade show <?= $s4active; ?>" id="nav-seg" role="tabpanel" aria-labelledby="nav-seg-tab"> 
							<div class="testt">
							<?php echo @$this->render('/Encuestas/add', 'empty', ['encuesta' => $encuesta]); ?>
							</div>
						</div>
						</div>
					</div>
                </div>
            </div>

			
        </div>
		

		<script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('maps'), {
      center: {lat: 19.040513592328864, lng: -98.19399714573103 },
      zoom: 13
    });
    var input = document.getElementById('searchInput');
	input.style="width: 350px";
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("La direccion solicitada no fue encontrada, intente con alguna cercana");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div class="mi-texto-naranja"><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        // Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){
                document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
            }
            if(place.address_components[i].types[0] == 'country'){
                document.getElementById('country').innerHTML = place.address_components[i].long_name;
            }
        }
        document.getElementById('location').innerHTML = place.formatted_address;
        document.getElementById('lat').innerHTML = place.geometry.location.lat();
        document.getElementById('lon').innerHTML = place.geometry.location.lng();
		//querySelector('coordenadas').value=place.geometry.location.lat() + '-' place.geometry.location.lng();
		document.querySelector('#coordenadas').value='['+place.geometry.location.lat() + ',' + place.geometry.location.lng()+']';
    });
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=<?= $gkey ?>&callback=initMap&libraries=places&v=weekly" async defer>
</script>



<script>

$(function() {

	var data_uso_bici = {};
	data_uso_bici = {
		'todos': {
			'Como actividad de ocio o deportiva': {
				'Con bastante frecuencia': 19.35,
				'Habitualmente': 53.23,
				'Nunca': 9.68,
				'Ocasionalmente': 17.74
			},
			'Como modo de transporte': {
				'Con bastante frecuencia': 12.90,
				'Habitualmente': 53.23,
				'Nunca': 8.06,
				'Ocasionalmente': 25.81
			},
			'Para ir a trabajar': {
				'Con bastante frecuencia': 4.84,
				'Habitualmente': 48.39,
				'Nunca': 35.48,
				'Ocasionalmente': 11.29
			},
		},
		'masculino': {
			'Como actividad de ocio o deportiva': {
				'Con bastante frecuencia': 9.68,
				'Habitualmente': 24.19,
				'Nunca': 9.68,
				'Ocasionalmente': 6.45
			},
			'Como modo de transporte': {
				'Con bastante frecuencia': 6.45,
				'Habitualmente': 32.26,
				'Nunca': 0,
				'Ocasionalmente': 11.29
			},
			'Para ir a trabajar': {
				'Con bastante frecuencia': 4.84,
				'Habitualmente': 25.81,
				'Nunca': 14.52,
				'Ocasionalmente': 4.84
			},
		},
		'femenino': {
			'Como actividad de ocio o deportiva': {
				'Con bastante frecuencia': 6.45,
				'Habitualmente': 29.03,
				'Nunca': 0,
				'Ocasionalmente': 6.45
			},
			'Como modo de transporte': {
				'Con bastante frecuencia': 6.45,
				'Habitualmente': 17.74,
				'Nunca': 6.45,
				'Ocasionalmente': 11.29
			},
			'Para ir a trabajar': {
				'Con bastante frecuencia': 0,
				'Habitualmente': 19.35,
				'Nunca': 16.13,
				'Ocasionalmente': 6.45
			},
		},
		'prefirio no contestar': {
			'Como actividad de ocio o deportiva': {
				'Con bastante frecuencia': 3.23,
				'Habitualmente': 0,
				'Nunca': 0,
				'Ocasionalmente': 4.84
			},
			'Como modo de transporte': {
				'Con bastante frecuencia': 0,
				'Habitualmente': 3.23,
				'Nunca': 1.61,
				'Ocasionalmente': 3.23
			},
			'Para ir a trabajar': {
				'Con bastante frecuencia': 0,
				'Habitualmente': 3.23,
				'Nunca': 4.84,
				'Ocasionalmente': 0
			},
		},
	}

	var data_tipo_bici = {};
	data_tipo_bici = {
		'todos': {
			'Mas de uno': {
				'Casco de seguridad': 3.23,
				'Chaleco anti reflejante': 6.45,
				'Rodilleras-coderas': 1.61,
				'Bicicleta de carretera o competicion': 3.23,
				'Bicicleta de montana': 4.84,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 3.23,
				'Bicicleta de paseo (hibrida-urbana)': 3.23,
				'Bicicleta plegable': 1.61,
				'Bicicleta infantil': 6.45,
				'Bicicleta tandem o doble': 3.23,
				'Guantes': 9.68,
				'Gafas ciclistas': 8.06
			},
			'Ninguno': {
				'Casco de seguridad': 41.94,
				'Chaleco anti reflejante': 61.29,
				'Rodilleras-coderas': 82.26,
				'Bicicleta de carretera o competicion': 74.19,
				'Bicicleta de montana': 46.77,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 85.48,
				'Bicicleta de paseo (hibrida-urbana)': 72.58,
				'Bicicleta plegable': 93.55,
				'Bicicleta infantil': 69.35,
				'Bicicleta tandem o doble': 93.55,
				'Guantes': 66.13,
				'Gafas ciclistas': 75.81
			},
			'Uno': {
				'Casco de seguridad': 54.84,
				'Chaleco anti reflejante': 32.26,
				'Rodilleras-coderas': 16.13,
				'Bicicleta de carretera o competicion': 22.58,
				'Bicicleta de montana': 48.39,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 11.29,
				'Bicicleta de paseo (hibrida-urbana)': 24.19,
				'Bicicleta plegable': 4.84,
				'Bicicleta infantil': 24.19,
				'Bicicleta tandem o doble': 3.23,
				'Guantes': 24.19,
				'Gafas ciclistas': 16.13
			},
		},
		'masculino': {
			'Mas de uno': {
				'Casco de seguridad': 0,
				'Chaleco anti reflejante': 1.61,
				'Rodilleras-coderas': 1.61,
				'Bicicleta de carretera o competicion': 1.61,
				'Bicicleta de montana': 3.23,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 1.61,
				'Bicicleta de paseo (hibrida-urbana)': 3.23,
				'Bicicleta plegable': 1.61,
				'Bicicleta infantil': 4.84,
				'Bicicleta tandem o doble': 1.61,
				'Guantes': 4.84,
				'Gafas ciclistas': 3.23
			},
			'Ninguno': {
				'Casco de seguridad': 35.48,
				'Chaleco anti reflejante': 33.87,
				'Rodilleras-coderas': 48.39,
				'Bicicleta de carretera o competicion': 30.65,
				'Bicicleta de montana': 27.42,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 43.55,
				'Bicicleta de paseo (hibrida-urbana)': 41.94,
				'Bicicleta plegable': 48.39,
				'Bicicleta infantil': 32.26,
				'Bicicleta tandem o doble': 48.39,
				'Guantes': 38.71,
				'Gafas ciclistas': 43.55
			},
			'Uno': {
				'Casco de seguridad': 14.52,
				'Chaleco anti reflejante': 14.52,
				'Rodilleras-coderas': 0,
				'Bicicleta de carretera o competicion': 17.74,
				'Bicicleta de montana': 19.35,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 4.84,
				'Bicicleta de paseo (hibrida-urbana)': 4.84,
				'Bicicleta plegable': 0,
				'Bicicleta infantil': 12.9,
				'Bicicleta tandem o doble': 0,
				'Guantes': 6.45,
				'Gafas ciclistas': 3.23
			},
		},
		'femenino': {
			'Mas de uno': {
				'Casco de seguridad': 3.23,
				'Chaleco anti reflejante': 4.84,
				'Rodilleras-coderas': 0,
				'Bicicleta de carretera o competicion': 1.61,
				'Bicicleta de montana': 1.61,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 1.61,
				'Bicicleta de paseo (hibrida-urbana)': 0,
				'Bicicleta plegable': 0,
				'Bicicleta infantil': 1.61,
				'Bicicleta tandem o doble': 1.61,
				'Guantes': 4.84,
				'Gafas ciclistas': 4.84
			},
			'Ninguno': {
				'Casco de seguridad': 3.23,
				'Chaleco anti reflejante': 19.35,
				'Rodilleras-coderas': 25.81,
				'Bicicleta de carretera o competicion': 35.48,
				'Bicicleta de montana': 19.35,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 33.87,
				'Bicicleta de paseo (hibrida-urbana)': 22.58,
				'Bicicleta plegable': 37.1,
				'Bicicleta infantil': 29.03,
				'Bicicleta tandem o doble': 37.1,
				'Guantes': 19.35,
				'Gafas ciclistas': 24.19
			},
			'Uno': {
				'Casco de seguridad': 35.48,
				'Chaleco anti reflejante': 17.74,
				'Rodilleras-coderas': 16.13,
				'Bicicleta de carretera o competicion': 4.84,
				'Bicicleta de montana': 20.97,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 6.45,
				'Bicicleta de paseo (hibrida-urbana)': 19.35,
				'Bicicleta plegable': 4.84,
				'Bicicleta infantil': 11.29,
				'Bicicleta tandem o doble': 3.23,
				'Guantes': 17.74,
				'Gafas ciclistas': 12.9
			},
		},
		'prefirio no contestar': {
			'Mas de uno': {
				'Casco de seguridad': 0,
				'Chaleco anti reflejante': 0,
				'Rodilleras-coderas': 0,
				'Bicicleta de carretera o competicion': 0,
				'Bicicleta de montana': 0,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 0,
				'Bicicleta de paseo (hibrida-urbana)': 0,
				'Bicicleta plegable': 0,
				'Bicicleta infantil': 0,
				'Bicicleta tandem o doble': 0,
				'Guantes': 0,
				'Gafas ciclistas': 0
			},
			'Ninguno': {
				'Casco de seguridad': 3.23,
				'Chaleco anti reflejante': 8.06,
				'Rodilleras-coderas': 8.06,
				'Bicicleta de carretera o competicion': 8.06,
				'Bicicleta de montana': 0,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 8.06,
				'Bicicleta de paseo (hibrida-urbana)': 8.06,
				'Bicicleta plegable': 8.06,
				'Bicicleta infantil': 8.06,
				'Bicicleta tandem o doble': 8.06,
				'Guantes': 8.06,
				'Gafas ciclistas': 8.06
			},
			'Uno': {
				'Casco de seguridad': 4.84,
				'Chaleco anti reflejante': 0,
				'Rodilleras-coderas': 0,
				'Bicicleta de carretera o competicion': 0,
				'Bicicleta de montana': 8.06,
				'Bicicleta para hacer piruetas o acrobacias (tipo BMX)': 0,
				'Bicicleta de paseo (hibrida-urbana)': 0,
				'Bicicleta plegable': 0,
				'Bicicleta infantil': 0,
				'Bicicleta tandem o doble': 0,
				'Guantes': 0,
				'Gafas ciclistas': 0
			},
		},
	}

	var data_nivel_de_problematica = {};
	data_nivel_de_problematica = {
		'todos': {
			'Es un problema importante para mi': {
				'Sacar y meter la bicicleta de mi domicilio': 20.97,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 61.29,
				'Peligro de robos cuando la dejo estacionada': 83.87,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 79.03,
				'Falta de ciclovias (calles mal disenadas)': 82.26,
				'Vias con alto flujo vehicular': 83.87,
				'La invasion de ciclo vias por peatones y coches': 75.81,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 75.81,
				'Conflictos con los peatones, que no respetan a los ciclistas': 50,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 32.26,
				'Conflictos con otros ciclistas': 17.74,
				'El peligro que supone la circulacion en la ciudad': 69.35,
				'No disponer de bicicleta': 21.43,
				'No tener condicion fisica adecuada para rodar en bicicleta': 25,
				'Sacar y meter la bicicleta de mi domicilio2': 7.14,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 14.29,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 32.14,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 46.43,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 21.43,
				'Conflictos con otros ciclistas2': 14.29,
				'El peligro que supone la circulacion en la ciudad2': 46.43 
			},
			'Es un problema pero no importante': {
				'Sacar y meter la bicicleta de mi domicilio': 25.81,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 19.35,
				'Peligro de robos cuando la dejo estacionada': 9.68	,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 16.13,
				'Falta de ciclovias (calles mal disenadas)': 12.9,
				'Vias con alto flujo vehicular': 11.29,
				'La invasion de ciclo vias por peatones y coches': 17.74,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 8.06,
				'Conflictos con los peatones, que no respetan a los ciclistas': 22.58,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 45.16,
				'Conflictos con otros ciclistas': 9.68,
				'El peligro que supone la circulacion en la ciudad': 12.9,
				'No disponer de bicicleta': 35.71,
				'No tener condicion fisica adecuada para rodar en bicicleta': 35.71,
				'Sacar y meter la bicicleta de mi domicilio2': 25,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 25,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 25,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 25,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 35.71,
				'Conflictos con otros ciclistas2': 25,
				'El peligro que supone la circulacion en la ciudad2': 21.43 
			},
			'No es un problema': {
				'Sacar y meter la bicicleta de mi domicilio': 53.23,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 19.35,
				'Peligro de robos cuando la dejo estacionada': 6.45,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 4.84,
				'Falta de ciclovias (calles mal disenadas)': 4.84,
				'Vias con alto flujo vehicular': 4.84,
				'La invasion de ciclo vias por peatones y coches': 6.45,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 16.13,
				'Conflictos con los peatones, que no respetan a los ciclistas': 27.42,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 22.58,
				'Conflictos con otros ciclistas': 72.58,
				'El peligro que supone la circulacion en la ciudad': 17.74,
				'No disponer de bicicleta': 42.86,
				'No tener condicion fisica adecuada para rodar en bicicleta': 39.29,
				'Sacar y meter la bicicleta de mi domicilio2': 67.86,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 60.71,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 42.86,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 28.57,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 42.86,
				'Conflictos con otros ciclistas2': 60.71,
				'El peligro que supone la circulacion en la ciudad2': 32.14
			},
		},
		'masculino': {
			'Es un problema importante para mi': {
				'Sacar y meter la bicicleta de mi domicilio': 22.58,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 61.29,
				'Peligro de robos cuando la dejo estacionada': 80.65,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 77.42,
				'Falta de ciclovias (calles mal disenadas)': 83.87,
				'Vias con alto flujo vehicular': 83.87,
				'La invasion de ciclo vias por peatones y coches': 70.97,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 74.19,
				'Conflictos con los peatones, que no respetan a los ciclistas': 41.94,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 22.58,
				'Conflictos con otros ciclistas': 3.23,
				'El peligro que supone la circulacion en la ciudad': 61.29,
				'No disponer de bicicleta': 29.41,
				'No tener condicion fisica adecuada para rodar en bicicleta': 35.29,
				'Sacar y meter la bicicleta de mi domicilio2': 11.76,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 11.76,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 35.29,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 47.06,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 17.65,
				'Conflictos con otros ciclistas2': 11.76,
				'El peligro que supone la circulacion en la ciudad2': 41.18 
			},
			'Es un problema pero no importante': {
				'Sacar y meter la bicicleta de mi domicilio': 22.58,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 16.13,
				'Peligro de robos cuando la dejo estacionada': 12.9,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 19.35,
				'Falta de ciclovias (calles mal disenadas)': 9.68,
				'Vias con alto flujo vehicular': 9.68,
				'La invasion de ciclo vias por peatones y coches': 16.13,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 6.45,
				'Conflictos con los peatones, que no respetan a los ciclistas': 25.81,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 54.84,
				'Conflictos con otros ciclistas': 16.13,
				'El peligro que supone la circulacion en la ciudad': 19.35,
				'No disponer de bicicleta': 29.41,
				'No tener condicion fisica adecuada para rodar en bicicleta': 29.41,
				'Sacar y meter la bicicleta de mi domicilio2': 23.53,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 11.76,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 23.53,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 23.53,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 41.18,
				'Conflictos con otros ciclistas2': 35.29,
				'El peligro que supone la circulacion en la ciudad2': 23.53 
			},
			'No es un problema': {
				'Sacar y meter la bicicleta de mi domicilio': 54.84,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 22.58,
				'Peligro de robos cuando la dejo estacionada': 6.45,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 3.23,
				'Falta de ciclovias (calles mal disenadas)': 6.45,
				'Vias con alto flujo vehicular': 6.45,
				'La invasion de ciclo vias por peatones y coches': 12.9,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 19.35,
				'Conflictos con los peatones, que no respetan a los ciclistas': 32.26,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 22.58,
				'Conflictos con otros ciclistas': 80.65,
				'El peligro que supone la circulacion en la ciudad': 19.35,
				'No disponer de bicicleta': 41.18,
				'No tener condicion fisica adecuada para rodar en bicicleta': 35.29,
				'Sacar y meter la bicicleta de mi domicilio2': 64.71,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 76.47,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 41.18,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 29.41,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 41.18,
				'Conflictos con otros ciclistas2': 52.94,
				'El peligro que supone la circulacion en la ciudad2': 35.29 
			},
		},
		'femenino': {
			'Es un problema importante para mi': {
				'Sacar y meter la bicicleta de mi domicilio': 15.38,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 57.69,
				'Peligro de robos cuando la dejo estacionada': 84.62,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 76.92,
				'Falta de ciclovias (calles mal disenadas)': 76.92,
				'Vias con alto flujo vehicular': 80.77,
				'La invasion de ciclo vias por peatones y coches': 76.92,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 73.08,
				'Conflictos con los peatones, que no respetan a los ciclistas': 61.54,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 34.62,
				'Conflictos con otros ciclistas': 30.77,
				'El peligro que supone la circulacion en la ciudad': 73.08,
				'No disponer de bicicleta': 10,
				'No tener condicion fisica adecuada para rodar en bicicleta': 10,
				'Sacar y meter la bicicleta de mi domicilio2': 0,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 20,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 20,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 40,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 20,
				'Conflictos con otros ciclistas2': 10,
				'El peligro que supone la circulacion en la ciudad2': 50 
			},
			'Es un problema pero no importante': {
				'Sacar y meter la bicicleta de mi domicilio': 30.77,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 23.08,
				'Peligro de robos cuando la dejo estacionada': 7.69,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 15.38,
				'Falta de ciclovias (calles mal disenadas)': 19.23,
				'Vias con alto flujo vehicular': 15.38,
				'La invasion de ciclo vias por peatones y coches': 23.08,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 11.54,
				'Conflictos con los peatones, que no respetan a los ciclistas': 11.54,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 38.46,
				'Conflictos con otros ciclistas': 3.85,
				'El peligro que supone la circulacion en la ciudad': 7.69,
				'No disponer de bicicleta': 40,
				'No tener condicion fisica adecuada para rodar en bicicleta': 50,
				'Sacar y meter la bicicleta de mi domicilio2': 30,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 40,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 30,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 30,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 30,
				'Conflictos con otros ciclistas2': 10,
				'El peligro que supone la circulacion en la ciudad2': 20
			},
			'No es un problema': {
				'Sacar y meter la bicicleta de mi domicilio': 53.85,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 19.23,
				'Peligro de robos cuando la dejo estacionada': 7.69,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 7.69,
				'Falta de ciclovias (calles mal disenadas)': 3.85,
				'Vias con alto flujo vehicular': 3.85,
				'La invasion de ciclo vias por peatones y coches': 0,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 15.38,
				'Conflictos con los peatones, que no respetan a los ciclistas': 26.92,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 26.92,
				'Conflictos con otros ciclistas': 65.38,
				'El peligro que supone la circulacion en la ciudad': 19.23,
				'No disponer de bicicleta': 50,
				'No tener condicion fisica adecuada para rodar en bicicleta': 40,
				'Sacar y meter la bicicleta de mi domicilio2': 70,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 40,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 50,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 30,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 50,
				'Conflictos con otros ciclistas2': 80,
				'El peligro que supone la circulacion en la ciudad2': 30 
			},
		},
		'prefirio no contestar': {
			'Es un problema importante para mi': {
				'Sacar y meter la bicicleta de mi domicilio': 40,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 80,
				'Peligro de robos cuando la dejo estacionada': 100,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 100,
				'Falta de ciclovias (calles mal disenadas)': 100,
				'Vias con alto flujo vehicular': 100,
				'La invasion de ciclo vias por peatones y coches': 100,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 100,
				'Conflictos con los peatones, que no respetan a los ciclistas': 40,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 80,
				'Conflictos con otros ciclistas': 40,
				'El peligro que supone la circulacion en la ciudad': 100,
				'No disponer de bicicleta': 0,
				'No tener condicion fisica adecuada para rodar en bicicleta': 0,
				'Sacar y meter la bicicleta de mi domicilio2': 0,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 0,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 100,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 100,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 100,
				'Conflictos con otros ciclistas2': 100,
				'El peligro que supone la circulacion en la ciudad2': 100 
			},
			'Es un problema pero no importante': {
				'Sacar y meter la bicicleta de mi domicilio': 20,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 20,
				'Peligro de robos cuando la dejo estacionada': 0,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 0,
				'Falta de ciclovias (calles mal disenadas)': 0,
				'Vias con alto flujo vehicular': 0,
				'La invasion de ciclo vias por peatones y coches': 0,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 0,
				'Conflictos con los peatones, que no respetan a los ciclistas': 60,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 20,
				'Conflictos con otros ciclistas': 0,
				'El peligro que supone la circulacion en la ciudad': 0,
				'No disponer de bicicleta': 100,
				'No tener condicion fisica adecuada para rodar en bicicleta': 0,
				'Sacar y meter la bicicleta de mi domicilio2': 0,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 100,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 0,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 0,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 0,
				'Conflictos con otros ciclistas2': 0,
				'El peligro que supone la circulacion en la ciudad2': 0 
			},
			'No es un problema': {
				'Sacar y meter la bicicleta de mi domicilio': 40,
				'No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)': 0,
				'Peligro de robos cuando la dejo estacionada': 0,
				'Dificultad para dejarla estacionada en un lugar seguro fuera de casa': 0,
				'Falta de ciclovias (calles mal disenadas)': 0,
				'Vias con alto flujo vehicular': 0,
				'La invasion de ciclo vias por peatones y coches': 0,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas': 0,
				'Conflictos con los peatones, que no respetan a los ciclistas': 0,
				'No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc': 0,
				'Conflictos con otros ciclistas': 60,
				'El peligro que supone la circulacion en la ciudad': 0,
				'No disponer de bicicleta': 0,
				'No tener condicion fisica adecuada para rodar en bicicleta': 100,
				'Sacar y meter la bicicleta de mi domicilio2': 100,
				'La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion': 0,
				'No poder llevar la bicicleta en los transportes publicos (metrobus, autobus, etc.)': 0,
				'Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2': 0,
				'Conflictos con los peatones, que no respetan a los ciclistas2': 0,
				'Conflictos con otros ciclistas2': 0,
				'El peligro que supone la circulacion en la ciudad2': 0
			},
		},
	}

	var data_nivel_de_concordancia = {};
	data_nivel_de_concordancia = {
		'todos': {
			'De acuerdo': {
				'0': 78.89,
				'1': 70,
				'2': 20,
				'3': 80,
				'4': 38.89,
				'5': 51.11,
				'6': 68.89,
				'7': 68.89,
				'8': 7.78,
				'9': 24.44,
				'10': 16.67,
				'11': 14.44,
				'12': 13.33,
				'13': 24.44,
				'14': 16.67,
				'15': 22.22
			},
			'En desacuerdo': {
				'0': 1.11,
				'1': 7.78,
				'2': 47.78,
				'3': 7.78,
				'4': 26.67,
				'5': 3.33,
				'6': 10,
				'7': 2.22,
				'8': 54.44,
				'9': 20,
				'10': 33.33,
				'11': 50,
				'12': 54.44,
				'13': 38.89,
				'14': 55.56,
				'15': 45.56 
			},
			'Ni de acuerdo ni en desacuerdo': {
				'0': 20,
				'1': 22.22,
				'2': 32.22,
				'3': 12.22,
				'4': 34.44,
				'5': 45.56,
				'6': 21.11,
				'7': 28.89,
				'8': 37.78,
				'9': 55.56,
				'10': 50,
				'11': 35.56,
				'12': 32.22,
				'13': 36.67,
				'14': 27.78,
				'15': 32.22 
			}
		},
		'masculino': {
			'De acuerdo': {
				'0': 85.42,
				'1': 70.83,
				'2': 27.08,
				'3': 81.25,
				'4': 41.67,
				'5': 52.08,
				'6': 68.75,
				'7': 66.67,
				'8': 14.58,
				'9': 27.08,
				'10': 14.58,
				'11': 18.75,
				'12': 16.67,
				'13': 33.33,
				'14': 16.67,
				'15': 22.92 
			},
			'En desacuerdo': {
				'0': 0,
				'1': 8.33,
				'2': 37.5,
				'3': 8.33,
				'4': 25,
				'5': 4.17,
				'6': 14.58,
				'7': 4.17,
				'8': 50,
				'9': 25,
				'10': 39.58,
				'11': 43.75,
				'12': 47.92,
				'13': 33.33,
				'14': 52.08,
				'15': 47.92
			},
			'Ni de acuerdo ni en desacuerdo': {
				'0': 14.58,
				'1': 20.83,
				'2': 35.42,
				'3': 10.42,
				'4': 33.33,
				'5': 43.75,
				'6': 16.67,
				'7': 29.17,
				'8': 35.42,
				'9': 47.92,
				'10': 45.83,
				'11': 37.5,
				'12': 35.42,
				'13': 33.33,
				'14': 31.25,
				'15': 29.17
			}
		},
		'femenino': {
			'De acuerdo': {
				'0': 69.44,
				'1': 63.89,
				'2': 11.11,
				'3': 75,
				'4': 41.67,
				'5': 47.22,
				'6': 63.89,
				'7': 66.67,
				'8': 0,
				'9': 25,
				'10': 16.67,
				'11': 2.78,
				'12': 5.56,
				'13': 11.11,
				'14': 13.89,
				'15': 19.44
			},
			'En desacuerdo': {
				'0': 2.78,
				'1': 8.33,
				'2': 55.56,
				'3': 8.33,
				'4': 27.78,
				'5': 2.78,
				'6': 5.56,
				'7': 0,
				'8': 55.56,
				'9': 11.11,
				'10': 30.56,
				'11': 66.67,
				'12': 66.67,
				'13': 47.22,
				'14': 63.89,
				'15': 44.44
			},
			'Ni de acuerdo ni en desacuerdo': {
				'0': 27.78,
				'1': 27.78,
				'2': 33.33,
				'3': 16.67,
				'4': 30.56,
				'5': 50,
				'6': 30.56,
				'7': 33.33,
				'8': 44.44,
				'9': 63.89,
				'10': 52.78,
				'11': 30.56,
				'12': 27.78,
				'13': 41.67,
				'14': 22.22,
				'15': 36.11
			}
		},
		'prefirio no contestar': {
			'De acuerdo': {
				'0': 83.33,
				'1': 100,
				'2': 16.67,
				'3': 100,
				'4': 0,
				'5': 66.67,
				'6': 100,
				'7': 100,
				'8': 0,
				'9': 0,
				'10': 33.33,
				'11': 50,
				'12': 33.33,
				'13': 33.33,
				'14': 33.33,
				'15': 33.33
			},
			'En desacuerdo': {
				'0': 0,
				'1': 0,
				'2': 83.33,
				'3': 0,
				'4': 33.33,
				'5': 0,
				'6': 0,
				'7': 0,
				'8': 83.33,
				'9': 33.33,
				'10': 0,
				'11': 0,
				'12': 33.33,
				'13': 33.33,
				'14': 33.33,
				'15': 33.33
			},
			'Ni de acuerdo ni en desacuerdo': {
				'0': 16.67,
				'1': 0,
				'2': 0,
				'3': 0,
				'4': 66.67,
				'5': 33.33,
				'6': 0,
				'7': 0,
				'8': 16.67,
				'9': 66.67,
				'10': 66.67,
				'11': 50,
				'12': 33.33,
				'13': 33.33,
				'14': 33.33,
				'15': 33.33
			}
		}
	}

	var data_falta = {};
	data_falta = {
		'todos': {
			'0': 78.89,
			'1': 70,
			'2': 68.89,
			'3': 68.89,
			'4': 51.11
		},
		'masculino': {
			'0': 85.42,
			'1': 70.83,
			'2': 68.75,
			'3': 66.67,
			'4': 52.08,
		},
		'femenino': {
			'0': 69.44,
			'1': 63.89,
			'2': 63.89,
			'3': 66.67,
			'4': 63.89,
		},
		'prefirio no contestar': {
			'0': 83.33,
			'1': 100,
			'2': 100,
			'3': 100,
			'4': 66.67,
		}
	}
  
	function drawPieChart() {

        var data = google.visualization.arrayToDataTable([
          ['Sexo', 'Cantidad'],
          ['Femenino',     26],
          ['Masculino',      31],
          ['Prefirio no contestar',  5]
        ]);

        var options = {
          title: 'PERFIL DE USUARIOS CICLISTAS',
		  width: 950,
          height: 500,
		  colors:['#633729','#CB6E2D', '#FEB346'],
		  pieSliceTextStyle: {color: 'black', fontSize: 16}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
	}
	  
	function drawColumnChart(filter_sexo) {

		if(null == filter_sexo)
			filter_sexo = 'todos';

        var data = google.visualization.arrayToDataTable([
          ['Frecuencia vs Tipo de uso', 'Como actividad de ocio o deportiva', 'Como modo de transporte', 'Para ir a trabajar'],
          ['Con bastante frecuencia', data_uso_bici[filter_sexo]['Como actividad de ocio o deportiva']['Con bastante frecuencia'], 
									  data_uso_bici[filter_sexo]['Como modo de transporte']['Con bastante frecuencia'], 
									  data_uso_bici[filter_sexo]['Para ir a trabajar']['Con bastante frecuencia']],
          ['Habitualmente', data_uso_bici[filter_sexo]['Como actividad de ocio o deportiva']['Habitualmente'], 
						    data_uso_bici[filter_sexo]['Como modo de transporte']['Habitualmente'], 
							data_uso_bici[filter_sexo]['Para ir a trabajar']['Habitualmente'] ],
          ['Nunca', data_uso_bici[filter_sexo]['Como actividad de ocio o deportiva']['Nunca'], 
					data_uso_bici[filter_sexo]['Como modo de transporte']['Nunca'], 
					data_uso_bici[filter_sexo]['Para ir a trabajar']['Nunca']],
          ['Ocasionalmente', data_uso_bici[filter_sexo]['Como actividad de ocio o deportiva']['Ocasionalmente'], 
							 data_uso_bici[filter_sexo]['Como modo de transporte']['Ocasionalmente'], 
							 data_uso_bici[filter_sexo]['Para ir a trabajar']['Ocasionalmente']]
        ]);

        var options = {
          title: 'USO DE LA BIBICLETA',
		  titleTextStyle: {color: 'black', fontSize: 16, bold: true},
		  width: 950,
          height: 600,
		  colors:['#633729','#CB6E2D', '#FEB346'],
	      legend: {position: 'top', textStyle: {color: '#633729', fontSize: 12}},
		  vAxis: {title: '%', titleTextStyle: {color: 'black', fontSize: 12, bold: true}},
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

		var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));

        chart.draw(view, options);
	}

     function drawBarChart(filter_sexo) {

		 if(null == filter_sexo)
			filter_sexo = 'todos';

		var data = new google.visualization.arrayToDataTable([
			['Equipamiento', 'Mas de uno', 'Ninguno', 'Uno'],
			['Gafas ciclistas', data_tipo_bici[filter_sexo]['Mas de uno']['Gafas ciclistas'],
								data_tipo_bici[filter_sexo]['Ninguno']['Gafas ciclistas'],
								data_tipo_bici[filter_sexo]['Uno']['Gafas ciclistas']],
			['Guantes', data_tipo_bici[filter_sexo]['Mas de uno']['Guantes'],
						data_tipo_bici[filter_sexo]['Ninguno']['Guantes'],
						data_tipo_bici[filter_sexo]['Uno']['Guantes']],
			['Bicicleta tandem o doble', data_tipo_bici[filter_sexo]['Mas de uno']['Bicicleta tandem o doble'],
										 data_tipo_bici[filter_sexo]['Ninguno']['Bicicleta tandem o doble'],
										 data_tipo_bici[filter_sexo]['Uno']['Bicicleta tandem o doble']],
			['Bicicleta infantil', data_tipo_bici[filter_sexo]['Mas de uno']['Bicicleta infantil'],
								   data_tipo_bici[filter_sexo]['Ninguno']['Bicicleta infantil'],
								   data_tipo_bici[filter_sexo]['Uno']['Bicicleta infantil']],
			['Bicicleta plegable',	data_tipo_bici[filter_sexo]['Mas de uno']['Bicicleta plegable'],
									data_tipo_bici[filter_sexo]['Ninguno']['Bicicleta plegable'],
									data_tipo_bici[filter_sexo]['Uno']['Bicicleta plegable']],
			['Bicicleta de paseo (hibrida-urbana)', data_tipo_bici[filter_sexo]['Mas de uno']['Bicicleta de paseo (hibrida-urbana)'],
													data_tipo_bici[filter_sexo]['Ninguno']['Bicicleta de paseo (hibrida-urbana)'],
													data_tipo_bici[filter_sexo]['Uno']['Bicicleta de paseo (hibrida-urbana)']],
			['Bicicleta para hacer piruetas o acrobacias (tipo BMX)',	data_tipo_bici[filter_sexo]['Mas de uno']['Bicicleta para hacer piruetas o acrobacias (tipo BMX)'],
																		data_tipo_bici[filter_sexo]['Ninguno']['Bicicleta para hacer piruetas o acrobacias (tipo BMX)'],
																		data_tipo_bici[filter_sexo]['Uno']['Bicicleta para hacer piruetas o acrobacias (tipo BMX)']],
			['Bicicleta de montana', data_tipo_bici[filter_sexo]['Mas de uno']['Bicicleta de montana'],
									 data_tipo_bici[filter_sexo]['Ninguno']['Bicicleta de montana'],
									 data_tipo_bici[filter_sexo]['Uno']['Bicicleta de montana']],
			['Bicicleta de carretera o competicion',	data_tipo_bici[filter_sexo]['Mas de uno']['Bicicleta de carretera o competicion'],
														data_tipo_bici[filter_sexo]['Ninguno']['Bicicleta de carretera o competicion'],
														data_tipo_bici[filter_sexo]['Uno']['Bicicleta de carretera o competicion']],
			['Rodilleras-coderas',	data_tipo_bici[filter_sexo]['Mas de uno']['Rodilleras-coderas'],
									data_tipo_bici[filter_sexo]['Ninguno']['Rodilleras-coderas'],
									data_tipo_bici[filter_sexo]['Uno']['Rodilleras-coderas']],
			['Chaleco anti reflejante', data_tipo_bici[filter_sexo]['Mas de uno']['Chaleco anti reflejante'], 
										data_tipo_bici[filter_sexo]['Ninguno']['Chaleco anti reflejante'],
										data_tipo_bici[filter_sexo]['Uno']['Chaleco anti reflejante']],
			['Casco de seguridad',	data_tipo_bici[filter_sexo]['Mas de uno']['Casco de seguridad'],
									data_tipo_bici[filter_sexo]['Ninguno']['Casco de seguridad'],
									data_tipo_bici[filter_sexo]['Uno']['Casco de seguridad']],
			]);

        var options = {
			width: 950,
			height: 500,
			fontSize: 12,
			title: 'TIPO DE BICICLETA',
			titleTextStyle: {color: 'black', fontSize: 16, bold: true},
			chartArea: {left:250},
			isStacked: 'percent',
			colors:['#633729','#CB6E2D', '#FEB346'],
			legend: {position: 'top'},
			annotations: { textStyle: {
				fontSize: 11}
			}
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

		var chart = new google.visualization.BarChart(document.getElementById('dual_x_div'));
		chart.draw(view, options);
	};

	  function drawBarChartNivelDeProb(filter_sexo) {

		   if(null == filter_sexo)
			filter_sexo = 'todos';

		var data = new google.visualization.arrayToDataTable([
				['Nivel de Problematica', 'Es un problema importante para mi',	'Es un problema pero no importante','No es un problema'],
				['El peligro que supone la circulacion en la ciudad',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['El peligro que supone la circulacion en la ciudad2'],
																		data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['El peligro que supone la circulacion en la ciudad2'],
																		data_nivel_de_problematica[filter_sexo]['No es un problema']['El peligro que supone la circulacion en la ciudad2']],
				['Conflictos con otros ciclistas',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Conflictos con otros ciclistas2'],
													data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Conflictos con otros ciclistas2'],
													data_nivel_de_problematica[filter_sexo]['No es un problema']['Conflictos con otros ciclistas2']],
				['Conflictos con los peatones, que no respetan a los ciclistas',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Conflictos con los peatones, que no respetan a los ciclistas2'],
																					data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Conflictos con los peatones, que no respetan a los ciclistas2'],
																					data_nivel_de_problematica[filter_sexo]['No es un problema']['Conflictos con los peatones, que no respetan a los ciclistas2']],
				['Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2'],
																															data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2'],
																															data_nivel_de_problematica[filter_sexo]['No es un problema']['Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas2']],
				['No poder llevar la bicicleta en los transportes publicos (metrobus, autobos, etc.)',  data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['No poder llevar la bicicleta en los transportes publicos (metrobus, autobos, etc.)'],
																										data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['No poder llevar la bicicleta en los transportes publicos (metrobus, autobos, etc.)'],
																										data_nivel_de_problematica[filter_sexo]['No es un problema']['No poder llevar la bicicleta en los transportes publicos (metrobus, autobos, etc.)']],
				['La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion', data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion'],
																																data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion'],
																																data_nivel_de_problematica[filter_sexo]['No es un problema']['La imagen social poco adecuada que daria desplazandome en bicicleta, teniendo en cuenta mi edad o situacion']],
				['Sacar y meter la bicicleta de mi domicilio',  data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Sacar y meter la bicicleta de mi domicilio2'],
																data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Sacar y meter la bicicleta de mi domicilio2'],
																data_nivel_de_problematica[filter_sexo]['No es un problema']['Sacar y meter la bicicleta de mi domicilio2']],
				['No tener condicion fisica adecuada para rodar en bicicleta',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['No tener condicion fisica adecuada para rodar en bicicleta'],
																				data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['No tener condicion fisica adecuada para rodar en bicicleta'],
																				data_nivel_de_problematica[filter_sexo]['No es un problema']['No tener condicion fisica adecuada para rodar en bicicleta']],
				['No disponer de bicicleta',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['No disponer de bicicleta'],
												data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['No disponer de bicicleta'],
												data_nivel_de_problematica[filter_sexo]['No es un problema']['No disponer de bicicleta']],
				['El peligro que supone la circulacion en la ciudad',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['El peligro que supone la circulacion en la ciudad'],
																		data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['El peligro que supone la circulacion en la ciudad'],
																		data_nivel_de_problematica[filter_sexo]['No es un problema']['El peligro que supone la circulacion en la ciudad']],
				['Conflictos con otros ciclistas',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Conflictos con otros ciclistas'],
													data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Conflictos con otros ciclistas'],
													data_nivel_de_problematica[filter_sexo]['No es un problema']['Conflictos con otros ciclistas']],
				['No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc', data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc'],
																											data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc'],
																											data_nivel_de_problematica[filter_sexo]['No es un problema']['No conocer bien las normas para circular, las senales, direcciones de las calzadas, etc']],
				['Conflictos con los peatones, que no respetan a los ciclistas',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Conflictos con los peatones, que no respetan a los ciclistas'],
																					data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Conflictos con los peatones, que no respetan a los ciclistas'],
																					data_nivel_de_problematica[filter_sexo]['No es un problema']['Conflictos con los peatones, que no respetan a los ciclistas']],
				['Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas'],
																															data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas'],
																															data_nivel_de_problematica[filter_sexo]['No es un problema']['Conflictos con los conductores de los automoviles, motos o autobuses, que no respetan a los ciclistas']],
				['La invasion de ciclo vias por peatones y coches', data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['La invasion de ciclo vias por peatones y coches'],
																	data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['La invasion de ciclo vias por peatones y coches'],
																	data_nivel_de_problematica[filter_sexo]['No es un problema']['La invasion de ciclo vias por peatones y coches']],
				['Vias con alto flujo vehicular',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Vias con alto flujo vehicular'],
													data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Vias con alto flujo vehicular'],
													data_nivel_de_problematica[filter_sexo]['No es un problema']['Vias con alto flujo vehicular']],
				['Falta de ciclovias (calles mal disenadas)',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Falta de ciclovias (calles mal disenadas)'],
																data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Falta de ciclovias (calles mal disenadas)'],
																data_nivel_de_problematica[filter_sexo]['No es un problema']['Falta de ciclovias (calles mal disenadas)']],
				['Dificultad para dejarla estacionada en un lugar seguro fuera de casa',	data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Dificultad para dejarla estacionada en un lugar seguro fuera de casa'],
																							data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Dificultad para dejarla estacionada en un lugar seguro fuera de casa'],
																							data_nivel_de_problematica[filter_sexo]['No es un problema']['Dificultad para dejarla estacionada en un lugar seguro fuera de casa']],
				['Peligro de robos cuando la dejo estacionada', data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Peligro de robos cuando la dejo estacionada'],
																data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Peligro de robos cuando la dejo estacionada'],
																data_nivel_de_problematica[filter_sexo]['No es un problema']['Peligro de robos cuando la dejo estacionada']],
				['No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)',  data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)'],
																									data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)'],
																									data_nivel_de_problematica[filter_sexo]['No es un problema']['No poder llevar la bicicleta en los transportes publicos (RUTA, autobus, etc.)']],
				['Sacar y meter la bicicleta de mi domicilio',  data_nivel_de_problematica[filter_sexo]['Es un problema importante para mi']['Sacar y meter la bicicleta de mi domicilio'],
																data_nivel_de_problematica[filter_sexo]['Es un problema pero no importante']['Sacar y meter la bicicleta de mi domicilio'],
																data_nivel_de_problematica[filter_sexo]['No es un problema']['Sacar y meter la bicicleta de mi domicilio']]
			]);


        var options = {
			width: 950,
			height: 900,
			fontSize: 12,
			title: 'NIVEL DE PROBLEMATICA',
			titleTextStyle: {color: 'black', fontSize: 16, bold: true},
			chartArea: {left:350},
			isStacked: 'percent',
			colors:['#633729','#CB6E2D', '#FEB346'],
			legend: {position: 'top'},
			annotations: { textStyle: {
				fontSize: 11}
			}
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

		var chart = new google.visualization.BarChart(document.getElementById('nivel_de_problematica'));
		chart.draw(view, options);
	  };

	  function drawBarChartNivelDeConcordancia(filter_sexo) {

		if(null == filter_sexo)
			filter_sexo = 'todos';

		var data = new google.visualization.arrayToDataTable([
				['Nivel de Concordancia', 'De acuerdo','En desacuerdo','Ni de acuerdo ni en desacuerdo'],
				['Las personas con medios economicos o con trabajos de responsabilidad no usan la bicicleta para desplazarse',	data_nivel_de_concordancia[filter_sexo]['De acuerdo']['15'],
																																data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['15'],
																																data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['15']],
				['Las personas que usan bicicleta para desplazarse suelen pertenecer a una clase social mas baja que los que lo hacen por otros modos', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['14'],
																																						data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['14'],
																																						data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['14']],
				['Hay trabajos y reuniones sociales en las que no seria apropiado presentarse en bicicleta', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['13'],
																											data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['13'],
																											data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['13']],
				['Usar la bicicleta para desplazarse por la ciudad es mas propio de hombres que de mujeres', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['12'],
																											data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['12'],
																											data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['12']],
				['Usar la bicicleta para desplazarse en la ciudad es propio de jovenes, pero no de adultos o personas mayores', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['11'],
																																data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['11'],
																																data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['11']],
				['Quienes usan bicicleta para desplazarse suele ser porque no tienen dinero suficiente para comprarse una moto o coche', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['10'],
																																			data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['10'],
																																			data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['10']],
				['Para ir con bicicleta por la ciudad hay que tener un buen estado fisico', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['9'],
																							data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['9'],
																							data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['9']],
				['El uso de la bicicleta como modo de transporte es una moda pasajera', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['8'],
																						data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['8'],
																						data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['8']],
				['Habria que realizar campanas para que los ciudadanos utilizaramos mas la bicicleta para desplazarnos por la ciudad', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['7'],
																																		data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['7'],
																																		data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['7']],
				['Falta de bici estacionamientos accesibles y seguros', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['6'],
																		data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['6'],
																		data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['6']],
				['En mi ciudad deberia haber mas bicicletas y menos coches', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['5'],
																			data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['5'],
																			data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['5']],
				['La bicicleta es un buen modo para la activacion fisica y/o deporte, pero no para desplazarse en la ciudad', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['4'],
																																data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['4'],
																																data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['4']],
				['Mi ciudad tendria que estar mejor adaptada para el uso de la bicicleta', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['3'],
																							data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['3'],
																							data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['3']],
				['La bicicleta no es un modo adecuado para desplazarse dentro de las ciudades', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['2'],
																							data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['2'],
																							data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['2']],
				['Las instituciones de gobierno no adoptan medidas...', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['1'],
																		data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['1'],
																		data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['1']],
				['La bicicleta es un modo de transporte urbano que deberia utilizarse mas', data_nivel_de_concordancia[filter_sexo]['De acuerdo']['0'],
																							data_nivel_de_concordancia[filter_sexo]['En desacuerdo']['0'],
																							data_nivel_de_concordancia[filter_sexo]['Ni de acuerdo ni en desacuerdo']['0']]

			]);

        var options = {
			width: 950,
			height: 900,
			fontSize: 12,
			title: 'NIVEL DE CONCORDANCIA',
			titleTextStyle: {color: 'black', fontSize: 16, bold: true},
			chartArea: {left:350},
			isStacked: 'percent',
			colors:['#633729','#CB6E2D', '#FEB346'],
			legend: {position: 'top'},
			annotations: { textStyle: {
				fontSize: 11}
			}
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

		var chart = new google.visualization.BarChart(document.getElementById('nivel_de_concordancia'));
		chart.draw(view, options);
	  };

	  function drawBarChartFalta(filter_sexo) {

		  if(null == filter_sexo)
			filter_sexo = 'todos';

		var data = new google.visualization.arrayToDataTable([
				['Falta', 'Cantidad'],
				['La bicicleta es un modo de transporte urbano que deberia utilizarse mas', data_falta[filter_sexo]['0']],
				['Las instituciones de gobierno no adoptan medidas para que, de verdad...', data_falta[filter_sexo]['1']],
				['Falta de bici estacionamientos accesibles y seguros', data_falta[filter_sexo]['2']],
				['Habria que realizar campanas para que los ciudadanos utilizaramos mas la bicicleta para desplazarnos por la ciudad', data_falta[filter_sexo]['3']],
				['En mi ciudad deberia haber mas bicicletas y menos coches', data_falta[filter_sexo]['4']]
			]);

        var options = {
			width: 950,
			height: 500,
			fontSize: 12,
			title: 'FALTA',
			titleTextStyle: {color: 'black', fontSize: 16, bold: true},
			chartArea: {left:350},
			colors:['#633729','#CB6E2D', '#FEB346'],
			legend: {position: 'top'},
			hAxis: {minValue: 0, maxValue: 100},
			annotations: { textStyle: {
				fontSize: 11}
			}
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
						}]);

		var chart = new google.visualization.BarChart(document.getElementById('falta'));
		chart.draw(view, options);
	  };


	$('#nav-resdata-tab').on('click', function() {
		
		setTimeout(function() {
			
	  google.charts.load('current', {'packages':['corechart','bar']});
      

      
	  google.charts.setOnLoadCallback(drawPieChart);
	  google.charts.setOnLoadCallback(drawColumnChart);
	  google.charts.setOnLoadCallback(drawBarChart);
	  google.charts.setOnLoadCallback(drawBarChartNivelDeProb);
	  google.charts.setOnLoadCallback(drawBarChartNivelDeConcordancia);
	  google.charts.setOnLoadCallback(drawBarChartFalta);

		}, 300);
	});
  

	$('#filtro_sexo').change( function() {
		
		var filtro_sexo = $('#filtro_sexo').val();
		google.charts.setOnLoadCallback(function() { drawColumnChart(filtro_sexo); });
		google.charts.setOnLoadCallback(function() { drawBarChart(filtro_sexo); });
		google.charts.setOnLoadCallback(function() { drawBarChartNivelDeProb(filtro_sexo); });
		google.charts.setOnLoadCallback(function() { drawBarChartNivelDeConcordancia(filtro_sexo); });
		google.charts.setOnLoadCallback(function() { drawBarChartFalta(filtro_sexo); });
	});
});
</script>