<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EncuestasFixture
 */
class EncuestasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'utiliza_bicileta' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'beneficios_considera' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'fub_ocio_deportiva' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'fub_transporte' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'fub_ir_trabajar' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_sacar_meter_domicilio' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_no_transporte_publico' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_robo_estacionada' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_dificultad_estacionada_seguro' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_falta_ciclovia' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_vias_alto_flujo' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_invacion_ciclovias_peatones_coches' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_conflictos_conductores_automoviles_motos_autobuses' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_conflictos_peatones_no_respetan' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_no_conocer_normas' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_conflictos_otros_ciclistas' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'idd_peligro_circulacion_ciudad' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'nub_no_disponer_bicicleta' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'nub_no_condicion_fisica' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'nub_sacar_meter_bicileta' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'nub_imagen_social' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'nub_no_poder_llevar_bici_transporte' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'nub_conflictos_conductores_autobuses' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'nub_conflictos_peatones' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'nub_conflictos_otros_ciclistas' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'nub_peligro_circulacion_ciudad' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'ip' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'coordenadas' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8_spanish_ci', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_spanish_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'utiliza_bicileta' => 'Lor',
                'beneficios_considera' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'fub_ocio_deportiva' => 'Lorem ipsum dolor ',
                'fub_transporte' => 'Lorem ipsum dolor ',
                'fub_ir_trabajar' => 'Lorem ipsum dolor ',
                'idd_sacar_meter_domicilio' => 'Lorem ipsum dolor ',
                'idd_no_transporte_publico' => 'Lorem ipsum dolor ',
                'idd_robo_estacionada' => 'Lorem ipsum dolor ',
                'idd_dificultad_estacionada_seguro' => 'Lorem ipsum dolor ',
                'idd_falta_ciclovia' => 'Lorem ipsum dolor ',
                'idd_vias_alto_flujo' => 'Lorem ipsum dolor ',
                'idd_invacion_ciclovias_peatones_coches' => 'Lorem ipsum dolor ',
                'idd_conflictos_conductores_automoviles_motos_autobuses' => 'Lorem ipsum dolor ',
                'idd_conflictos_peatones_no_respetan' => 'Lorem ipsum dolor ',
                'idd_no_conocer_normas' => 'Lorem ipsum dolor ',
                'idd_conflictos_otros_ciclistas' => 'Lorem ipsum dolor ',
                'idd_peligro_circulacion_ciudad' => 'Lorem ipsum dolor ',
                'nub_no_disponer_bicicleta' => 'Lorem ipsum dolor ',
                'nub_no_condicion_fisica' => 'Lorem ipsum dolor ',
                'nub_sacar_meter_bicileta' => 'Lorem ipsum dolor ',
                'nub_imagen_social' => 'Lorem ipsum dolor ',
                'nub_no_poder_llevar_bici_transporte' => 'Lorem ipsum dolor ',
                'nub_conflictos_conductores_autobuses' => 'Lorem ipsum dolor ',
                'nub_conflictos_peatones' => 'Lorem ipsum dolor ',
                'nub_conflictos_otros_ciclistas' => 'Lorem ipsum dolor ',
                'nub_peligro_circulacion_ciudad' => 'Lorem ipsum dolor ',
                'ip' => 'Lorem ipsum dolor ',
                'created' => '2021-08-13 18:28:18',
                'coordenadas' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
