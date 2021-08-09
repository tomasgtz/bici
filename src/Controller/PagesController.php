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

        $this->set(compact('page', 'subpage', 'persona', 'total_hombres', 'total_mujeres'));

    }


	public function procesoparticipativo($id)
    {
		$s1active = $s2active = $s3active = $s4active = '';
		
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

		$this->set(compact(['id', 's1active', 's2active', 's3active', 's4active']));
		return $this->render('procesoparticipativo');
    }


	public function descargadeinformacion()
	{
	
		return $this->render('descargadeinformacion');
	
	}
}
