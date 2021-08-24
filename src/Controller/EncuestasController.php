<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Encuestas Controller
 *
 * @property \App\Model\Table\EncuestasTable $Encuestas
 * @method \App\Model\Entity\Encuesta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EncuestasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $encuestas = $this->paginate($this->Encuestas);

        $this->set(compact('encuestas'));
    }

    /**
     * View method
     *
     * @param string|null $id Encuesta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $encuesta = $this->Encuestas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('encuesta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $encuesta = $this->Encuestas->newEmptyEntity();
        if ($this->request->is('post')) {
            //$encuesta = $this->Encuestas->patchEntity($encuesta, $this->request->getData());
            $enc['utiliza_bicileta']				        = $this->request->getData('utiliza_bicileta');
            $enc['beneficios_considera']				    = $this->request->getData('beneficios_considera');
            $enc['fub_ocio_deportiva']				        = $this->request->getData('fub_ocio_deportiva');
            $enc['fub_transporte']				            = $this->request->getData('fub_transporte');
            $enc['fub_ir_trabajar']				            = $this->request->getData('fub_ir_trabajar');
            $enc['idd_sacar_meter_domicilio']				= $this->request->getData('idd_sacar_meter_domicilio');
            $enc['idd_no_transporte_publico']				= $this->request->getData('idd_no_transporte_publico');
            $enc['idd_robo_estacionada']				    = $this->request->getData('idd_robo_estacionada');
            $enc['idd_dificultad_estacionada_seguro']		= $this->request->getData('idd_dificultad_estacionada_seguro');
            $enc['idd_falta_ciclovia']				        = $this->request->getData('idd_falta_ciclovia');
            $enc['idd_vias_alto_flujo']				        = $this->request->getData('idd_vias_alto_flujo');
            $enc['idd_invacion_ciclovias_peatones_coches']	= $this->request->getData('idd_invacion_ciclovias_peatones_coches');
            $enc['idd_conflictos_conductores_automoviles_motos_autobuses']	= $this->request->getData('idd_conflictos_conductores_automoviles_motos_autobuses');
            $enc['idd_conflictos_peatones_no_respetan']	    = $this->request->getData('idd_conflictos_peatones_no_respetan');
            $enc['idd_no_conocer_normas']				    = $this->request->getData('idd_no_conocer_normas');
            $enc['idd_conflictos_otros_ciclistas']			= $this->request->getData('idd_conflictos_otros_ciclistas');
            $enc['idd_peligro_circulacion_ciudad']			= $this->request->getData('idd_peligro_circulacion_ciudad');
            $enc['nub_no_disponer_bicicleta']			    = $this->request->getData('nub_no_disponer_bicicleta');
            $enc['nub_no_condicion_fisica']			        = $this->request->getData('nub_no_condicion_fisica');
            $enc['nub_sacar_meter_bicileta']			    = $this->request->getData('nub_sacar_meter_bicileta');
            $enc['nub_imagen_social']			            = $this->request->getData('nub_imagen_social');
            $enc['nub_no_poder_llevar_bici_transporte']	    = $this->request->getData('nub_no_poder_llevar_bici_transporte');
            $enc['nub_conflictos_conductores_autobuses']	= $this->request->getData('nub_conflictos_conductores_autobuses');
            $enc['nub_conflictos_peatones']			        = $this->request->getData('nub_conflictos_peatones');
            $enc['nub_conflictos_otros_ciclistas']			= $this->request->getData('nub_conflictos_otros_ciclistas');
            $enc['nub_peligro_circulacion_ciudad']			= $this->request->getData('nub_peligro_circulacion_ciudad');
            $enc['coordenadas']                 			= $this->request->getData('coordenadas');
            
            $enc['created'] = date("Y-m-d H:i:s");
            //$enc['ip']      = $this->request->clientIp();
            //Cake\Http\ServerRequest::clientIp()

            function clientIp($defaultIP = '127.0.0.1') {
                $ipaddr = null;
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ipaddr = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ipaddr = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $ipaddr = $_SERVER['REMOTE_ADDR'];
                }
                $ipaddr = trim($ipaddr);
                if ($ipaddr == '::1') {
                    $ipaddr = $defaultIP;
                }
                return $ipaddr;
            }
            $enc['ip'] = clientIp();
            //debug
            // var_dump($enc);

            /*$countIP = $this->Encuestas->find()->where(['ip' => $enc['ip']])->count();

			if ($countIP >= 1) {
				$this->Flash->error('Ya existe un registro con la misma IP');
				//return $this->redirect('/');
                return $this->redirect(['action' => 'index']);
			}*/


            $encuesta = $this->Encuestas->patchEntity($encuesta, $enc);

            if ($this->Encuestas->save($encuesta)) {
                $this->Flash->success(__('La encuesta se guardo correctamente.'));

                $s1active = $s2active = $s3active = $s4active = $s5active = '';
                $id=5;
                //$gkey ="AIzaSyBctEa4mbmLLHuzIRpFDavVUyBgPaS3atU";
                $gkey = env('GOOGLE_MAP_KEY', '');
                $enc  = $this->request->getData('param');
                if ($id == 1) 
                {
                    $s1active = 'active';
                } 
                else if ($id == 2) 
                {
                    $s2active = 'active';
                } 
                else if ($id == 3) 
                {
                    $s3active = 'active';
                } 
                else if ($id == 4) 
                {
                    $s4active = 'active';
                }
                else if ($id == 5) 
                {
                    $s5active = 'active';
                }


                $registros   = $this->Encuestas->find('all')->count();
                
                
                $coordenadasQuery = $this->Encuestas->find();
                $coordenadasQuery->select(['coordenadas']);
                /*
                    foreach($coordenadasQuery as $fila){
                        echo  $fila->coordenadas
                    }*/     
           

                $utiliza_biciletaSql = $this->Encuestas->find();
                $utiliza_biciletaSql->select(['count' => $utiliza_biciletaSql->func()->count('*'),'utiliza_bicileta'])->group(['utiliza_bicileta']);
         
                foreach($fub_ir_trabajarSql as $fila){
                    $fub_ir_trabajar[$fila->fub_ir_trabajar] = round(($fila->count/$registros)*100,2);
                }


                $fub_ocio_deportivaSql = $this->Encuestas->find();
                $fub_ocio_deportivaSql->select(['count' => $fub_ocio_deportivaSql->func()->count('*'),'fub_ocio_deportiva'])->group(['fub_ocio_deportiva']);

                $fub_transporteSql = $this->Encuestas->find();
                $fub_transporteSql->select(['count' => $fub_transporteSql->func()->count('*'),'fub_transporte'])->group(['fub_transporte']);

                $fub_ir_trabajarSql = $this->Encuestas->find();
                $fub_ir_trabajarSql->select(['count' => $fub_ir_trabajarSql->func()->count('*'),'fub_ir_trabajar'])->group(['fub_ir_trabajar']);


                $fub_ocio_deportiva['ocasionalmente'] = 0;
                $fub_ocio_deportiva['nunca'] = 0;
                $fub_ocio_deportiva['habitualmente'] = 0;
                $fub_ocio_deportiva['bastante_frecuencia'] = 0;

                $fub_transporte['ocasionalmente'] = 0;
                $fub_transporte['nunca'] = 0;
                $fub_transporte['habitualmente'] = 0;
                $fub_transporte['bastante_frecuencia'] = 0;

                $fub_ir_trabajar['ocasionalmente'] = 0;
                $fub_ir_trabajar['nunca'] = 0;
                $fub_ir_trabajar['habitualmente'] = 0;
                $fub_ir_trabajar['bastante_frecuencia'] = 0;


                foreach($fub_ocio_deportivaSql as $fila){
                    $fub_ocio_deportiva[$fila->fub_ocio_deportiva] = round(($fila->count/$registros)*100,2);
                }

                foreach($fub_transporteSql as $fila){
                    $fub_transporte[$fila->fub_transporte] = round(($fila->count/$registros)*100,2);
                }

                foreach($fub_ir_trabajarSql as $fila){
                    $fub_ir_trabajar[$fila->fub_ir_trabajar] = round(($fila->count/$registros)*100,2);
                }
                
                //var_dump($fub_ocio_deportiva);

                //var_dump($fub_transporte);

                //var_dump($fub_ir_trabajar);

                //sql($fub_ocio_deportivaSql);

                //var_dump($registros);
  
            $str = "[
          ['','Como actividad de ocio o deportiva', 'Como modo de transporte', 'Para ir a trabajar'],
          ['Con bastante frecuencia', ".$fub_ocio_deportiva['bastante_frecuencia'].", ".$fub_transporte['bastante_frecuencia'].", ".$fub_transporte['bastante_frecuencia']." ],
          ['Habitualmente', ".$fub_ocio_deportiva['habitualmente'].", ".$fub_transporte['habitualmente'].", ".$fub_transporte['habitualmente']." ],
          ['Nunca', ".$fub_ocio_deportiva['nunca'].", ".$fub_transporte['nunca'].", ". $fub_transporte['nunca']." ],
          ['Ocasionalmente', ".$fub_ocio_deportiva['ocasionalmente'].",". $fub_transporte['ocasionalmente'].", ". $fub_transporte['ocasionalmente']." ]        ]";

        

        

                

                $idd_sacar_meter_domicilioSql = $this->Encuestas->find();
                $idd_sacar_meter_domicilioSql->select(['count' => $idd_sacar_meter_domicilioSql->func()->count('*'),'idd_sacar_meter_domicilio'])->group(['idd_sacar_meter_domicilio']);

                $idd_no_transporte_publicoSql = $this->Encuestas->find();
                $idd_no_transporte_publicoSql->select(['count' => $idd_no_transporte_publicoSql->func()->count('*'),'idd_no_transporte_publico'])->group(['idd_no_transporte_publico']);

                $idd_robo_estacionadaSql = $this->Encuestas->find();
                $idd_robo_estacionadaSql->select(['count' => $idd_robo_estacionadaSql->func()->count('*'),'idd_robo_estacionada'])->group(['idd_robo_estacionada']);
                

                $idd_dificultad_estacionada_seguroSql = $this->Encuestas->find();
                $idd_dificultad_estacionada_seguroSql->select(['count' => $idd_dificultad_estacionada_seguroSql->func()->count('*'),'idd_dificultad_estacionada_seguro'])->group(['idd_dificultad_estacionada_seguro']);


                $idd_falta_cicloviaSql = $this->Encuestas->find();
                $idd_falta_cicloviaSql->select(['count' => $idd_falta_cicloviaSql->func()->count('*'),'idd_falta_ciclovia'])->group(['idd_falta_ciclovia']);

                $idd_vias_alto_flujoSql = $this->Encuestas->find();
                $idd_vias_alto_flujoSql->select(['count' => $idd_vias_alto_flujoSql->func()->count('*'),'idd_vias_alto_flujo'])->group(['idd_vias_alto_flujo']);

                $idd_invacion_ciclovias_peatones_cochesSql = $this->Encuestas->find();
                $idd_invacion_ciclovias_peatones_cochesSql->select(['count' => $idd_invacion_ciclovias_peatones_cochesSql->func()->count('*'),'idd_invacion_ciclovias_peatones_coches'])->group(['idd_invacion_ciclovias_peatones_coches']);

                $idd_conflictos_conductores_automoviles_motos_autobusesSql = $this->Encuestas->find();
                $idd_conflictos_conductores_automoviles_motos_autobusesSql->select(['count' => $idd_conflictos_conductores_automoviles_motos_autobusesSql->func()->count('*'),'idd_conflictos_conductores_automoviles_motos_autobuses'])->group(['idd_conflictos_conductores_automoviles_motos_autobuses']);

                $idd_conflictos_peatones_no_respetanSql = $this->Encuestas->find();
                $idd_conflictos_peatones_no_respetanSql->select(['count' => $idd_conflictos_peatones_no_respetanSql->func()->count('*'),'idd_conflictos_peatones_no_respetan'])->group(['idd_conflictos_peatones_no_respetan']);

                $idd_no_conocer_normasSql = $this->Encuestas->find();
                $idd_no_conocer_normasSql->select(['count' => $idd_no_conocer_normasSql->func()->count('*'),'idd_no_conocer_normas'])->group(['idd_no_conocer_normas']);

                $idd_conflictos_otros_ciclistasSql = $this->Encuestas->find();
                $idd_conflictos_otros_ciclistasSql->select(['count' => $idd_conflictos_otros_ciclistasSql->func()->count('*'),'idd_conflictos_otros_ciclistas'])->group(['idd_conflictos_otros_ciclistas']);

                $idd_peligro_circulacion_ciudadSql = $this->Encuestas->find();
                $idd_peligro_circulacion_ciudadSql->select(['count' => $idd_peligro_circulacion_ciudadSql->func()->count('*'),'idd_peligro_circulacion_ciudad'])->group(['idd_peligro_circulacion_ciudad']);

                $idd_sacar_meter_domicilio['problema'] = 0;
                $idd_sacar_meter_domicilio['problema_no_importante'] = 0;
                $idd_sacar_meter_domicilio['no_problema'] = 0;

                $idd_no_transporte_publico['problema'] = 0;
                $idd_no_transporte_publico['problema_no_importante'] = 0;
                $idd_no_transporte_publico['no_problema'] = 0;
                
                $idd_robo_estacionada['problema'] = 0;
                $idd_robo_estacionada['problema_no_importante'] = 0;
                $idd_robo_estacionada['no_problema'] = 0;

                $idd_dificultad_estacionada_seguro['problema'] = 0;
                $idd_dificultad_estacionada_seguro['problema_no_importante'] = 0;
                $idd_dificultad_estacionada_seguro['no_problema'] = 0;
                
                $idd_falta_ciclovia['problema'] = 0;
                $idd_falta_ciclovia['problema_no_importante'] = 0;
                $idd_falta_ciclovia['no_problema'] = 0;

                $idd_vias_alto_flujo['problema'] = 0;
                $idd_vias_alto_flujo['problema_no_importante'] = 0;
                $idd_vias_alto_flujo['no_problema'] = 0;

                $idd_invacion_ciclovias_peatones_coches['problema'] = 0;
                $idd_invacion_ciclovias_peatones_coches['problema_no_importante'] = 0;
                $idd_invacion_ciclovias_peatones_coches['no_problema'] = 0;

                $idd_conflictos_conductores_automoviles_motos_autobuses['problema'] = 0;
                $idd_conflictos_conductores_automoviles_motos_autobuses['problema_no_importante'] = 0;
                $idd_conflictos_conductores_automoviles_motos_autobuses['no_problema'] = 0;

                $idd_conflictos_peatones_no_respetan['problema'] = 0;
                $idd_conflictos_peatones_no_respetan['problema_no_importante'] = 0;
                $idd_conflictos_peatones_no_respetan['no_problema'] = 0;

                $idd_no_conocer_normas['problema'] = 0;
                $idd_no_conocer_normas['problema_no_importante'] = 0;
                $idd_no_conocer_normas['no_problema'] = 0;
                
                $idd_conflictos_otros_ciclistas['problema'] = 0;
                $idd_conflictos_otros_ciclistas['problema_no_importante'] = 0;
                $idd_conflictos_otros_ciclistas['no_problema'] = 0;

                $idd_peligro_circulacion_ciudad['problema'] = 0;
                $idd_peligro_circulacion_ciudad['problema_no_importante'] = 0;
                $idd_peligro_circulacion_ciudad['no_problema'] = 0;

                foreach($idd_sacar_meter_domicilioSql as $fila){
                    $idd_sacar_meter_domicilio[$fila->idd_sacar_meter_domicilio] = round(($fila->count/$registros)*100,2);
                }

                foreach($idd_no_transporte_publicoSql as $fila){
                    $idd_no_transporte_publico[$fila->idd_no_transporte_publico] = round(($fila->count/$registros)*100,2);
                }

                foreach($idd_robo_estacionadaSql as $fila){
                    $idd_robo_estacionada[$fila->idd_robo_estacionadaSql] = round(($fila->count/$registros)*100,2);
                }

                
                foreach($idd_dificultad_estacionada_seguroSql as $fila){
                    $idd_dificultad_estacionada_seguro[$fila->idd_dificultad_estacionada_seguro] = round(($fila->count/$registros)*100,2);
                }

                foreach($idd_falta_cicloviaSql as $fila){
                    $idd_falta_ciclovia[$fila->idd_falta_ciclovia] = round(($fila->count/$registros)*100,2);
                }

                foreach($idd_vias_alto_flujoSql as $fila){
                    $idd_vias_alto_flujo[$fila->idd_vias_alto_flujo] = round(($fila->count/$registros)*100,2);
                }

                foreach($idd_invacion_ciclovias_peatones_cochesSql as $fila){
                    $idd_invacion_ciclovias_peatones_coches[$fila->idd_invacion_ciclovias_peatones_coches] = round(($fila->count/$registros)*100,2);
                }

                foreach($idd_conflictos_conductores_automoviles_motos_autobusesSql as $fila){
                    $idd_conflictos_conductores_automoviles_motos_autobuses[$fila->idd_conflictos_conductores_automoviles_motos_autobuses] = round(($fila->count/$registros)*100,2);
                }

                foreach($idd_conflictos_peatones_no_respetanSql as $fila){
                    $idd_conflictos_peatones_no_respetan[$fila->idd_conflictos_peatones_no_respetan] = round(($fila->count/$registros)*100,2);
                }

                foreach($idd_no_conocer_normasSql as $fila){
                    $idd_no_conocer_normas[$fila->idd_no_conocer_normas] = round(($fila->count/$registros)*100,2);
                }


                foreach($idd_conflictos_otros_ciclistasSql as $fila){
                    $idd_conflictos_otros_ciclistas[$fila->idd_conflictos_otros_ciclistas] = round(($fila->count/$registros)*100,2);
                }

                foreach($idd_peligro_circulacion_ciudadSql as $fila){
                    $idd_peligro_circulacion_ciudad[$fila->idd_peligro_circulacion_ciudad] = round(($fila->count/$registros)*100,2);
                }


               
     

                $strTieneBicicleta = "[
                    ['','Sacar y meter la bicileta de mi domicilio', 'No poder llevar la bicileta en los transportes públicos', 'Peligro de robo cuando la dejo estacionada','Dificultad para dejarla estacionada en un lugar seguro fuera de casa','Falta de ciclovía','Vías con alto flujo vehicular','La invasión de ciclovías por peatones y coches','Conflictos con los conductores de los automoviles,motos o autobuses, que no respetan a los ciclistas','Conflicto con los peatones, que no respetan a                    los ciclistas','No conocer bien las normas para circular, las señales,direcciones de las calzadas, etc','Conflictos con otros ciclistas.','El peligro que supone la circulación en la ciudad.'],
                    ['Problema', ".$idd_sacar_meter_domicilio['problema'].", ".$idd_no_transporte_publico['problema'].", ".$idd_robo_estacionada['problema'].",".$idd_dificultad_estacionada_seguro['problema'].",".$idd_falta_ciclovia['problema'].",".$idd_vias_alto_flujo['problema'].",".$idd_invacion_ciclovias_peatones_coches['problema'].",".$idd_conflictos_conductores_automoviles_motos_autobuses['problema'].",".$idd_conflictos_peatones_no_respetan['problema'].",".$idd_no_conocer_normas['problema'].",".$idd_conflictos_otros_ciclistas['problema'].",".$idd_peligro_circulacion_ciudad['problema']."],
                    ['Problema no importante', ".$idd_sacar_meter_domicilio['problema_no_importante'].", ".$idd_no_transporte_publico['problema_no_importante'].", ".$idd_robo_estacionada['problema_no_importante'].",".$idd_dificultad_estacionada_seguro['problema_no_importante'].",".$idd_falta_ciclovia['problema_no_importante'].",".$idd_vias_alto_flujo['problema_no_importante'].",".$idd_invacion_ciclovias_peatones_coches['problema_no_importante'].",".$idd_conflictos_conductores_automoviles_motos_autobuses['problema_no_importante'].",".$idd_conflictos_peatones_no_respetan['problema_no_importante'].",".$idd_no_conocer_normas['problema_no_importante'].",".$idd_conflictos_otros_ciclistas['problema_no_importante'].",".$idd_peligro_circulacion_ciudad['problema_no_importante']."],
                    ['No problema',  ".$idd_sacar_meter_domicilio['no_problema'].", ".$idd_no_transporte_publico['no_problema'].", ".$idd_robo_estacionada['no_problema'].",".$idd_dificultad_estacionada_seguro['no_problema'].",".$idd_falta_ciclovia['no_problema'].",".$idd_vias_alto_flujo['no_problema'].",".$idd_invacion_ciclovias_peatones_coches['no_problema'].",".$idd_conflictos_conductores_automoviles_motos_autobuses['no_problema'].",".$idd_conflictos_peatones_no_respetan['no_problema'].",".$idd_no_conocer_normas['no_problema'].",".$idd_conflictos_otros_ciclistas['no_problema'].",".$idd_peligro_circulacion_ciudad['no_problema']."]]";
          
                    


                /*********/



                

                
                $nub_no_disponer_bicicletaSql = $this->Encuestas->find();
                $nub_no_disponer_bicicletaSql->select(['count' => $nub_no_disponer_bicicletaSql->func()->count('*'),'nub_no_disponer_bicicleta'])->group(['nub_no_disponer_bicicleta']);

                $nub_no_condicion_fisicaSql = $this->Encuestas->find();
                $nub_no_condicion_fisicaSql->select(['count' => $nub_no_condicion_fisicaSql->func()->count('*'),'nub_no_condicion_fisica'])->group(['nub_no_condicion_fisica']);

                $nub_sacar_meter_biciletaSql = $this->Encuestas->find();
                $nub_sacar_meter_biciletaSql->select(['count' => $nub_sacar_meter_biciletaSql->func()->count('*'),'nub_sacar_meter_bicileta'])->group(['nub_sacar_meter_bicileta']);

                $nub_imagen_socialSql = $this->Encuestas->find();
                $nub_imagen_socialSql->select(['count' => $nub_imagen_socialSql->func()->count('*'),'nub_imagen_social'])->group(['nub_imagen_social']);

                $nub_no_poder_llevar_bici_transporteSql = $this->Encuestas->find();
                $nub_no_poder_llevar_bici_transporteSql->select(['count' => $nub_no_poder_llevar_bici_transporteSql->func()->count('*'),'nub_no_poder_llevar_bici_transporte'])->group(['nub_no_poder_llevar_bici_transporte']);

                $nub_conflictos_conductores_autobusesSql = $this->Encuestas->find();
                $nub_conflictos_conductores_autobusesSql->select(['count' => $nub_conflictos_conductores_autobusesSql->func()->count('*'),'nub_conflictos_conductores_autobuses'])->group(['nub_conflictos_conductores_autobuses']);

                $nub_conflictos_peatonesSql = $this->Encuestas->find();
                $nub_conflictos_peatonesSql->select(['count' => $nub_conflictos_peatonesSql->func()->count('*'),'nub_conflictos_peatones'])->group(['nub_conflictos_peatones']);

                $nub_conflictos_otros_ciclistasSql = $this->Encuestas->find();
                $nub_conflictos_otros_ciclistasSql->select(['count' => $nub_conflictos_peatonesSql->func()->count('*'),'nub_conflictos_otros_ciclistas'])->group(['nub_conflictos_otros_ciclistas']);

                $nub_peligro_circulacion_ciudadSql = $this->Encuestas->find();
                $nub_peligro_circulacion_ciudadSql->select(['count' => $nub_peligro_circulacion_ciudadSql->func()->count('*'),'nub_peligro_circulacion_ciudad'])->group(['nub_peligro_circulacion_ciudad']);

                //$coordenadasSql = $this->Encuestas->find();
                //$coordenadasSql->select(['count' => $coordenadasSql->func()->count('*'),'coordenadas'])->group(['coordenadas']);

                
                $nub_no_disponer_bicicleta['problema']=0;
                $nub_no_disponer_bicicleta['problema_no_importante']=0;
                $nub_no_disponer_bicicleta['no_problema']=0;
                
                $nub_no_condicion_fisica['problema']=0;
                $nub_no_condicion_fisica['problema_no_importante']=0;
                $nub_no_condicion_fisica['no_problema']=0;

                $nub_sacar_meter_bicileta['problema']=0;
                $nub_sacar_meter_bicileta['problema_no_importante']=0;
                $nub_sacar_meter_bicileta['no_problema']=0;


                $nub_imagen_social['problema']=0;
                $nub_imagen_social['problema_no_importante']=0;
                $nub_imagen_social['no_problema']=0;

                $nub_no_poder_llevar_bici_transporte['problema']=0;
                $nub_no_poder_llevar_bici_transporte['problema_no_importante']=0;
                $nub_no_poder_llevar_bici_transporte['no_problema']=0;

                $nub_conflictos_conductores_autobuses['problema']=0;
                $nub_conflictos_conductores_autobuses['problema_no_importante']=0;
                $nub_conflictos_conductores_autobuses['no_problema']=0;

                $nub_conflictos_peatones['problema']=0;
                $nub_conflictos_peatones['problema_no_importante']=0;
                $nub_conflictos_peatones['no_problema']=0;

                $nub_conflictos_otros_ciclistas['problema']=0;
                $nub_conflictos_otros_ciclistas['problema_no_importante']=0;
                $nub_conflictos_otros_ciclistas['no_problema']=0;
                
                $nub_peligro_circulacion_ciudad['problema']=0;
                $nub_peligro_circulacion_ciudad['problema_no_importante']=0;
                $nub_peligro_circulacion_ciudad['no_problema']=0;
                
                foreach($nub_no_disponer_bicicletaSql as $fila){
                    $nub_no_disponer_bicicleta[$fila->nub_no_disponer_bicicleta] = round(($fila->count/$registros)*100,2);
                }

                foreach($nub_no_condicion_fisicaSql as $fila){
                    $nub_no_condicion_fisica[$fila->nub_no_condicion_fisica] = round(($fila->count/$registros)*100,2);
                }

                foreach($nub_sacar_meter_biciletaSql as $fila){
                    $nub_sacar_meter_bicileta[$fila->nub_sacar_meter_bicileta] = round(($fila->count/$registros)*100,2);
                }

                foreach($nub_imagen_socialSql as $fila){
                    $nub_imagen_social[$fila->nub_imagen_social] = round(($fila->count/$registros)*100,2);
                }

                foreach($nub_no_poder_llevar_bici_transporteSql as $fila){
                    $nub_no_poder_llevar_bici_transporte[$fila->nub_no_poder_llevar_bici_transporte] = round(($fila->count/$registros)*100,2);
                }

                foreach($nub_conflictos_conductores_autobusesSql as $fila){
                    $nub_conflictos_conductores_autobuses[$fila->nub_conflictos_conductores_autobuses] = round(($fila->count/$registros)*100,2);
                }

                foreach($nub_conflictos_peatonesSql as $fila){
                    $nub_conflictos_peatones[$fila->nub_conflictos_peatones] = round(($fila->count/$registros)*100,2);
                }

                foreach($nub_conflictos_otros_ciclistasSql as $fila){
                    $nub_conflictos_otros_ciclistas[$fila->nub_conflictos_otros_ciclistas] = round(($fila->count/$registros)*100,2);
                }

                foreach($nub_peligro_circulacion_ciudadSql as $fila){
                    $nub_peligro_circulacion_ciudad[$fila->nub_peligro_circulacion_ciudad] = round(($fila->count/$registros)*100,2);
                }
                

                 $strSinBicicleta = "[
                    ['','No disponer de bicicleta.','No tener condición fisica adecuada para rodar en bicicleta','Sacar y meter la bicicleta de mi domicilio','La imagen social poco adecuada que daria desplazarme en bicicleta, teniendo en cuenta mi edad o situación.','No poder llevar la bicleta en los transportes publicos(metrobus, autobus,etc)','Conflictos con los conductores de los automoviles, motos o autobuses que no respetan a los ciclistas','Conflictos con los peatones que no respetan a los ciclistas','Conflictos con otros ciclistas',' El peligro que supone la circulación en la ciudad.'],
                    ['Problema', ".$nub_no_disponer_bicicleta['problema'].",".$nub_no_condicion_fisica['problema'].",".$nub_sacar_meter_bicileta['problema'].",".$nub_imagen_social['problema'].",".$nub_no_poder_llevar_bici_transporte['problema'].",".$nub_conflictos_conductores_autobuses['problema'].",".$nub_conflictos_peatones['problema'].",".$nub_conflictos_otros_ciclistas['problema'].",".$nub_peligro_circulacion_ciudad['problema']."],
                    ['Problema no importante', ".$nub_no_disponer_bicicleta['problema_no_importante'].", ".$nub_no_condicion_fisica['problema_no_importante'].", ".$nub_sacar_meter_bicileta['problema_no_importante'].",".$nub_imagen_social['problema_no_importante'].",".$nub_no_poder_llevar_bici_transporte['problema_no_importante'].",".$nub_conflictos_conductores_autobuses['problema_no_importante'].",".$nub_conflictos_peatones['problema_no_importante'].",".$nub_conflictos_otros_ciclistas['problema_no_importante'].",".$nub_peligro_circulacion_ciudad['problema_no_importante']."],
                    ['No Problema', ".$nub_no_disponer_bicicleta['no_problema'].", ".$nub_no_condicion_fisica['no_problema'].", ".$nub_sacar_meter_bicileta['no_problema'].",".$nub_imagen_social['no_problema'].",".$nub_no_poder_llevar_bici_transporte['no_problema'].",".$nub_conflictos_conductores_autobuses['no_problema'].",".$nub_conflictos_peatones['no_problema'].",".$nub_conflictos_otros_ciclistas['no_problema'].",".$nub_peligro_circulacion_ciudad['no_problema']."]]";
                                                                                                                                                                                                                                                                                                                                                                        

                $this->set(compact(['id', 's1active', 's2active', 's3active', 's4active', 's5active','gkey','enc','encuesta','utiliza_biciletaSql','frecuencia_utiliza_bicicleta','str','strTieneBicicleta','strSinBicicleta','coordenadasQuery']));

                
                return $this->render('visualizacion');
            }
            $this->Flash->error(__('La encuesta no se pudo guardar, Por favor intentelo de nuevo.'));
        }
        $this->set(compact('encuesta'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Encuesta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $encuesta = $this->Encuestas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $encuesta = $this->Encuestas->patchEntity($encuesta, $this->request->getData());
            if ($this->Encuestas->save($encuesta)) {
                $this->Flash->success(__('The encuesta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The encuesta could not be saved. Please, try again.'));
        }
        $this->set(compact('encuesta'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Encuesta id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $encuesta = $this->Encuestas->get($id);
        if ($this->Encuestas->delete($encuesta)) {
            $this->Flash->success(__('The encuesta has been deleted.'));
        } else {
            $this->Flash->error(__('The encuesta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // Se hace en el controller y se regresan los resultados en un array con la instruccion compact

    //Solo es hacer la consulta en el controller y lo que te regresa se acomoda a como lo necesitas en la vista, 
    //se guarda en una o mas variables y se ponen en el compact, 
    //de esa forma la vista lo puede manipular con un for o while o lo que sea

    //Mas bien se llama la variable en la que enviaste los datos
    
    //Por ej echo $myVar
    
    //Y si en el controller enviaste esa variable en el compact, la vista si la puede ver

    public function queryEncuestas(){
        //$encuestaSql = $this->Encuestas->find('all');
        $encuestaSql = "SELECT utiliza_bicileta,COUNT(*) FROM encuestas WHERE utiliza_bicileta IS NOT NULL GROUP BY utiliza_bicileta;";
        $this->set(compact('encuestaSql'));
        //$sql = "SELECT utiliza_bicileta,COUNT(*) FROM encuestas WHERE utiliza_bicileta IS NOT NULL GROUP BY utiliza_bicileta;";
        //return $this->query($sql);

    }

}
