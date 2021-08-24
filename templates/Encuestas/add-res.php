<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Encuesta $encuesta
 */
?>




<div class="row">
    <div class="column-responsive column-80">
        <div class="encuestas form content form-control">
			<div class="container">
				<div class="row">
					<div class="col-6">
						<table width="100%" border=1>
							<tr>
								<th>¿Utiliza bicileta?(propia, prestada, rentada)?*</th>
								<td>
									<?= $this->Form->radio('utiliza_bicileta',[['class'=>'form-check-input','id'=>'utiliza_bicileta','value'=>'si','text'=>'Si','disabled'=>'disabled'],['class'=>'form-check-input','id'=>'utiliza_bicileta','value'=>'no','text'=>'No','disabled'=>'disabled']], ['disabled' => 'disabled']);?>
								</td>
							</tr>
						</table>   
					</div>
					<div class="col-6 center">
						<script type="text/javascript">
							google.load('visualization', '1.0', {'packages':['corechart']});
							google.setOnLoadCallback(drawChart);
							function drawChart() {

							var data = new google.visualization.DataTable();
							data.addColumn('string', 'Topping');
							data.addColumn('number', 'Slices');
							data.addRows([
								<?php
								foreach($utiliza_biciletaSql as $fila){
									echo "['".$fila->utiliza_bicileta."', ".$fila->count."],";
								}
								?>
							]);

							var options = {'title':'Utiliza Bicicleta',
											'width':300,
											'height':200};
							var chart = new google.visualization.PieChart(document.getElementById('chart_utiliza_bicileta'));
							chart.draw(data, options);
							}
						</script>

						<div id="chart_utiliza_bicileta"></div>                            
					</div>
				</div>
			
				<div class="espacio"></div>

				<div class="row">
					<div class="col-12">
						<table border=1>
							<tr>
								<th colspan="5">¿Con que frecuencia utilizas la bicicleta?</th>
							</tr>
				   
							<tr>
								<th>&nbsp; </th>
								<th>Habitualmente </th>
								<th>Con bastante frecuencia </th>
								<th>Ocasionalmente </th>
								<th>Nunca</th>
							</tr>
				   
							<tr>
								<td>Como actividad de ocio o deportiva</td>
								
								<td>
									<input type="radio" name="fub_ocio_deportiva" id="fub_ocio_deportiva" value="habitualmente" disabled class="form-check-input" <?= $encuesta->fub_ocio_deportiva == 'habitualmente' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="fub_ocio_deportiva" id="fub_ocio_deportiva2" value="bastante_frecuencia" disabled class="form-check-input" <?= $encuesta->fub_ocio_deportiva == 'bastante_frecuencia' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="fub_ocio_deportiva" id="fub_ocio_deportiva3" value="ocasionalmente" disabled class="form-check-input" <?= $encuesta->fub_ocio_deportiva == 'ocasionalmente' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="fub_ocio_deportiva" id="fub_ocio_deportiva4" value="nunca" disabled class="form-check-input" <?= $encuesta->fub_ocio_deportiva == 'nunca' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>Como modo de transporte</td>
								
								<td>
									<input type="radio" name="fub_transporte" id="fub_transporte" value="habitualmente" disabled class="form-check-input" <?= $encuesta->fub_transporte == 'habitualmente' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="fub_transporte" id="fub_transporte2" value="bastante_frecuencia" disabled class="form-check-input" <?= $encuesta->fub_transporte == 'bastante_frecuencia' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="fub_transporte" id="fub_transporte3" value="ocasionalmente" disabled class="form-check-input" <?= $encuesta->fub_transporte == 'ocasionalmente' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="fub_transporte" id="fub_transporte4" value="nunca" required='required' class="form-check-input" <?= $encuesta->fub_transporte == 'nunca' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>Para ir a trabajar</td>
								
								<td>
									<input type="radio" name="fub_ir_trabajar" id="fub_ir_trabajar" value="habitualmente" disabled class="form-check-input" <?= $encuesta->fub_ir_trabajar == 'habitualmente' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="fub_ir_trabajar" id="fub_ir_trabajar2" value="bastante_frecuencia" disabled class="form-check-input" <?= $encuesta->fub_ir_trabajar == 'bastante_frecuencia' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="fub_ir_trabajar" id="fub_ir_trabajar3" value="ocasionalmente" disabled class="form-check-input" <?= $encuesta->fub_ir_trabajar == 'ocasionalmente' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="fub_ir_trabajar" id="fub_ir_trabajar4" value="nunca" disabled class="form-check-input" <?= $encuesta->fub_ir_trabajar == 'nunca' ? 'checked' : ''; ?>>
								</td>
							</tr>

						</table>
					</div>         

				<div class="row">
					<div class="col-12">
						<div id="grafica_utiliza_bicicleta" class="gchart"></div>
					</div>
				</div>
			
				<div class="espacio"></div>

				<div class="row">
					<div class="col-12">
						<table border="1">
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
									<input type="radio" name="idd_sacar_meter_domicilio" id="idd_sacar_meter_domicilio" value="problema" disabled class="form-check-input" <?= $encuesta->idd_sacar_meter_domicilio == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_sacar_meter_domicilio" id="idd_sacar_meter_domicilio2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_sacar_meter_domicilio == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_sacar_meter_domicilio" id="idd_sacar_meter_domicilio3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_sacar_meter_domicilio == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>No poder llevar la bicileta en los transportes públicos(Ruta,autobús,etc.)</td>
								<td>
									<input type="radio" name="idd_no_transporte_publico" id="idd_no_transporte_publico" value="problema" disabled class="form-check-input" <?= $encuesta->idd_no_transporte_publico == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_no_transporte_publico" id="idd_no_transporte_publico2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_no_transporte_publico == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_no_transporte_publico" id="idd_no_transporte_publico3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_no_transporte_publico == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>Peligro de robos cuando la dejo estacionada.</td>
								<td>
									<input type="radio" name="idd_robo_estacionada" id="idd_robo_estacionada" value="problema" disabled class="form-check-input" <?= $encuesta->idd_robo_estacionada == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_robo_estacionada" id="idd_robo_estacionada2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_robo_estacionada == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_robo_estacionada" id="idd_robo_estacionada3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_robo_estacionada == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>Dificultad para dejarla estacionada en un lugar seguro fuera de casa</td>
								<td>
									<input type="radio" name="idd_dificultad_estacionada_seguro" id="idd_dificultad_estacionada_seguro" value="problema" disabled class="form-check-input" <?= $encuesta->idd_dificultad_estacionada_seguro == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_dificultad_estacionada_seguro" id="idd_dificultad_estacionada_seguro2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_dificultad_estacionada_seguro == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_dificultad_estacionada_seguro" id="idd_dificultad_estacionada_seguro3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_dificultad_estacionada_seguro == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>
							
							<tr>
								<td>Falta de ciclovía (Calles mal diseñadas)</td>
								<td>
									<input type="radio" name="idd_falta_ciclovia" id="idd_falta_ciclovia" value="problema" disabled class="form-check-input" <?= $encuesta->idd_falta_ciclovia == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_falta_ciclovia" id="idd_falta_ciclovia2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_falta_ciclovia == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_falta_ciclovia" id="idd_falta_ciclovia3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_falta_ciclovia == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>Vías con alto flujo vehicular</td>
								<td>
									<input type="radio" name="idd_vias_alto_flujo" id="idd_vias_alto_flujo" value="problema" disabled class="form-check-input" <?= $encuesta->idd_vias_alto_flujo == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_vias_alto_flujo" id="idd_vias_alto_flujo2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_vias_alto_flujo == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_vias_alto_flujo" id="idd_vias_alto_flujo3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_vias_alto_flujo == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>La invasión de ciclovías por peatones y coches</td>
								<td>
									<input type="radio" name="idd_invacion_ciclovias_peatones_coches" id="idd_invacion_ciclovias_peatones_coches" value="problema" disabled class="form-check-input" <?= $encuesta->idd_invacion_ciclovias_peatones_coches == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_invacion_ciclovias_peatones_coches" id="idd_invacion_ciclovias_peatones_coches2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_invacion_ciclovias_peatones_coches == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_invacion_ciclovias_peatones_coches" id="idd_invacion_ciclovias_peatones_coches3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_invacion_ciclovias_peatones_coches == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>Conflictos con los conductores de los automoviles,motos o autobuses, que no respetan a los ciclistas</td>
								<td>
									<input type="radio" name="idd_conflictos_conductores_automoviles_motos_autobuses" id="idd_conflictos_conductores_automoviles_motos_autobuses" value="problema" disabled class="form-check-input" <?= $encuesta->idd_conflictos_conductores_automoviles_motos_autobuses == 'nunca' ? 'problema' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_conflictos_conductores_automoviles_motos_autobuses" id="idd_conflictos_conductores_automoviles_motos_autobuses2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_conflictos_conductores_automoviles_motos_autobuses == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_conflictos_conductores_automoviles_motos_autobuses" id="idd_conflictos_conductores_automoviles_motos_autobuses3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_conflictos_conductores_automoviles_motos_autobuses == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>Conflicto con los peatones, que no respetan a los ciclistas</td>
								<td>
									<input type="radio" name="idd_conflictos_peatones_no_respetan" id="idd_conflictos_peatones_no_respetan" value="problema" disabled class="form-check-input" <?= $encuesta->idd_conflictos_peatones_no_respetan == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_conflictos_peatones_no_respetan" id="idd_conflictos_peatones_no_respetan2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_conflictos_peatones_no_respetan == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_conflictos_peatones_no_respetan" id="idd_conflictos_peatones_no_respetan3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_conflictos_peatones_no_respetan == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>No conocer bien las normas para circular, las señales, direcciones de las calzadas, etc</td>
								<td>
									<input type="radio" name="idd_no_conocer_normas" id="idd_no_conocer_normas" value="problema" disabled class="form-check-input" <?= $encuesta->idd_no_conocer_normas == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_no_conocer_normas" id="idd_no_conocer_normas2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_no_conocer_normas == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_no_conocer_normas" id="idd_no_conocer_normas3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_no_conocer_normas == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>Conflictos con otros ciclistas.</td>
								<td>
									<input type="radio" name="idd_conflictos_otros_ciclistas" id="idd_conflictos_otros_ciclistas" value="problema" disabled class="form-check-input" <?= $encuesta->idd_conflictos_otros_ciclistas == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_conflictos_otros_ciclistas" id="idd_conflictos_otros_ciclistas2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_conflictos_otros_ciclistas == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_conflictos_otros_ciclistas" id="idd_conflictos_otros_ciclistas3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_conflictos_otros_ciclistas == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>El peligro que supone la circulación en la ciudad.</td>
								<td>
									<input type="radio" name="idd_peligro_circulacion_ciudad" id="idd_peligro_circulacion_ciudad" value="problema" disabled class="form-check-input" <?= $encuesta->idd_peligro_circulacion_ciudad == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_peligro_circulacion_ciudad" id="idd_peligro_circulacion_ciudad2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->idd_peligro_circulacion_ciudad == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="idd_peligro_circulacion_ciudad" id="idd_peligro_circulacion_ciudad3" value="no_problema" disabled class="form-check-input" <?= $encuesta->idd_peligro_circulacion_ciudad == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>
						</table>
					</div>
				</div>
		
				<div class="row">
					<div class="col-md-12">
						<div id="grafica_importancia_uitiliza_bicicleta" class="gchart"></div>
					</div>
				</div>
			
				<div class="espacio"></div>

				<div class="row">
					<div class="col-12">
					   <table border="1">
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
									<input type="radio" name="nub_no_disponer_bicicleta" id="nub_no_disponer_bicicleta" value="problema" disabled class="form-check-input" <?= $encuesta->nub_no_disponer_bicicleta == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_no_disponer_bicicleta" id="nub_no_disponer_bicicleta2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->nub_no_disponer_bicicleta == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_no_disponer_bicicleta" id="nub_no_disponer_bicicleta3" value="no_problema" disabled class="form-check-input" <?= $encuesta->nub_no_disponer_bicicleta == 'no_problema' ? 'checked' : ''; ?>>
								</td>
							</tr>

							<tr>
								<td>No tener condición fisica adecuada para rodar en bicicleta</td>
								<td>
									<input type="radio" name="nub_no_condicion_fisica" id="nub_no_condicion_fisica" value="problema" disabled class="form-check-input" <?= $encuesta->nub_no_condicion_fisica == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_no_condicion_fisica" id="nub_no_condicion_fisica2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->nub_no_condicion_fisica == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_no_condicion_fisica" id="nub_no_condicion_fisica3" value="no_problema" disabled class="form-check-input" <?= $encuesta->nub_no_condicion_fisica == 'no_problema' ? 'checked' : ''; ?>>
									
								</td>
							</tr>

							<tr>
								<td>Sacar y meter la bicicleta de mi domicilio</td>
								<td>
									<input type="radio" name="nub_sacar_meter_bicileta" id="nub_sacar_meter_bicileta" value="problema" disabled class="form-check-input" <?= $encuesta->nub_sacar_meter_bicileta == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_sacar_meter_bicileta" id="nub_sacar_meter_bicileta2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->nub_sacar_meter_bicileta == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_sacar_meter_bicileta" id="nub_sacar_meter_bicileta3" value="no_problema" disabled class="form-check-input" <?= $encuesta->nub_sacar_meter_bicileta == 'no_problema' ? 'checked' : ''; ?>>
									
								</td>
							</tr>

							<tr>
								<td>La imagen social poco adecuada que daria desplazarme en bicicleta, teniendo en cuenta mi edad o situación.</td>
								<td>
									<input type="radio" name="nub_imagen_social" id="nub_imagen_social" value="problema" disabled class="form-check-input" <?= $encuesta->nub_imagen_social == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_imagen_social" id="nub_imagen_social2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->nub_imagen_social == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_imagen_social" id="nub_imagen_social3" value="no_problema" disabled class="form-check-input" <?= $encuesta->nub_imagen_social == 'no_problema' ? 'checked' : ''; ?>>
									
								</td>
							</tr>

							<tr>
								<td>No poder llevar la bicleta en los transportes publicos(metrobus, autobus,etc)</td>
								<td>
									<input type="radio" name="nub_no_poder_llevar_bici_transporte" id="nub_no_poder_llevar_bici_transporte" value="problema" disabled class="form-check-input" <?= $encuesta->nub_no_poder_llevar_bici_transporte == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_no_poder_llevar_bici_transporte" id="nub_no_poder_llevar_bici_transporte2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->nub_no_poder_llevar_bici_transporte == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_no_poder_llevar_bici_transporte" id="nub_no_poder_llevar_bici_transporte3" value="no_problema" disabled class="form-check-input" <?= $encuesta->nub_no_poder_llevar_bici_transporte == 'no_problema' ? 'checked' : ''; ?>>
									
								</td>
							</tr>

							<tr>
								<td>Conflictos con los conductores de los automoviles, motos o autobuses que no respetan a los ciclistas</td>
								<td>
									<input type="radio" name="nub_conflictos_conductores_autobuses" id="nub_conflictos_conductores_autobuses" value="problema" disabled class="form-check-input" <?= $encuesta->nub_conflictos_conductores_autobuses == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_conflictos_conductores_autobuses" id="nub_conflictos_conductores_autobuses2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->nub_conflictos_conductores_autobuses == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_conflictos_conductores_autobuses" id="nub_conflictos_conductores_autobuses3" value="no_problema" disabled class="form-check-input" <?= $encuesta->nub_conflictos_conductores_autobuses == 'no_problema' ? 'checked' : ''; ?>>
									
								</td>
							</tr>

							<tr>
								<td>Conflictos con los peatones que no respetan a los ciclistas</td>
								<td>
									<input type="radio" name="nub_conflictos_peatones" id="nub_conflictos_peatones" value="problema" disabled class="form-check-input" <?= $encuesta->nub_conflictos_peatones == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_conflictos_peatones" id="nub_conflictos_peatones2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->nub_conflictos_peatones == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_conflictos_peatones" id="nub_conflictos_peatones3" value="no_problema" disabled class="form-check-input" <?= $encuesta->nub_conflictos_peatones == 'no_problema' ? 'checked' : ''; ?>>
									
								</td>
							</tr>

							<tr>
								<td>Conflictos con otros ciclistas</td>
								<td>
									<input type="radio" name="nub_conflictos_otros_ciclistas" id="nub_conflictos_otros_ciclistas" value="problema" disabled class="form-check-input" <?= $encuesta->nub_conflictos_otros_ciclistas == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_conflictos_otros_ciclistas" id="nub_conflictos_otros_ciclistas2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->nub_conflictos_otros_ciclistas == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_conflictos_otros_ciclistas" id="nub_conflictos_otros_ciclistas3" value="no_problema" disabled class="form-check-input" <?= $encuesta->nub_conflictos_otros_ciclistas == 'no_problema' ? 'checked' : ''; ?>>
									
								</td>
							</tr>

							<tr>
								<td>El peligro que supone la circulación en la ciudad.</td>
								<td>
									<input type="radio" name="nub_peligro_circulacion_ciudad" id="nub_peligro_circulacion_ciudad" value="problema" disabled class="form-check-input" <?= $encuesta->nub_peligro_circulacion_ciudad == 'problema' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_peligro_circulacion_ciudad" id="nub_peligro_circulacion_ciudad2" value="problema_no_importante" disabled class="form-check-input" <?= $encuesta->nub_peligro_circulacion_ciudad == 'problema_no_importante' ? 'checked' : ''; ?>>
								</td>

								<td>
									<input type="radio" name="nub_peligro_circulacion_ciudad" id="nub_peligro_circulacion_ciudad3" value="no_problema" disabled class="form-check-input" <?= $encuesta->nub_peligro_circulacion_ciudad == 'no_problema' ? 'checked' : ''; ?>>
									
								</td>
							</tr>
						</table> 
					</div>
				</div>
		   
				<div class="espacio"></div>

				<div class="row">
					<div class="col-12">
						<div id="strSinBicicleta" class="gchart"></div>
					</div>
						
				</div>
				
				<div class="row">
					<div class="col-12">
						<strong><span>¿Qué beneficios consideras que trae consigo el uso de la bicicleta?</span></strong>
						<p><?php echo $encuesta->beneficios_considera;?></p>    
					</div>
				</div>

				<div class="espacio"></div>

				<div class="row">
					<div class="col-12">
						<strong><span>¿En qué espacios públicos consideras que son necesarios los bici estacionamientos?</span></strong>    
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<div id="mapa_coordenadas"></div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>


