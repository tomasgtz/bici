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
                        <div class="col-md-8">
                            <table width="100%" border=1>
                                <tr>
                                    <th>¿Utiliza bicileta?(propia, prestada, rentada)?*</th>
                                    <td>
                                        <?= $this->Form->radio('utiliza_bicileta',[['class'=>'radio','id'=>'utiliza_bicileta','value'=>'si','text'=>'Si','required'=>true],['class'=>'radio','id'=>'utiliza_bicileta','value'=>'no','text'=>'No','required'=>true]]);?>
                                        
                                    </td>
                                </tr>
                            </table>   
                        </div>
                        <div class="col-md-4">
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
                        <div class="col-md-8">

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
                                            <th width='10%'>Ocacionalmente </td>
                                            <th width='10%'>Nunca</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </table>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    
                    <div class="espacio"></div>

                    <div class="row">
                        <div class="col-md-8">
                            <table width='100%' border=1>
                            <tr>
                                <th>Como actividad de ocio o deportiva</th>
                                
                                <td width='50%' colspan='5'><?= $this->Form->radio('fub_ocio_deportiva',[['class'=>'radio','value'=>'habitualmente','text'=>''],
                                ['class'=>'radio','value'=>'bastante_frecuencia','text'=>''],
                                ['class'=>'radio','value'=>'ocacionalmente','text'=>''],
                                ['class'=>'radio','value'=>'nunca','text'=>'']]);?>
                                
                            </td>
                            </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
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
                            foreach($fub_ocio_deportivaSql as $fila){
                                echo "['".$fila->fub_ocio_deportiva."', ".$fila->count."],";
                            }
                            ?>
                        ]);

                        var options = {'title':'Como actividad de ocio o deportiva',
                                        'width':300,
                                        'height':200};
                        var chart = new google.visualization.PieChart(document.getElementById('chart_fub_ocio_deportiva'));
                        chart.draw(data, options);
                        }
                        </script>


                        <div id="chart_fub_ocio_deportiva"></div>   
                        
                        </div>        
                    </div>

                    <div class="espacio"></div>

                    <div class="row">
                        <div class="col-md-8">
                            <table width='100%' border=1>
                            <tr>
                                <th>Como modo de transporte</th>
                                <td width='50%' colspan='5'><?= $this->Form->radio('fub_transporte',[['class'=>'radio','value'=>'habitualmente','text'=>'','required'=>'required'],
                                ['class'=>'radio','value'=>'bastante_frecuencia','text'=>''],
                                ['class'=>'radio','value'=>'ocacionalmente','text'=>''],
                                ['class'=>'radio','value'=>'nunca','text'=>'']]);?>
                                
                            </td>
                            </tr>
                            </table>
                            </div>
                            <div class="col-md-4">
                                
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
                                    foreach($fub_transporteSql as $fila){
                                        echo "['".$fila->fub_transporte."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Como modo de transporte',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_fub_transporte'));
                                chart.draw(data, options);
                                }
                                </script>


                                <div id="chart_fub_transporte"></div>   
                            
                        </div>   
                    </div>    
                    
                    <div class="espacio"></div>

                    <div class="row">
                        <div class="col-md-8">
                            <table width='100%' border=1>
                            <tr>
                                <th>Para ir a trabajar</th>
                                <td width='50%' colspan='5'><?= $this->Form->radio('fub_ir_trabajar',[['class'=>'radio','value'=>'habitualmente','text'=>''],
                                ['class'=>'radio','value'=>'bastante_frecuencia','text'=>''],
                                ['class'=>'radio','value'=>'ocacionalmente','text'=>''],
                                ['class'=>'radio','value'=>'nunca','text'=>'']]);?>
                                
                            </td>

                            </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-4">
                            
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
                                    foreach($fub_ir_trabajarSql as $fila){
                                        echo "['".$fila->fub_ir_trabajar."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Para ir a trabajar',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_fub_ir_trabajar'));
                                chart.draw(data, options);
                                }
                                </script>


                                <div id="chart_fub_ir_trabajar"></div>   
                        

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
                                    foreach($idd_sacar_meter_domicilioSql as $fila){
                                        echo "['".$fila->idd_sacar_meter_domicilio."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Sacar y meter la bicileta de mi domicilio',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_sacar_meter_domicilio'));
                                chart.draw(data, options);
                                }
                                </script>
                    <div id="chart_idd_sacar_meter_domicilio"></div>   
                        

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
                                    foreach($idd_no_transporte_publicoSql as $fila){
                                        echo "['".$fila->idd_no_transporte_publico."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'No poder llevar la bicileta en los transportes públicos(Ruta,autobús,etc.)',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_no_transporte_publico'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_no_transporte_publico"></div> 
                

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
                                    foreach($idd_robo_estacionadaSql as $fila){
                                        echo "['".$fila->idd_robo_estacionada."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Peligro de robo cuando la dejo estacionada.',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_robo_estacionada'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_robo_estacionada"></div> 
                
      
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
                                    foreach($idd_dificultad_estacionada_seguroSql as $fila){
                                        echo "['".$fila->idd_dificultad_estacionada_seguro."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Dificultad para dejarla estacionada en un lugar seguro fuera de casa',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_dificultad_estacionada_seguro'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_dificultad_estacionada_seguro"></div> 
                

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
                                    foreach($idd_falta_cicloviaSql as $fila){
                                        echo "['".$fila->idd_falta_ciclovia."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Falta de ciclovía(Calles mal diseñadas)',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_falta_ciclovia'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_falta_ciclovia"></div> 
                

              
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
                                    foreach($idd_vias_alto_flujoSql as $fila){
                                        echo "['".$fila->idd_vias_alto_flujo."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Vías con alto flujo vehicular',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_vias_alto_flujo'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_vias_alto_flujo"></div> 
            
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
                                    foreach($idd_invacion_ciclovias_peatones_cochesSql as $fila){
                                        echo "['".$fila->idd_invacion_ciclovias_peatones_coches."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'La invasión de ciclovías por peatones y coches',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_invacion_ciclovias_peatones_coches'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_invacion_ciclovias_peatones_coches"></div> 
            
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
                                    foreach($idd_conflictos_conductores_automoviles_motos_autobusesSql as $fila){
                                        echo "['".$fila->idd_conflictos_conductores_automoviles_motos_autobuses."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Conflictos con los conductores de los automoviles,motos o autobuses, que no respetan a los ciclistas',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_conflictos_conductores_automoviles_motos_autobuses'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_conflictos_conductores_automoviles_motos_autobuses"></div> 
                
            
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
                                    foreach($idd_conflictos_peatones_no_respetanSql as $fila){
                                        echo "['".$fila->idd_conflictos_peatones_no_respetan."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Conflicto con los peatones, que no respetan a los ciclistas',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_conflictos_peatones_no_respetan'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_conflictos_peatones_no_respetan"></div> 
        
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
                                    foreach($idd_no_conocer_normasSql as $fila){
                                        echo "['".$fila->idd_no_conocer_normas."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'No conocer bien las normas para circular, las señales, direcciones de las calzadas, etc',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_no_conocer_normas'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_no_conocer_normas"></div> 
                
                
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
                                    foreach($idd_conflictos_otros_ciclistasSql as $fila){
                                        echo "['".$fila->idd_conflictos_otros_ciclistas."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Conflictos con otros ciclistas.',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_conflictos_otros_ciclistas'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_conflictos_otros_ciclistas"></div> 
            
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
                                    foreach($idd_peligro_circulacion_ciudadSql as $fila){
                                        echo "['".$fila->idd_peligro_circulacion_ciudad."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'El peligro que supone la circulación en la ciudad.',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_idd_peligro_circulacion_ciudad'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_idd_peligro_circulacion_ciudad"></div> 
                
                
                
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
                                    foreach($nub_no_disponer_bicicletaSql as $fila){
                                        echo "['".$fila->nub_no_disponer_bicicleta."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'No disponer de bicicleta.',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_nub_no_disponer_bicicleta'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_nub_no_disponer_bicicleta"></div> 

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
                                    foreach($nub_no_condicion_fisicaSql as $fila){
                                        echo "['".$fila->nub_no_condicion_fisica."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'No tener condición fisicaadecuada para rodar en bicicleta',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_nub_no_condicion_fisica'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_nub_no_condicion_fisica"></div> 
                    
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
                                    foreach($nub_sacar_meter_biciletaSql as $fila){
                                        echo "['".$fila->nub_sacar_meter_bicileta."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Sacar y meter la bicicleta de mi domicilio',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_nub_sacar_meter_bicileta'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_nub_sacar_meter_bicileta"></div> 
                    
                    
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
                                    foreach($nub_imagen_socialSql as $fila){
                                        echo "['".$fila->nub_imagen_social."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'La imagen social poco adecuada que daria desplazarme en bicicleta, teniendo en cuenta mi edad o situación.',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_nub_imagen_social'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_nub_imagen_social"></div> 
                    
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
                                    foreach($nub_no_poder_llevar_bici_transporteSql as $fila){
                                        echo "['".$fila->nub_no_poder_llevar_bici_transporte."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'No poder llevar la bicleta en los transportes publicos(metrobus, autobus,etc).',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_nub_no_poder_llevar_bici_transporte'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_nub_no_poder_llevar_bici_transporte"></div> 
                    
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
                                    foreach($nub_conflictos_conductores_autobusesSql as $fila){
                                        echo "['".$fila->nub_conflictos_conductores_autobuses."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Conflictos con los conductores de los automoviles,motos o autobuses que no respetan a los ciclistas',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_nub_conflictos_conductores_autobuses'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_nub_conflictos_conductores_autobuses"></div> 
                    
          
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
                                    foreach($nub_conflictos_peatonesSql as $fila){
                                        echo "['".$fila->nub_conflictos_peatones."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Conflictos con los peatones que no respetan a los ciclistas',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_nub_conflictos_peatones'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_nub_conflictos_peatones"></div> 
                    
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
                                    foreach($nub_conflictos_otros_ciclistasSql as $fila){
                                        echo "['".$fila->nub_conflictos_otros_ciclistas."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Conflictos con otros ciclistas',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_nub_conflictos_otros_ciclistas'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_nub_conflictos_otros_ciclistas"></div> 
                    
                    
                    
                    
                    nub_peligro_circulacion_ciudad
                    coordenadas
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
                                    foreach($nub_peligro_circulacion_ciudadSql as $fila){
                                        echo "['".$fila->nub_peligro_circulacion_ciudad."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'El peligro que supone la circulación en la ciudad.',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_nub_peligro_circulacion_ciudad'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_nub_peligro_circulacion_ciudad"></div> 
                    
                    
                    
                    
                    
                    
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
                                    foreach($coordenadasSql as $fila){
                                        echo "['".$fila->coordenadas."', ".$fila->count."],";
                                    }
                                    ?>
                                ]);

                                var options = {'title':'Coordenadas',
                                                'width':300,
                                                'height':200};
                                var chart = new google.visualization.PieChart(document.getElementById('chart_coordenadas'));
                                chart.draw(data, options);
                                }
                                </script>
                                <div id="chart_coordenadas"></div> 

                    <div id="mapa_coordenadas">
                        aqui debe de mostrar el mapa
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


