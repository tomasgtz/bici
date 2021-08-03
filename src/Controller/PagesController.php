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

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
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
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
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

        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage', 'persona', 'total_hombres', 'total_mujeres'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }


	public function procesoparticipativo($id): ?Response
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
		return $this->render(implode('/', $path));
    }
}
