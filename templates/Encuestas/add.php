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
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Encuestas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="encuestas form content">
        <?= $this->Form->create($encuesta,['action'=> '/bici/Encuestas/add','class' => 'form-control']) ?>
        
            <fieldset>
                <legend><?= __('Add Encuesta') ?></legend>
                <table width="80%">
                    <tr>
                        <td>¿Utiliza bicileta?(propia, prestada, rentada)?*</td>
                        <td>
                            <?= $this->Form->radio('utiliza_bicileta',[['id'=>'utiliza_bicileta','value'=>'si','text'=>'Si','required'=>true],['id'=>'utiliza_bicileta','value'=>'no','text'=>'No','required'=>true]]);?>
                            <div id="error_utiliza_bicicleta">Seleccione una opción</div>
                        </td>
                    </tr>
                </table>        
                <br/><br/>
                <table width='80%'>
                <tr>
                    <td colspan='6'>¿Con que frecuencia utilizas la bicicleta?</td>
                </tr>
                <tr>
                    <td colspan='6'>
                        <table>
                            <tr>
                                <td width='20%'></td>
                                <td width='10%'>Habitualmente </td>
                                <td width='10%'>Con bastante frecuencia </td>
                                <td width='10%'>Ocacionalmente </td>
                                <td width='10%'>Nunca</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Como actividad de ocio o deportiva</td>
                    
                    <td colspan='5'><?= $this->Form->radio('fub_ocio_deportiva',[['class'=>'radio','value'=>'habitualmente','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio','value'=>'bastante_frecuencia','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'ocacionalmente','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'nunca','text'=>'','required'=>'required']]);?>
                    <div id="error_fub_ocio_deportiva">Seleccione una opción</div>
                </td>

              
                </tr>
                <tr>
                    <td>Como modo de transporte</td>
                    <td colspan='5'><?= $this->Form->radio('fub_transporte',[['class'=>'radio','value'=>'habitualmente','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio','value'=>'bastante_frecuencia','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'ocacionalmente','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'nunca','text'=>'','required'=>'required']]);?>
                    <div id="error_fub_transporte">Seleccione una opción</div>
                </td>

                </tr>
                <tr>
                    <td>Para ir a trabajar</td>
                    <td colspan='5'><?= $this->Form->radio('fub_ir_trabajar',[['class'=>'radio','value'=>'habitualmente','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio','value'=>'bastante_frecuencia','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'ocacionalmente','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'nunca','text'=>'','required'=>'required']]);?>
                    <div id="error_fub_ir_trabajar">Seleccione una opción</div>
                </td>

                </tr>
                </table>

                <br/><br/>


                <table width="80%">
                <tr>
                    <td colspan='4'>Indique la importancia que tienen las cuestiones siguientes en cuanto suponene dificultdes para desplazarte por este medio.</td>
                </tr>
                <tr>
                    <td></td><td>Es un problema</td><td>Es un problema pero no importante</td><td>No es un problema</td>
                </tr>
                <tr>
                    <td>Sacar y meter la bicileta de mi domicilio</td>
                    <td colspan='3'><?= $this->Form->radio('idd_sacar_meter_domicilio',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_sacar_meter_domicilio">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>No poder llevar la bicileta en los transportes públicos(Ruta,autobús,etc.)</td>
                    <td colspan='3'><?= $this->Form->radio('idd_no_transporte_publico',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_no_transporte_publico">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>Peligro de robo cuando la dejo estacionada.</td>
                    <td colspan='3'><?= $this->Form->radio('idd_robo_estacionada',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_robo_estacionada">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>Dificultad para dejarla estacionada en un lugar seguro fuera de casa</td>
                    <td colspan='3'><?= $this->Form->radio('idd_dificultad_estacionada_seguro',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_dificultad_estacionada_seguro">Seleccione una opción</div>
                </td>                    
                </tr>
                <tr>
                    <td>Falta de ciclovía(Calles mal diseñadas)</td>
                    <td colspan='3'><?= $this->Form->radio('idd_falta_ciclovia',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_falta_ciclovia">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>Vías con alto flujo vehicular</td>
                    <td colspan='3'><?= $this->Form->radio('idd_vias_alto_flujo',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_vias_alto_flujo">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>La invasión de ciclovías por peatones y coches</td>
                    <td colspan='3'><?= $this->Form->radio('idd_invacion_ciclovias_peatones_coches',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_invacion_ciclovias_peatones_coches">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>Conflictos con los conductores de los automoviles,motos o autobuses, que no respetan a los ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('idd_conflictos_conductores_automoviles_motos_autobuses',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_conflictos_conductores_automoviles_motos_autobuses">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>Conflicto con los peatones, que no respetan a los ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('idd_conflictos_peatones_no_respetan',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_conflictos_peatones_no_respetan">Seleccione una opción</div>
                    </td>
                </tr>
                <tr>
                    <td>No conocer bien las normas para circular, las señales, direcciones de las calzadas, etc</td>
                    <td  colspan='3'><?= $this->Form->radio('idd_no_conocer_normas',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_no_conocer_normas">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>Conflictos con otros ciclistas.</td>
                    <td colspan='3'><?= $this->Form->radio('idd_conflictos_otros_ciclistas',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_conflictos_otros_ciclistas">Seleccione una opción</div>
                    </td>
                </tr>
                <tr>
                    <td>El peligro que supone la circulación en la ciudad.</td>
                    <td  colspan='3'><?= $this->Form->radio('idd_peligro_circulacion_ciudad',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_idd_peligro_circulacion_ciudad">Seleccione una opción</div>
                </td>
                </tr>
                </table>

                    
                <br/><br/>
                <table width="80%">
                <tr>
                    <td colspan='4'>Si no eres usuario de bicleta, indica la importancia que para ti tienen las cuestiones siguientes en cuanto suponen dificultades para desplazarse por este medio.</td>
                </tr>
                <tr>
                    <td></td><td>Es un problema</td><td>Es un problema pero no importante</td><td>No es un problema</td>
                </tr>
                <tr>
                    <td>No disponer de bicicleta.</td>
                    <td colspan='3'><?= $this->Form->radio('nub_no_disponer_bicicleta',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_nub_no_disponer_bicicleta">Seleccione una opción</div></td>
                </tr>
                <tr>
                    <td>No tener condición fisica adecuada para rodar en bicicleta</td>
                    <td colspan='3'><?= $this->Form->radio('nub_no_condicion_fisica',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_nub_no_condicion_fisica">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>Sacar y meter la bicicleta de mi domicilio</td>
                    <td colspan='3'><?= $this->Form->radio('nub_sacar_meter_bicileta',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                     <div id="error_nub_sacar_meter_bicileta">Seleccione una opción</div>
                    </td>
                </tr>
                <tr>
                    <td>La imagen social poco adecuada que daria desplazarme en bicicleta, teniendo en cuenta mi edad o situación.</td>
                    <td colspan='3'><?= $this->Form->radio('nub_imagen_social',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_nub_imagen_social">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>No poder llevar la bicleta en los transportes publicos(metrobus, autobus,etc)</td>
                    <td colspan='3'><?= $this->Form->radio('nub_no_poder_llevar_bici_transporte',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_nub_no_poder_llevar_bici_transporte">Seleccione una opción</div>
                </td>
                </tr>
                <tr>
                    <td>Conflictos con los conductores de los automoviles, motos o autobuses que no respetan a los ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('nub_conflictos_conductores_autobuses',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_nub_conflictos_conductores_autobuses">Seleccione una opción</div>
                    </td>
                </tr>
                <tr>
                    <td>Conflictos con los peatones que no respetan a los ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('nub_conflictos_peatones',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_nub_conflictos_peatones">Seleccione una opción</div>
                    </td>
                </tr>
                <tr>
                    <td>Conflictos con otros ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('nub_conflictos_otros_ciclistas',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_nub_conflictos_otros_ciclistas">Seleccione una opción</div>
                    </td>
                </tr>
                <tr>
                    <td>El peligro que supone la circulación en la ciudad.</td>
                    <td colspan='3'><?= $this->Form->radio('nub_peligro_circulacion_ciudad',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?>
                    <div id="error_nub_peligro_circulacion_ciudad">Seleccione una opción</div>
                </td>
                </tr>
                </table>
                    <br/><br/>

                    <table width="80%">
                    <tr>
                        <td>¿Qué beneficios consideras que trae consigo el uso de la bicicleta?</td>
                        <td><?= $this->Form->textarea('beneficios_considera',['class' => 'form-control','value'=>'salud, menos contaminación','required'=>'required']);?>
                        <div id="error_beneficios_considera">Seleccione una opción</div>
                    </td>
                    </tr>
                </table>        
                <br/><br/>
                <table>
                    <tr>
                        <td>
                            ¿En qué espacios públicos consideras que son necesarios los bici estacionamientos? <span class="" onclick="abrirMapa();">[Abrir Mapa]</span>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $this->Form->input('coordenadas', ['id'=>'coordenadas','hidden' => true,'value'=>'']);?>
                        <div id="error_coordenadas">Seleccione una ubicación en el mapa.</div>
                    </td>
                    </tr>
                </table>
                <br/><br/>
            </fieldset>

            <?= $this->Form->button(__('Guardar'),['id' => 'btn-save-encuesta']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>





<div id="contener-maps">
<span class="btnCerrarMaps" onclick="cerrarMapa();">Cerrar Mapa</span>
    

<div id="maps">

</div>
</div>
<script>
$('#btn-save-encuesta').click(function() {
    let  utiliza_bicileta = document.querySelector("#utiliza_bicileta");
    if(!utiliza_bicileta.checked ){
        document.querySelector("#error_utiliza_bicicleta").style.display='block';  
        document.querySelector("#error_utiliza_bicicleta").onfocus();
          return false;
    }else{
        document.querySelector("#error_utiliza_bicicleta").style.display='none'; 
    }


    let  fub_ocio_deportiva = document.querySelector("#fub_ocio_deportiva");
    if(!fub_ocio_deportiva.checked ){
        document.querySelector("#error_fub_ocio_deportiva").style.display='block';  
        document.querySelector("#error_fub_ocio_deportiva").onfocus();
          return false;
    }else{
        document.querySelector("#error_fub_ocio_deportiva").style.display='none'; 
    }

    let  fub_transporte = document.querySelector("#fub_transporte");
    if(!fub_transporte.checked ){
        document.querySelector("#error_fub_transporte").style.display='block';  
        document.querySelector("#error_fub_transporte").onfocus();
          return false;
    }else{
        document.querySelector("#error_fub_transporte").style.display='none'; 
    }

	

    let   fub_ir_trabajar = document.querySelector("#fub_ir_trabajar");
    if(!fub_ir_trabajar.checked ){
        document.querySelector("#error_fub_ir_trabajar").style.display='block';  
        document.querySelector("#error_fub_ir_trabajar").onfocus();
          return false;
    }else{
        document.querySelector("#error_fub_ir_trabajar").style.display='none'; 
    }



    let  idd_sacar_meter_domicilio = document.querySelector("#idd_sacar_meter_domicilio");
    if(!idd_sacar_meter_domicilio.checked ){
        document.querySelector("#error_idd_sacar_meter_domicilio").style.display='block';  
        document.querySelector("#error_idd_sacar_meter_domicilio").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_sacar_meter_domicilio").style.display='none'; 
    }



    let  idd_no_transporte_publico = document.querySelector("#idd_no_transporte_publico");
    if(!idd_no_transporte_publico.checked ){
        document.querySelector("#error_idd_no_transporte_publico").style.display='block';  
        document.querySelector("#error_idd_no_transporte_publico").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_no_transporte_publico").style.display='none'; 
    }



    let  idd_robo_estacionada = document.querySelector("#idd_robo_estacionada");
    if(!idd_robo_estacionada.checked ){
        document.querySelector("#error_idd_robo_estacionada").style.display='block';  
        document.querySelector("#error_idd_robo_estacionada").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_robo_estacionada").style.display='none'; 
    }



    let idd_dificultad_estacionada_seguro  = document.querySelector("#idd_dificultad_estacionada_seguro");
    if(!idd_dificultad_estacionada_seguro.checked ){
        document.querySelector("#error_idd_dificultad_estacionada_seguro").style.display='block';  
        document.querySelector("#error_idd_dificultad_estacionada_seguro").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_dificultad_estacionada_seguro").style.display='none'; 
    }


    let idd_falta_ciclovia  = document.querySelector("#idd_falta_ciclovia");
    if(!idd_falta_ciclovia.checked ){
        document.querySelector("#error_idd_falta_ciclovia").style.display='block';  
        document.querySelector("#error_idd_falta_ciclovia").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_falta_ciclovia").style.display='none'; 
    }

    let idd_vias_alto_flujo  = document.querySelector("#idd_vias_alto_flujo");
    if(!idd_vias_alto_flujo.checked ){
        document.querySelector("#error_idd_vias_alto_flujo").style.display='block';  
        document.querySelector("#error_idd_vias_alto_flujo").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_vias_alto_flujo").style.display='none'; 
    }


    let  idd_invacion_ciclovias_peatones_coches = document.querySelector("#idd_invacion_ciclovias_peatones_coches");
    if(!idd_invacion_ciclovias_peatones_coches.checked ){
        document.querySelector("#error_idd_invacion_ciclovias_peatones_coches").style.display='block';  
        document.querySelector("#error_idd_invacion_ciclovias_peatones_coches").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_invacion_ciclovias_peatones_coches").style.display='none'; 
    }


    let idd_conflictos_conductores_automoviles_motos_autobuses  = document.querySelector("#idd_conflictos_conductores_automoviles_motos_autobuses");
    if(!idd_conflictos_conductores_automoviles_motos_autobuses.checked ){
        document.querySelector("#error_idd_conflictos_conductores_automoviles_motos_autobuses").style.display='block';  
        document.querySelector("#error_idd_conflictos_conductores_automoviles_motos_autobuses").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_conflictos_conductores_automoviles_motos_autobuses").style.display='none'; 
    }



    let  idd_conflictos_peatones_no_respetan = document.querySelector("#idd_conflictos_peatones_no_respetan");
    if(!idd_conflictos_peatones_no_respetan.checked ){
        document.querySelector("#error_idd_conflictos_peatones_no_respetan").style.display='block';  
        document.querySelector("#error_idd_conflictos_peatones_no_respetan").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_conflictos_peatones_no_respetan").style.display='none'; 
    }


    let idd_no_conocer_normas  = document.querySelector("#idd_no_conocer_normas");
    if(!idd_no_conocer_normas.checked ){
        document.querySelector("#error_idd_no_conocer_normas").style.display='block';  
        document.querySelector("#error_idd_no_conocer_normas").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_no_conocer_normas").style.display='none'; 
    }



    let idd_conflictos_otros_ciclistas  = document.querySelector("#idd_conflictos_otros_ciclistas");
    if(!idd_conflictos_otros_ciclistas.checked ){
        document.querySelector("#error_idd_conflictos_otros_ciclistas").style.display='block';  
        document.querySelector("#error_idd_conflictos_otros_ciclistas").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_conflictos_otros_ciclistas").style.display='none'; 
    }



    let  idd_peligro_circulacion_ciudad = document.querySelector("#idd_peligro_circulacion_ciudad");
    if(!idd_peligro_circulacion_ciudad.checked ){
        document.querySelector("#error_idd_peligro_circulacion_ciudad").style.display='block';  
        document.querySelector("#error_idd_peligro_circulacion_ciudad").onfocus();
          return false;
    }else{
        document.querySelector("#error_idd_peligro_circulacion_ciudad").style.display='none'; 
    }



    let  nub_no_disponer_bicicleta = document.querySelector("#nub_no_disponer_bicicleta");
    if(!nub_no_disponer_bicicleta.checked ){
        document.querySelector("#error_nub_no_disponer_bicicleta").style.display='block';  
        document.querySelector("#error_nub_no_disponer_bicicleta").onfocus();
          return false;
    }else{
        document.querySelector("#error_nub_no_disponer_bicicleta").style.display='none'; 
    }


    let nub_no_condicion_fisica  = document.querySelector("#nub_no_condicion_fisica");
    if(!nub_no_condicion_fisica.checked ){
        document.querySelector("#error_nub_no_condicion_fisica").style.display='block';  
        document.querySelector("#error_nub_no_condicion_fisica").onfocus();
          return false;
    }else{
        document.querySelector("#error_nub_no_condicion_fisica").style.display='none'; 
    }
    

    let  nub_sacar_meter_bicileta = document.querySelector("#nub_sacar_meter_bicileta");
    if(!nub_sacar_meter_bicileta.checked ){
        document.querySelector("#error_nub_sacar_meter_bicileta").style.display='block';  
        document.querySelector("#error_nub_sacar_meter_bicileta").onfocus();
          return false;
    }else{
        document.querySelector("#error_nub_sacar_meter_bicileta").style.display='none'; 
    }


    let nub_imagen_social  = document.querySelector("#nub_imagen_social");
    if(!nub_imagen_social.checked ){
        document.querySelector("#error_nub_imagen_social").style.display='block';  
        document.querySelector("#error_nub_imagen_social").onfocus();
          return false;
    }else{
        document.querySelector("#error_nub_imagen_social").style.display='none'; 
    }


    let nub_no_poder_llevar_bici_transporte  = document.querySelector("#nub_no_poder_llevar_bici_transporte");
    if(!nub_no_poder_llevar_bici_transporte.checked ){
        document.querySelector("#error_nub_no_poder_llevar_bici_transporte").style.display='block';  
        document.querySelector("#error_nub_no_poder_llevar_bici_transporte").onfocus();
          return false;
    }else{
        document.querySelector("#error_nub_no_poder_llevar_bici_transporte").style.display='none'; 
    }



    let  nub_conflictos_conductores_autobuses = document.querySelector("#nub_conflictos_conductores_autobuses");
    if(!nub_conflictos_conductores_autobuses.checked ){
        document.querySelector("#error_nub_conflictos_conductores_autobuses").style.display='block';  
        document.querySelector("#error_nub_conflictos_conductores_autobuses").onfocus();
          return false;
    }else{
        document.querySelector("#error_nub_conflictos_conductores_autobuses").style.display='none'; 
    }

    let nub_conflictos_peatones  = document.querySelector("#nub_conflictos_peatones");
    if(!nub_conflictos_peatones.checked ){
        document.querySelector("#error_nub_conflictos_peatones").style.display='block';  
        document.querySelector("#error_nub_conflictos_peatones").onfocus();
          return false;
    }else{
        document.querySelector("#error_nub_conflictos_peatones").style.display='none'; 
    }


    let nub_conflictos_otros_ciclistas  = document.querySelector("#nub_conflictos_otros_ciclistas");
    if(!nub_conflictos_otros_ciclistas.checked ){
        document.querySelector("#error_nub_conflictos_otros_ciclistas").style.display='block';  
        document.querySelector("#error_nub_conflictos_otros_ciclistas").onfocus();
          return false;
    }else{
        document.querySelector("#error_nub_conflictos_otros_ciclistas").style.display='none'; 
    }

    let nub_peligro_circulacion_ciudad  = document.querySelector("#nub_peligro_circulacion_ciudad");
    if(!nub_peligro_circulacion_ciudad.checked ){
        document.querySelector("#error_nub_peligro_circulacion_ciudad").style.display='block';  
        document.querySelector("#error_nub_peligro_circulacion_ciudad").onfocus();
          return false;
    }else{
        document.querySelector("#error_nub_peligro_circulacion_ciudad").style.display='none'; 
    }


    let  beneficios_considera = document.querySelector("#beneficios_considera");
    if(!beneficios_considera.checked ){
        document.querySelector("#error_beneficios_considera").style.display='block';  
        document.querySelector("#error_beneficios_considera").onfocus();
          return false;
    }else{
        document.querySelector("#error_beneficios_considera").style.display='none'; 
    }


    let coordenadas  = document.querySelector("#coordenadas");
    if(!coordenadas.checked ){
        document.querySelector("#error_coordenadas").style.display='block';  
        document.querySelector("#error_coordenadas").onfocus();
          return false;
    }else{
        document.querySelector("#error_coordenadas").style.display='none'; 
    }





});

</script>