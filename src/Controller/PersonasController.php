<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Personas Controller
 *
 * @property \App\Model\Table\PersonasTable $Personas
 * @method \App\Model\Entity\Persona[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonasController extends AppController
{

	var $path = '';

	public function initialize(): void {
		
		parent::initialize();
		$this->path = str_replace(DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR, '', __DIR__ . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'ids' . DIRECTORY_SEPARATOR;
	}


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $personas = $this->paginate($this->Personas);

        $this->set(compact('personas'));
    }

    /**
     * View method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $persona = $this->Personas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('persona'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->fileMessageError = [];

        $persona = $this->Personas->newEmptyEntity();
        if ($this->request->is('post')) {
            
			$pers['nombre']				= $this->request->getData('nombre');
			$pers['apellido_paterno']	= $this->request->getData('apellido_paterno');
			$pers['apellido_materno']	= $this->request->getData('apellido_materno');
			$pers['curp']				= $this->request->getData('curp');
			$pers['sexo']				= $pers['curp'][10];
			$pers['correo']				= $this->request->getData('correo');
			$pers['cp']					= $this->request->getData('cp');
			$pers['calle']				= $this->request->getData('calle');
			$pers['numero_exterior']	= $this->request->getData('numero_exterior');
			$pers['numero_interior']	= $this->request->getData('numero_interior');

			$count = $this->Personas->find()->where(['curp' => $pers['curp']])->count();

			if ($count >= 1) {
				$this->Flash->error('Ya existe un registro con el mismo CURP');
				return $this->redirect('/');
			}

			$personYear		= $pers['curp'][4].$pers['curp'][5];
			$personMonth	= $pers['curp'][6].$pers['curp'][7];
			$personDay		= $pers['curp'][8].$pers['curp'][9];

			if ($personYear > 35)
				$personYear = '19' . $personYear;
			else
				$personYear = '20' . $personYear;
			
			$currentDate	= getdate();
			$currentYear	= $currentDate['year'];
			$currentMonth	= sprintf("%'.02d", $currentDate['mon']);
			$currentDay		= sprintf("%'.02d", $currentDate['mday']);
			
			$currentDate	= $currentYear .'-'. $currentMonth .'-'. $currentDay;
			$PersonDate		= $personYear .'-'. $personMonth .'-'. $personDay;
					
			$datetime1 = new \DateTime($currentDate);
			$datetime2 = new \DateTime($PersonDate);
			$interval = $datetime1->diff($datetime2);
			$edad = $interval->format('%y');
			
			$persona = $this->Personas->patchEntity($persona, $pers);
            
			try {
				$saving = $this->Personas->save($persona);
				
				if ($saving) {
					
					$this->saveAllPhotos($persona, $edad);
					
					if (count($this->fileMessageError) > 0)
					{
						$this->Flash->error('El registro fue creado exitosamente, pero algunas imagenes no pudieron ser guardadas');
						
						foreach($this->fileMessageError as $errMessage)
						{
							$this->Flash->error(__($errMessage));
						}
					}
					else
					{
						$this->Flash->success('Se ha registrado exitosamente');
					}
				} 
				else 
				{	
					$errors = $persona->getErrors();
					$errorMessageStr = '';

					foreach ($errors as $key => $validationError) {
						foreach($validationError as $key2 => $errorMessage) {
							$errorMessageStr .= $key . ': [' . $key2.'] - '. $errorMessage . "<br>"; 
						}
					}

					$this->Flash->error($errorMessageStr, ['escape' => false]);
				}

			}
			catch(\Exception $e)
			{
				
				$this->Flash->error('Error: No se ha podido crear el registro.' . $e->getMessage());
			}
			
			return $this->redirect('/');
        }
        $this->set(compact('persona'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $persona = $this->Personas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $persona = $this->Personas->patchEntity($persona, $this->request->getData());
            if ($this->Personas->save($persona)) {
                $this->Flash->success(__('The persona has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persona could not be saved. Please, try again.'));
        }
        $this->set(compact('persona'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Persona id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $persona = $this->Personas->get($id);
        if ($this->Personas->delete($persona)) {
            $this->Flash->success(__('The persona has been deleted.'));
        } else {
            $this->Flash->error(__('The persona could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

	
	private function saveAllPhotos($persona, $edad)
	{
		$request = $this->request->getData();

		if($request['foto_bici']->getClientFilename() !== null && 
			!empty($request['foto_bici']->getClientFilename())) 
		{
			$photo_url = $this->saveFile($persona->id, 1, 'foto_bici');

			if ($photo_url !== false)
				$persona->foto_bici = $photo_url;

		}

		if($request['identificacion']->getClientFilename() !== null && 
			!empty($request['identificacion']->getClientFilename())) 
		{
			$photo_url = $this->saveFile($persona->id, 2, 'identificacion');

			if ($photo_url !== false)
				$persona->identificacion = $photo_url;

		}

		if ($edad < 18)
		{
			if($request['identificacion_menor']->getClientFilename() !== null && 
			!empty($request['identificacion_menor']->getClientFilename())) 
			{
				$photo_url = $this->saveFile($persona->id, 3, 'identificacion_menor');

				if ($photo_url !== false)
					$persona->identificacion_menor = $photo_url;
			}
		}

		$this->Personas->save($persona);
	}


	private function saveFile($id, $index, $field_name) 
	{
		$request = $this->request->getData();
		$clientFilename = $request[$field_name]->getClientFilename();

		$extension = substr(strtolower(strrchr($clientFilename, '.')), 1);
		$allowedExtensions = array('jpg', 'jpeg', 'png', 'pdf');

		if( !in_array($extension, $allowedExtensions) ) // Check extensions
		{
			$this->fileMessageError[$index] = 'Archivo no valido (Solo jpg, jpeg, png y pdf): '.'[Archivo '.$index.']'.' '.$extension;
			return false;
		}

		$fullName = strtolower($request[$field_name]->getClientFilename());
		$nameWithoutExt = str_replace('.'.$extension, '', $fullName);

		$fileName = 'Imagen_'.$id.'_'.$field_name.'_'.$nameWithoutExt.'_'.date('YmdHis') .'.'. $extension;

		try {
			// Valida si el archivo pudo ser cargado en el directorio
			if( $request[$field_name]->moveTo($this->path.$fileName) ) 
			{
				$this->fileMessageError[$index] = 'La imagen no pudo ser guardada';
				return false;
			}
		} catch( Exception $e) {

			$this->fileMessageError[$index] = 'Error al guardar la imagen: '. $e->getMessage();
			return false;
		}

		return $fileName;
	}
}
