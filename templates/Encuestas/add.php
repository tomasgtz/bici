<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Encuesta $encuesta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Encuestas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="encuestas form content">
        <?= $this->Form->create($encuesta,['action'=> '/bici/Encuestas/add']) ?>
            <fieldset>
                <legend><?= __('Add Encuesta') ?></legend>
                <table width="80%">
                    <tr>
                        <td>¿Utiliza bicileta?(propia, prestada, rentada)?*</td>
                        <td>
                            <?= $this->Form->radio('utiliza_bicileta',[['value'=>'si','text'=>'Si','checked','required'=>'required'],['value'=>'no','text'=>'No']]);?>
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
                    ['class'=>'radio','value'=>'nunca','text'=>'','required'=>'required']]);?></td>

              
                </tr>
                <tr>
                    <td>Como modo de transporte</td>
                    <td colspan='5'><?= $this->Form->radio('fub_transporte',[['class'=>'radio','value'=>'habitualmente','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio','value'=>'bastante_frecuencia','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'ocacionalmente','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'nunca','text'=>'','required'=>'required']]);?></td>

                </tr>
                <tr>
                    <td>Para ir a trabajar</td>
                    <td colspan='5'><?= $this->Form->radio('fub_ir_trabajar',[['class'=>'radio','value'=>'habitualmente','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio','value'=>'bastante_frecuencia','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'ocacionalmente','text'=>'','required'=>'required'],
                    ['class'=>'radio','value'=>'nunca','text'=>'','required'=>'required']]);?></td>

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
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>No poder llevar la bicileta en los transportes públicos(Ruta,autobús,etc.)</td>
                    <td colspan='3'><?= $this->Form->radio('idd_no_transporte_publico',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Peligro de robo cuando la dejo estacionada.</td>
                    <td colspan='3'><?= $this->Form->radio('idd_robo_estacionada',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Dificultad para dejarla estacionada en un lugar seguro fuera de casa</td>
                    <td colspan='3'><?= $this->Form->radio('idd_dificultad_estacionada_seguro',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>                    
                </tr>
                <tr>
                    <td>Falta de ciclovía(Calles mal diseñadas)</td>
                    <td colspan='3'><?= $this->Form->radio('idd_falta_ciclovia',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Vías con alto flujo vehicular</td>
                    <td colspan='3'><?= $this->Form->radio('idd_vias_alto_flujo',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>La invasión de ciclovías por peatones y coches</td>
                    <td colspan='3'><?= $this->Form->radio('idd_invacion_ciclovias_peatones_coches',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Conflictos con los conductores de los automoviles,motos o autobuses, que no respetan a los ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('idd_conflictos_conductores_automoviles_motos_autobuses',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Conflicto con los peatones, que no respetan a los ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('idd_conflictos_peatones_no_respetan',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>No conocer bien las normas para circular, las señales, direcciones de las calzadas, etc</td>
                    <td  colspan='3'><?= $this->Form->radio('idd_no_conocer_normas',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Conflictos con otros ciclistas.</td>
                    <td colspan='3'><?= $this->Form->radio('idd_conflictos_otros_ciclistas',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>El peligro que supone la circulación en la ciudad.</td>
                    <td  colspan='3'><?= $this->Form->radio('idd_peligro_circulacion_ciudad',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
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
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>No tener condición fisica adecuada para rodar en bicicleta</td>
                    <td colspan='3'><?= $this->Form->radio('nub_no_condicion_fisica',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Sacar y meter la bicicleta de mi domicilio</td>
                    <td colspan='3'><?= $this->Form->radio('nub_sacar_meter_bicileta',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>La imagen social poco adecuada que daria desplazarme en bicicleta, teniendo en cuenta mi edad o situación.</td>
                    <td colspan='3'><?= $this->Form->radio('nub_imagen_social',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>No poder llevar la bicleta en los transportes publicos(metrobus, autobus,etc)</td>
                    <td colspan='3'><?= $this->Form->radio('nub_no_poder_llevar_bici_transporte',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Conflictos con los conductores de los automoviles, motos o autobuses que no respetan a los ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('nub_conflictos_conductores_autobuses',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Conflictos con los peatones que no respetan a los ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('nub_conflictos_peatones',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>Conflictos con otros ciclistas</td>
                    <td colspan='3'><?= $this->Form->radio('nub_conflictos_otros_ciclistas',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                <tr>
                    <td>El peligro que supone la circulación en la ciudad.</td>
                    <td colspan='3'><?= $this->Form->radio('nub_peligro_circulacion_ciudad',[['class'=>'radio-d','value'=>'problema','text'=>'','checked','required'=>'required'],
                    ['class'=>'radio-d','value'=>'problema_no_importante','text'=>'','required'=>'required'],
                    ['class'=>'radio-d','value'=>'no_problema','text'=>'','required'=>'required']]);?></td>
                </tr>
                </table>
                    <br/><br/>

                    <table width="80%">
                    <tr>
                        <td>¿Qué beneficios consideras que trae consigo el uso de la bicicleta?</td>
                        <td><?= $this->Form->textarea('beneficios_considera',['class' => 'form-control','value'=>'salud, menos contaminación','required'=>'required']);?></td>
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
                        <td><?= $this->Form->input('coordenadas', ['id'=>'coordenadas','hidden' => true,'value'=>'']);?></td>
                    </tr>
                </table>
                <br/><br/>
            </fieldset>
            <?= $this->Form->button(__('Guardar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<div id="contener-maps">
<span class="btnCerrarMaps" onclick="cerrarMapa();">Cerrar Mapa</span>
    

<div id="maps">

</div>
</div>