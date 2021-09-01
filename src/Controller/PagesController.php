<?php
declare(strict_types=1);

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
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Model\Entity\Persona;
use Cake\Filesystem\File;


/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
	public function initialize(): void {
		
		parent::initialize();

	}

    public function home()
    {
		$persona = new Persona();
		$personas = $this->loadModel('Personas');
		$viajes_realizados = 0;
		
		$query = $personas->find();

		$query
				->select(['sexo',
						  'counter_sex' => $query->func()
									->count('Personas.sexo')])
				->group('sexo')
				->order('sexo');
        
		$registered = $query->toArray();
		$total_hombres = $total_mujeres = 0;

		if ($registered[0]->counter_sex !== null)
		{
			if ($registered[0]->sexo == 'H')
				$total_hombres = $registered[0]->counter_sex;
			else
				$total_mujeres = $registered[0]->counter_sex;
		}

		if ($registered[1]->counter_sex !== null)
		{
			if ($registered[1]->sexo == 'H')
				$total_hombres = $registered[1]->counter_sex;
			else
				$total_mujeres = $registered[1]->counter_sex;
		}

		$viajes_realizados = $this->leerdato('viajesrealizados');

        $this->set(compact('page', 'subpage', 'persona', 'total_hombres', 'total_mujeres', 'viajes_realizados'));

    }


	public function procesoparticipativo($id)
    {
		$s1active = $s2active = $s3active = $s4active = '';

		$gkey = env('GOOGLE_MAP_KEY', '');
		
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

		$this->set(compact(['id', 's1active', 's2active', 's3active', 's4active', 'gkey']));
		return $this->render('procesoparticipativo');
    }


	public function descargadeinformacion()
	{
	
		return $this->render('descargadeinformacion');
	
	}


	public function usuario()
	{
		$total_disponibles = $total_ocupados = $total_lugares = 'no disponible';

		$total_disponibles = $this->leerdato('disponibles');
		$total_lugares = $this->leerdato('totales');

		if ($total_disponibles != 'no disponible' && $total_lugares != 'no disponible' )
			$total_ocupados = $total_lugares - $total_disponibles;
		
		$this->set(compact(['total_disponibles', 'total_ocupados', 'total_lugares']));
		return $this->render('usuario');
	}


	private function leerdato($tipo)	
	{
		try {
			if ($tipo == 'disponibles')
			{
				$file = new File("../webroot/integracion/lugaresdisponibles.txt", false);
			} 
			else if ($tipo == 'totales')
			{
				$file = new File("../webroot/integracion/lugarestotales.txt", false);
			}
			else if ($tipo == 'viajesrealizados')
			{
				$file = new File("../webroot/integracion/viajesrealizados.txt", false);
			}
		} catch(Exception $e) {
			return "no disponible";
		}

		if(!$file->exists())
			return "no disponible";

		return $file->read();
	}
}
