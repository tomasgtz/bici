<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Encuesta $encuesta
 */
?>




<div class="row">
    
    <div class="column-responsive column-80">
        <div class="encuestas form content">
        <?= $this->Form->create($encuesta,['url' => '/Encuestas/add', 'class' => 'form-control']) ?>
        
            <fieldset>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <table width="100%" border=1>
                                <tr>
                                    <th>¿Utiliza bicileta?(propia, prestada, rentada)?*</th>
                                    <td>
                                        <?= $this->Form->radio('utiliza_bicileta',[['class'=>'radio','id'=>'utiliza_bicileta','value'=>'si','text'=>'Si','required'=>true],['class'=>'radio','id'=>'utiliza_bicileta','value'=>'no','text'=>'No','required'=>true]]);?>
                                        
                                    </td>
                                </tr>
                            </table>   
                        </div>
                        <div class="col-md-6">
                        <script type="text/javascript">
                        google.load('visualization', '1.0', {'packages':['corechart']});
                        google.setOnLoadCallback(drawChart);
                        function drawChart() {
                        // Create the data table.
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
                </div>
  
                
                <div class="espacio"></div>



                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                            <table width='100%' border=1>
                            <tr>
                                <th colspan='6'>¿Con que frecuencia utilizas la bicicleta?</th>
                            </tr>
                            <tr>
                                <td colspan='6'>
                                    <table>
                                        <tr>
                                            <th width='40%'></td>
                                            <th width='10%'>Habitualmente </td>
                                            <th width='10%'>Con bastante <br/> frecuencia </td>
                                            <th width='10%'>Ocasionalmente </td>
                                            <th width='10%'>Nunca</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                                            
                        

                        </div>
                    </div>
                    
                    <div class="espacio"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <table width='100%' border=1>
                            <tr>
                                <th>Como actividad de ocio o deportiva</th>
                                
                                <td width='50%' colspan='5'><?= $this->Form->radio('fub_ocio_deportiva',[['class'=>'radio','value'=>'habitualmente','text'=>''],
                                ['class'=>'radio','value'=>'bastante_frecuencia','text'=>''],
                                ['class'=>'radio','value'=>'ocasionalmente','text'=>''],
                                ['class'=>'radio','value'=>'nunca','text'=>'']]);?>
                                
                            </td>
                            </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                        
        
                        
                        </div>        
                    </div>

                    <div class="espacio"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <table width='100%' border=1>
                            <tr>
                                <th>Como modo de transporte</th>
                                <td width='50%' colspan='5'><?= $this->Form->radio('fub_transporte',[['class'=>'radio','value'=>'habitualmente','text'=>'','required'=>'required'],
                                ['class'=>'radio','value'=>'bastante_frecuencia','text'=>''],
                                ['class'=>'radio','value'=>'ocasionalmente','text'=>''],
            
                                ['class'=>'radio','value'=>'nunca','text'=>'']]);?>
                                
                            </td>
                            </tr>
                            </table>
                            </div>
                            <div class="col-md-6">
                                
                            
                            
                        </div>   
                    </div>    
                    
                    <div class="espacio"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <table width='100%' border=1>
                            <tr>
                                <th>Para ir a trabajar</th>
                                <td width='50%' colspan='5'><?= $this->Form->radio('fub_ir_trabajar',[['class'=>'radio','value'=>'habitualmente','text'=>''],
                                ['class'=>'radio','value'=>'bastante_frecuencia','text'=>''],
                                ['class'=>'radio','value'=>'ocasionalmente','text'=>''],
                                ['class'=>'radio','value'=>'nunca','text'=>'']]);?>
                                
                            </td>

                            </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-6">
                            
                        
                        

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div id="grafica_utiliza_bicicleta" class="gchart"></div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                </div>
                <div class="espacio"></div>
                <div class="espacio"></div>








                <div class="container">
                    <div class="row">
                        <div class="col-md-8">

                        <table width="100%" border=1>
                        <tr>
                            <th colspan='4'>Indique la importancia que tienen las cuestiones siguientes en cuanto suponene dificultdes para desplazarte por este medio.</th>
                        </tr>
                        <tr>
                        <th width='40%'></th><th width='10%'>Es un problema</th><th width='10%'>Es un problema pero<br/> no importante</th><th width='10%'>No es un problema</th>
                        </tr>
                        </table>
                    </div>
                    <div class="col-md-4">

                    </div>
                    </div>
                    
                    <div class="espacio"></div>

                    <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                        <tr>
                            <th width='50%'>Sacar y meter la bicileta de mi domicilio</th>
                            <td width='50%' colspan='3'><?= $this->Form->radio('idd_sacar_meter_domicilio',[['class'=>'radio-d','value'=>'problema','text'=>''],
                            ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                            ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                            
                        </td>
                        </tr>
                        </table>
                        </div>
                    <div class="col-md-4">
                    
                        

                    </div>
                </div>
                
                <div class="espacio"></div>

                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th width='50%'>No poder llevar la bicileta en los transportes<br/> públicos(Ruta,autobús,etc.)</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_no_transporte_publico',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                
                

                    </div>
                </div>
                
                <div class="espacio"></div>

                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th>Peligro de robo cuando la dejo estacionada.</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_robo_estacionada',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                
                
      
                    </div>
                </div>

                <div class="espacio"></div>


                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th width='50%'>Dificultad para dejarla estacionada en un lugar </br>seguro fuera de casa</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_dificultad_estacionada_seguro',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>                    
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                                
                

                    </div>
                </div>

                <div class="espacio"></div>

                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th>Falta de ciclovía(Calles mal diseñadas)</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_falta_ciclovia',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                
                

              
                    </div>
                </div>


                <div class="espacio"></div>


                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th>Vías con alto flujo vehicular</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_vias_alto_flujo',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                
            
                    </div>
                </div>


                <div class="espacio"></div>

                
                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th>La invasión de ciclovías por peatones y coches</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_invacion_ciclovias_peatones_coches',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                
            
                    </div>
                </div>

                <div class="espacio"></div>

                                
                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th width='50%'>Conflictos con los conductores de los automoviles,<br/>motos o autobuses, que no respetan a los ciclistas</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_conflictos_conductores_automoviles_motos_autobuses',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                
                
            
                    </div>
                </div>
                
                <div class="espacio"></div>

                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th width='50%'>Conflicto con los peatones, que no respetan a <br/>los ciclistas</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_conflictos_peatones_no_respetan',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                    </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                
        
                    </div>
                </div>

                <div class="espacio"></div>


                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th width='50%'>No conocer bien las normas para circular, las señales, <br/>direcciones de las calzadas, etc</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_no_conocer_normas',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                
                
                
                    </div>
                </div>

                <div class="espacio"></div>
                
                <div class="row">
                        <div class="col-md-8">
                        <table width='100%' border=1>
                <tr>
                    <th width='50%'>Conflictos con otros ciclistas.</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_conflictos_otros_ciclistas',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                    </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                
            
                    </div>
                </div>

                <div class="espacio"></div>
                                
                <div class="row">
                        <div class="col-md-8">
                <table width='100%' border=1>
                <tr>
                    <th width='50%'>El peligro que supone la circulación en la ciudad.</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('idd_peligro_circulacion_ciudad',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                <div class="col-md-4">
                        
                
                
                
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="grafica_importancia_uitiliza_bicicleta" class="gchart"></div>
                    </div>
                    
                </div>
            </div>


                    
            <div class="espacio"></div>
            <div class="espacio"></div>


            <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                        <table width="100%" border=1>
                        <tr>
                            <th colspan='4' width='50%'>Si no eres usuario de bicleta, indica la importancia que para ti tienen las cuestiones<br/> siguientes en cuanto suponen dificultades para desplazarse por este medio.</th>
                        </tr>
                        <tr>
                            <th width='40%'></th><th width='10%'>Es un problema</th><th width='10%'>Es un problema <br/>pero no importante</th><th width='10%'>No es un problema</th>
                        </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>

                <div class="espacio"></div>



                <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                <tr>
                    <th>No disponer de bicicleta.</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('nub_no_disponer_bicicleta',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </tr>
                </table>
                </div>
                    <div class="col-md-4">
                        
                

                    </div>
                </div>


                <div class="espacio"></div>


                <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                <tr>
                    <th width='50%'>No tener condición fisica <br/>adecuada para rodar en bicicleta</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('nub_no_condicion_fisica',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                    <div class="col-md-4">
                         
                
                    
                    </div>
                </div>

                <div class="espacio"></div>


                <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                <tr>
                    <th>Sacar y meter la bicicleta de mi domicilio</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('nub_sacar_meter_bicileta',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                     
                    </td>
                </tr>
                </table>
                </div>
                    <div class="col-md-4">
                    
                    
                    </div>
                </div>

            <div class="espacio"></div>

            <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                <tr>
                    <th width='50%'>La imagen social poco adecuada que daria desplazarme<br/> en bicicleta, teniendo en cuenta mi edad o situación.</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('nub_imagen_social',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                    <div class="col-md-4">
                    
                    </div>
                </div>

                <div class="espacio"></div>


                <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                <tr>
                    <th width='50%'>No poder llevar la bicleta en los transportes <br/>publicos(metrobus, autobus,etc)</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('nub_no_poder_llevar_bici_transporte',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                    <div class="col-md-4">
                    
                    </div>
                </div>

            <div class="espacio"></div>

            <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                <tr>
                    <th width='50%'>Conflictos con los conductores de los automoviles,<br/> motos o autobuses que no respetan a los ciclistas</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('nub_conflictos_conductores_autobuses',[['class'=>'radio-d','value'=>'problema','text'=>'','checked'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                    </td>
                </tr>
                </table>
                </div>
                    <div class="col-md-4">
                    
          
                    </div>
                </div>

                <div class="espacio"></div>

            <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                <tr>
                    <th width='50%'>Conflictos con los peatones que no<br/> respetan a los ciclistas</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('nub_conflictos_peatones',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                    </td>
                </tr>
                </table>
                </div>
                    <div class="col-md-4">
                    
                    
                    </div>
                </div>
                
                <div class="espacio"></div>

            <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                <tr>
                    <th width='50%'>Conflictos con otros ciclistas</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('nub_conflictos_otros_ciclistas',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                    </td>
                </tr>
                </table>
                </div>
                    <div class="col-md-4">
                    
                    </div>
                </div>

                <div class="espacio"></div>


            <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                <tr>
                    <th width='50%'>El peligro que supone la circulación en la ciudad.</th>
                    <td width='50%' colspan='3'><?= $this->Form->radio('nub_peligro_circulacion_ciudad',[['class'=>'radio-d','value'=>'problema','text'=>''],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>''],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'']]);?>
                    
                </td>
                </tr>
                </table>
                </div>
                    <div class="col-md-4">
                    
                    
                    
                    
                    
                    
                    </div>
                </div>
            

                    <div class="espacio"></div>
   
                    <div class="row">
                <div class="col-md-8">
                        <table width="100%" border=1>
                    <tr>
                        <th width='50%'>¿Qué beneficios consideras que trae consigo el uso de la bicicleta?</th>
                        <td width='50%'><?php //$this->Form->textarea('beneficios_considera',['class' => 'form-control','value'=>'".$encuesta->beneficios_considera;"']);?>
                        <textarea name="textarea" rows="10" cols="50"><?php echo $encuesta->beneficios_considera;?></textarea>
                        
                    </td>
                    </tr>
                </table>     
                </div>
                    <div class="col-md-4">
                    
                    </div>
                </div>
               
                <div class="row">
                <div class="col-md-12">
                
                <div id="strSinBicicleta" class="gchart"></div>
               
                
                </div>
                </div>

                <div class="espacio"></div>

                <div class="row">
                <div class="col-md-8">
                    <table width="100%" border=1>
                    <tr>
                        <th width='50%'>
                            ¿En qué espacios públicos consideras que son necesarios los bici estacionamientos?
                        </th>
                    </tr>
                    </table>
                </div>
                    <div class="col-md-4">
                    
                

                    
                    <br/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <div id="mapa_coordenadas">
                        
                    </div>
                    </div>

                </div>
            </div>

            </fieldset>

            <?php //$this->Form->button(__('Guardar'),['id' => 'btn-save-encuesta']) ?>
            <?php //$this->Form->end() ?>
        </div>
    </div>
</div>


