<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Personas Model
 *
 * @method \App\Model\Entity\Persona newEmptyEntity()
 * @method \App\Model\Entity\Persona newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Persona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Persona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Persona findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Persona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Persona[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Persona|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Persona saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Persona[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Persona[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Persona[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Persona[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PersonasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('personas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 50)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre', 'Nombre es requerido');

        $validator
            ->scalar('apellido_paterno')
            ->maxLength('apellido_paterno', 50)
            ->requirePresence('apellido_paterno', 'create')
            ->notEmptyString('apellido_paterno', 'Apellido Paterno es requerido');

        $validator
            ->scalar('apellido_materno')
            ->maxLength('apellido_materno', 50)
            ->requirePresence('apellido_materno', 'create')
            ->notEmptyString('apellido_materno', 'Apellido Materno es requerido');

        $validator
            ->scalar('curp')
            ->requirePresence('curp', 'create')
            ->notEmptyString('curp', 'CURP es requerido')
			->add('curp', 'minima longitud', [
				'rule' => ['minLength', 18],
				'message' => 'CURP: Debe contener 18 caracteres.'
			])
			->add('curp', 'maxima longitud', [
				'rule' => ['maxLength', 18],
				'message' => 'CURP: Debe contener 18 caracteres.'
			]);

        $validator
            ->scalar('correo')
            ->maxLength('correo', 50)
            ->requirePresence('correo', 'create')
			->notEmptyString('correo', 'Correo electronico es requerido');

        $validator
            ->scalar('cp')
            ->maxLength('cp', 10)
            ->requirePresence('cp', 'create')
            ->notEmptyString('cp', 'Codigo Postal es requerido');

        $validator
            ->scalar('calle')
            ->maxLength('calle', 128)
            ->requirePresence('calle', 'create')
            ->notEmptyString('calle', 'Calle es requerida');

        $validator
            ->integer('numero_exterior')
            ->requirePresence('numero_exterior', 'create')
            ->notEmptyString('numero_exterior', 'Numero exterior es requerido');

        $validator
            ->scalar('numero_interior')
            ->maxLength('numero_interior', 5)
			->allowEmptyString('numero_interior');

        $validator
            ->scalar('foto_bici')
            ->maxLength('foto_bici', 256)
            ->notEmptyString('foto_bici', 'Foto de la bicicleta es requerida');

        $validator
            ->scalar('identificacion')
            ->maxLength('identificacion', 256)
            ->notEmptyString('identificacion', 'Foto de la bicicleta es requerida');

        $validator
            ->scalar('identificacion_menor')
            ->maxLength('identificacion_menor', 256);

        return $validator;
    }
}
