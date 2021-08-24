<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Encuestas Model
 *
 * @method \App\Model\Entity\Encuesta newEmptyEntity()
 * @method \App\Model\Entity\Encuesta newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Encuesta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Encuesta get($primaryKey, $options = [])
 * @method \App\Model\Entity\Encuesta findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Encuesta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Encuesta[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Encuesta|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Encuesta saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Encuesta[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Encuesta[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Encuesta[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Encuesta[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EncuestasTable extends Table
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

        $this->setTable('encuestas');
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
            ->scalar('utiliza_bicileta')
            ->maxLength('utiliza_bicileta', 5)
            ->allowEmptyString('utiliza_bicileta');

        $validator
            ->scalar('beneficios_considera')
            ->allowEmptyString('beneficios_considera');

        $validator
            ->scalar('fub_ocio_deportiva')
            ->maxLength('fub_ocio_deportiva', 25)
            ->allowEmptyString('fub_ocio_deportiva');

        $validator
            ->scalar('fub_transporte')
            ->maxLength('fub_transporte', 25)
            ->allowEmptyString('fub_transporte');

        $validator
            ->scalar('fub_ir_trabajar')
            ->maxLength('fub_ir_trabajar', 25)
            ->allowEmptyString('fub_ir_trabajar');

        $validator
            ->scalar('idd_sacar_meter_domicilio')
            ->maxLength('idd_sacar_meter_domicilio', 25)
            ->allowEmptyString('idd_sacar_meter_domicilio');

        $validator
            ->scalar('idd_no_transporte_publico')
            ->maxLength('idd_no_transporte_publico', 25)
            ->allowEmptyString('idd_no_transporte_publico');

        $validator
            ->scalar('idd_robo_estacionada')
            ->maxLength('idd_robo_estacionada', 25)
            ->allowEmptyString('idd_robo_estacionada');

        $validator
            ->scalar('idd_dificultad_estacionada_seguro')
            ->maxLength('idd_dificultad_estacionada_seguro', 25)
            ->allowEmptyString('idd_dificultad_estacionada_seguro');

        $validator
            ->scalar('idd_falta_ciclovia')
            ->maxLength('idd_falta_ciclovia', 25)
            ->allowEmptyString('idd_falta_ciclovia');

        $validator
            ->scalar('idd_vias_alto_flujo')
            ->maxLength('idd_vias_alto_flujo', 25)
            ->allowEmptyString('idd_vias_alto_flujo');

        $validator
            ->scalar('idd_invacion_ciclovias_peatones_coches')
            ->maxLength('idd_invacion_ciclovias_peatones_coches', 25)
            ->allowEmptyString('idd_invacion_ciclovias_peatones_coches');

        $validator
            ->scalar('idd_conflictos_conductores_automoviles_motos_autobuses')
            ->maxLength('idd_conflictos_conductores_automoviles_motos_autobuses', 25)
            ->allowEmptyString('idd_conflictos_conductores_automoviles_motos_autobuses');

        $validator
            ->scalar('idd_conflictos_peatones_no_respetan')
            ->maxLength('idd_conflictos_peatones_no_respetan', 25)
            ->allowEmptyString('idd_conflictos_peatones_no_respetan');

        $validator
            ->scalar('idd_no_conocer_normas')
            ->maxLength('idd_no_conocer_normas', 25)
            ->allowEmptyString('idd_no_conocer_normas');

        $validator
            ->scalar('idd_conflictos_otros_ciclistas')
            ->maxLength('idd_conflictos_otros_ciclistas', 25)
            ->allowEmptyString('idd_conflictos_otros_ciclistas');

        $validator
            ->scalar('idd_peligro_circulacion_ciudad')
            ->maxLength('idd_peligro_circulacion_ciudad', 25)
            ->allowEmptyString('idd_peligro_circulacion_ciudad');

        $validator
            ->scalar('nub_no_disponer_bicicleta')
            ->maxLength('nub_no_disponer_bicicleta', 25)
            ->allowEmptyString('nub_no_disponer_bicicleta');

        $validator
            ->scalar('nub_no_condicion_fisica')
            ->maxLength('nub_no_condicion_fisica', 25)
            ->allowEmptyString('nub_no_condicion_fisica');

        $validator
            ->scalar('nub_sacar_meter_bicileta')
            ->maxLength('nub_sacar_meter_bicileta', 25)
            ->allowEmptyString('nub_sacar_meter_bicileta');

        $validator
            ->scalar('nub_imagen_social')
            ->maxLength('nub_imagen_social', 25)
            ->allowEmptyFile('nub_imagen_social');

        $validator
            ->scalar('nub_no_poder_llevar_bici_transporte')
            ->maxLength('nub_no_poder_llevar_bici_transporte', 25)
            ->allowEmptyString('nub_no_poder_llevar_bici_transporte');

        $validator
            ->scalar('nub_conflictos_conductores_autobuses')
            ->maxLength('nub_conflictos_conductores_autobuses', 25)
            ->allowEmptyString('nub_conflictos_conductores_autobuses');

        $validator
            ->scalar('nub_conflictos_peatones')
            ->maxLength('nub_conflictos_peatones', 25)
            ->allowEmptyString('nub_conflictos_peatones');

        $validator
            ->scalar('nub_conflictos_otros_ciclistas')
            ->maxLength('nub_conflictos_otros_ciclistas', 25)
            ->allowEmptyString('nub_conflictos_otros_ciclistas');

        $validator
            ->scalar('nub_peligro_circulacion_ciudad')
            ->maxLength('nub_peligro_circulacion_ciudad', 25)
            ->allowEmptyString('nub_peligro_circulacion_ciudad');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 25)
            ->allowEmptyString('ip');

        $validator
            ->scalar('coordenadas')
            ->maxLength('coordenadas', 255)
            ->allowEmptyString('coordenadas');

        return $validator;
    }
}
