<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Encuesta $encuesta
 */
?>
<style>
    #error-utiliza-bicicleta {
          color:red;
        display:none;
    }
</style>
<div class="row">
    <div class="column-responsive column-80">
        <div class="encuestas form content">
         <?= $this->Form->create($encuesta,['id'=> 'forma_encuesta', 'url' => '/Encuestas/add', 'class' => 'form-control']) ?>
        
                <legend><?= __('Encuesta de seguimiento') ?></legend>
                <table width='80%' border=1>
                    <tr> 
						<th>¿Utiliza bicileta?(propia, prestada, rentada)?* </th>
						<td>
							 <div class="form-group">
							 	<input type="radio" name="utiliza_bicileta" id="utiliza_bicileta-si" value="si" required='required' class="form-check-input"> Si
								<input type="radio" name="utiliza_bicileta" id="utiliza_bicileta-no" value="no" required='required' class="form-check-input"> No
								<div id="error_utiliza_bicicleta">Seleccione una opción</div>
							 </div>
						</td>
					</tr>
                </table>
                <br/><br/>
                <table width='80%' border=1>
					<tr>
						<th colspan="5">¿Con que frecuencia utilizas la bicicleta?</th>
					</tr>
		   
					<tr>
						<th>&nbsp; </th>
						<th>Habitualmente </th>
						<th>Con bastante frecuencia </th>
						<th>Ocacionalmente </th>
						<th>Nunca</th>
					</tr>
		   
					<tr>
						<td>Como actividad de ocio o deportiva</td>
						
						<td>
							<input type="radio" name="fub_ocio_deportiva" id="fub_ocio_deportiva" value="habitualmente" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="fub_ocio_deportiva" id="fub_ocio_deportiva2" value="bastante_frecuencia" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="fub_ocio_deportiva" id="fub_ocio_deportiva3" value="ocasionalmente" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="fub_ocio_deportiva" id="fub_ocio_deportiva4" value="nunca" required='required' class="form-check-input">
							<div id="error_fub_ocio_deportiva">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Como modo de transporte</td>
						
						<td>
							<input type="radio" name="fub_transporte" id="fub_transporte" value="habitualmente" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="fub_transporte" id="fub_transporte2" value="bastante_frecuencia" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="fub_transporte" id="fub_transporte3" value="ocasionalmente" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="fub_transporte" id="fub_transporte4" value="nunca" required='required' class="form-check-input">
							<div id="error_fub_transporte">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Para ir a trabajar</td>
						
						<td>
							<input type="radio" name="fub_ir_trabajar" id="fub_ir_trabajar" value="habitualmente" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="fub_ir_trabajar" id="fub_ir_trabajar2" value="bastante_frecuencia" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="fub_ir_trabajar" id="fub_ir_trabajar3" value="ocasionalmente" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="fub_ir_trabajar" id="fub_ir_trabajar4" value="nunca" required='required' class="form-check-input">
							<div id="error_fub_ir_trabajar">Seleccione una opción</div>
						</td>
					</tr>

                </table>

                <br/><br/>

				<table width='80%' border=1>
					<tr>
						<th colspan="4">Indique la importancia que tienen las cuestiones siguientes en cuanto suponene dificultdes para desplazarte por este medio.</th>
					</tr>
		   
					<tr>
						<th>&nbsp; </th>
						<th>Es un problema </th>
						<th>Es un problema pero no importante </th>
						<th>No es un problema </th>
					</tr>
		   
					<tr>
						<td>Sacar y meter la bicileta de mi domicilio</td>
						<td>
							<input type="radio" name="idd_sacar_meter_domicilio" id="idd_sacar_meter_domicilio" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_sacar_meter_domicilio" id="idd_sacar_meter_domicilio2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_sacar_meter_domicilio" id="idd_sacar_meter_domicilio3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_sacar_meter_domicilio">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>No poder llevar la bicileta en los transportes públicos(Ruta,autobús,etc.)</td>
						<td>
							<input type="radio" name="idd_no_transporte_publico" id="idd_no_transporte_publico" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_no_transporte_publico" id="idd_no_transporte_publico2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_no_transporte_publico" id="idd_no_transporte_publico3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_no_transporte_publico">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Peligro de robos cuando la dejo estacionada.</td>
						<td>
							<input type="radio" name="idd_robo_estacionada" id="idd_robo_estacionada" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_robo_estacionada" id="idd_robo_estacionada2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_robo_estacionada" id="idd_robo_estacionada3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_robo_estacionada">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Dificultad para dejarla estacionada en un lugar seguro fuera de casa</td>
						<td>
							<input type="radio" name="idd_dificultad_estacionada_seguro" id="idd_dificultad_estacionada_seguro" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_dificultad_estacionada_seguro" id="idd_dificultad_estacionada_seguro2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_dificultad_estacionada_seguro" id="idd_dificultad_estacionada_seguro3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_dificultad_estacionada_seguro">Seleccione una opción</div>
						</td>
					</tr>
					
					<tr>
						<td>Falta de ciclovía (Calles mal diseñadas)</td>
						<td>
							<input type="radio" name="idd_falta_ciclovia" id="idd_falta_ciclovia" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_falta_ciclovia" id="idd_falta_ciclovia2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_falta_ciclovia" id="idd_falta_ciclovia3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_falta_ciclovia">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Vías con alto flujo vehicular</td>
						<td>
							<input type="radio" name="idd_vias_alto_flujo" id="idd_vias_alto_flujo" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_vias_alto_flujo" id="idd_vias_alto_flujo2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_vias_alto_flujo" id="idd_vias_alto_flujo3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_vias_alto_flujo">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>La invasión de ciclovías por peatones y coches</td>
						<td>
							<input type="radio" name="idd_invacion_ciclovias_peatones_coches" id="idd_invacion_ciclovias_peatones_coches" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_invacion_ciclovias_peatones_coches" id="idd_invacion_ciclovias_peatones_coches2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_invacion_ciclovias_peatones_coches" id="idd_invacion_ciclovias_peatones_coches3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_invacion_ciclovias_peatones_coches">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Conflictos con los conductores de los automoviles,motos o autobuses, que no respetan a los ciclistas</td>
						<td>
							<input type="radio" name="idd_conflictos_conductores_automoviles_motos_autobuses" id="idd_conflictos_conductores_automoviles_motos_autobuses" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_conflictos_conductores_automoviles_motos_autobuses" id="idd_conflictos_conductores_automoviles_motos_autobuses2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_conflictos_conductores_automoviles_motos_autobuses" id="idd_conflictos_conductores_automoviles_motos_autobuses3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_conflictos_conductores_automoviles_motos_autobuses">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Conflicto con los peatones, que no respetan a los ciclistas</td>
						<td>
							<input type="radio" name="idd_conflictos_peatones_no_respetan" id="idd_conflictos_peatones_no_respetan" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_conflictos_peatones_no_respetan" id="idd_conflictos_peatones_no_respetan2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_conflictos_peatones_no_respetan" id="idd_conflictos_peatones_no_respetan3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_conflictos_peatones_no_respetan">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>No conocer bien las normas para circular, las señales, direcciones de las calzadas, etc</td>
						<td>
							<input type="radio" name="idd_no_conocer_normas" id="idd_no_conocer_normas" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_no_conocer_normas" id="idd_no_conocer_normas2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_no_conocer_normas" id="idd_no_conocer_normas3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_no_conocer_normas">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Conflictos con otros ciclistas.</td>
						<td>
							<input type="radio" name="idd_conflictos_otros_ciclistas" id="idd_conflictos_otros_ciclistas" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_conflictos_otros_ciclistas" id="idd_conflictos_otros_ciclistas2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_conflictos_otros_ciclistas" id="idd_conflictos_otros_ciclistas3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_conflictos_otros_ciclistas">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>El peligro que supone la circulación en la ciudad.</td>
						<td>
							<input type="radio" name="idd_peligro_circulacion_ciudad" id="idd_peligro_circulacion_ciudad" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_peligro_circulacion_ciudad" id="idd_peligro_circulacion_ciudad2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="idd_peligro_circulacion_ciudad" id="idd_peligro_circulacion_ciudad3" value="no_problema" required='required' class="form-check-input">
							<div id="error_idd_peligro_circulacion_ciudad">Seleccione una opción</div>
						</td>
					</tr>
                </table>

                <br/><br/>


				<table width='80%' border=1>
					<tr>
						<th colspan="4">Si no eres usuario de bicleta, indica la importancia que para ti tienen las cuestiones siguientes en cuanto suponen dificultades para desplazarse por este medio.</th>
					</tr>
		   
					<tr>
						<th>&nbsp; </th>
						<th>Es un problema </th>
						<th>Es un problema pero no importante </th>
						<th>No es un problema </th>
					</tr>
		   
					<tr>
						<td>No disponer de bicicleta.</td>
						<td>
							<input type="radio" name="nub_no_disponer_bicicleta" id="nub_no_disponer_bicicleta" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_no_disponer_bicicleta" id="nub_no_disponer_bicicleta2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_no_disponer_bicicleta" id="nub_no_disponer_bicicleta3" value="no_problema" required='required' class="form-check-input">
							<div id="error_nub_no_disponer_bicicleta">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>No tener condición fisica adecuada para rodar en bicicleta</td>
						<td>
							<input type="radio" name="nub_no_condicion_fisica" id="nub_no_condicion_fisica" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_no_condicion_fisica" id="nub_no_condicion_fisica2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_no_condicion_fisica" id="nub_no_condicion_fisica3" value="no_problema" required='required' class="form-check-input">
							<div id="error_nub_no_condicion_fisica">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Sacar y meter la bicicleta de mi domicilio</td>
						<td>
							<input type="radio" name="nub_sacar_meter_bicileta" id="nub_sacar_meter_bicileta" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_sacar_meter_bicileta" id="nub_sacar_meter_bicileta2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_sacar_meter_bicileta" id="nub_sacar_meter_bicileta3" value="no_problema" required='required' class="form-check-input">
							<div id="error_nub_sacar_meter_bicileta">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>La imagen social poco adecuada que daria desplazarme en bicicleta, teniendo en cuenta mi edad o situación.</td>
						<td>
							<input type="radio" name="nub_imagen_social" id="nub_imagen_social" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_imagen_social" id="nub_imagen_social2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_imagen_social" id="nub_imagen_social3" value="no_problema" required='required' class="form-check-input">
							<div id="error_nub_imagen_social">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>No poder llevar la bicleta en los transportes publicos(metrobus, autobus,etc)</td>
						<td>
							<input type="radio" name="nub_no_poder_llevar_bici_transporte" id="nub_no_poder_llevar_bici_transporte" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_no_poder_llevar_bici_transporte" id="nub_no_poder_llevar_bici_transporte2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_no_poder_llevar_bici_transporte" id="nub_no_poder_llevar_bici_transporte3" value="no_problema" required='required' class="form-check-input">
							<div id="error_nub_no_poder_llevar_bici_transporte">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Conflictos con los conductores de los automoviles, motos o autobuses que no respetan a los ciclistas</td>
						<td>
							<input type="radio" name="nub_conflictos_conductores_autobuses" id="nub_conflictos_conductores_autobuses" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_conflictos_conductores_autobuses" id="nub_conflictos_conductores_autobuses2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_conflictos_conductores_autobuses" id="nub_conflictos_conductores_autobuses3" value="no_problema" required='required' class="form-check-input">
							<div id="error_nub_conflictos_conductores_autobuses">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Conflictos con los peatones que no respetan a los ciclistas</td>
						<td>
							<input type="radio" name="nub_conflictos_peatones" id="nub_conflictos_peatones" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_conflictos_peatones" id="nub_conflictos_peatones2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_conflictos_peatones" id="nub_conflictos_peatones3" value="no_problema" required='required' class="form-check-input">
							<div id="error_nub_conflictos_peatones">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>Conflictos con otros ciclistas</td>
						<td>
							<input type="radio" name="nub_conflictos_otros_ciclistas" id="nub_conflictos_otros_ciclistas" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_conflictos_otros_ciclistas" id="nub_conflictos_otros_ciclistas2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_conflictos_otros_ciclistas" id="nub_conflictos_otros_ciclistas3" value="no_problema" required='required' class="form-check-input">
							<div id="error_nub_conflictos_otros_ciclistas">Seleccione una opción</div>
						</td>
					</tr>

					<tr>
						<td>El peligro que supone la circulación en la ciudad.</td>
						<td>
							<input type="radio" name="nub_peligro_circulacion_ciudad" id="nub_peligro_circulacion_ciudad" value="problema" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_peligro_circulacion_ciudad" id="nub_peligro_circulacion_ciudad2" value="problema_no_importante" required='required' class="form-check-input">
						</td>

						<td>
							<input type="radio" name="nub_peligro_circulacion_ciudad" id="nub_peligro_circulacion_ciudad3" value="no_problema" required='required' class="form-check-input">
							<div id="error_nub_peligro_circulacion_ciudad">Seleccione una opción</div>
						</td>
					</tr>
                </table>

                <br/><br/>

                    <table width="80%">
                    <tr>
                        <th>¿Qué beneficios consideras que trae consigo el uso de la bicicleta?</th>
                        <td><?= $this->Form->textarea('beneficios_considera',['class' => 'form-control','value'=>'','required'=>'required']);?>
                        <div id="error_beneficios_considera">Seleccione una opción</div>
                    </td>
                    </tr>
                </table>        
                <br/><br/>
                <table>
                    <tr>
                        <th>
                            ¿En qué espacios públicos consideras que son necesarios los bici estacionamientos? &nbsp;<input type="button" class="btn btn-mapa" name="" value="Abrir Mapa" data-bs-toggle="modal" data-bs-target="#mapa-modal">
							<div id="here"><div>
                        </th>
                    </tr>
                    <tr>
                        <td><?= $this->Form->input('coordenadas', ['id'=>'coordenadas','hidden' => true,'value'=>'']);?>
							<div id="error_coordenadas">Seleccione una ubicación en el mapa.</div>
						</td>
                    </tr>
                </table>
                <br/><br/>


            <?= $this->Form->button(__('Guardar'),['class'=>'btn btn-warning', 'id' => 'btn-save-encuesta']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<div class="modal fade" id="mapa-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-fullscreen">
		<div class="modal-content modal-morado">
			<div class="modal-header">
				<div class="modal-titulo text-center" id="exampleModalLabel">Selección de Ubicación</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<input id="searchInput" class="controls"  type="text" placeholder="Escriba una dirección">
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2"> </div>
						<div class="col-md-8 col-lg-8 col-xl-8 col-xxl-8">
							<div id="maps"></div>
							<div class="col-md-12">
								<ul id="geoData">
									<li>Direccion: <span id="location"></span></li>
									<li>CP: <span id="postal_code"></span></li>
									<li>Pais: <span id="country"></span></li>
									<li>Latitud: <span id="lat"></span></li>
									<li>Longitud: <span id="lon"></span></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 col-lg-2 col-xl-2 col-xxl-2"> </div>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-cerrar" id="btn-cerrar" data-bs-dismiss="modal">Cerrar</button>
				
				<?= $this->Form->button(__('Seleccionar'), ['class' => 'btn btn-warning2', 'data-bs-dismiss'=>'modal']) ?>
			</div>
		</div>
	</div>
</div>



<script>
$('#forma_encuesta').on('submit', function() {
   
    let coordenadas  = document.querySelector("#coordenadas");

    if( coordenadas.value == '' ){
        document.querySelector("#error_coordenadas").style.display='block';  
        document.querySelector("#error_coordenadas").onfocus;
          return false;
    }else{
        document.querySelector("#error_coordenadas").style.display='none'; 
    }
});

</script>