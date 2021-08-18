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

                return $this->redirect(['controller' => 'Pages', 'action' => 'home']);
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
}
