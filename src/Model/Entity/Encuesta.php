<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Encuesta Entity
 *
 * @property int $id
 * @property string|null $utiliza_bicileta
 * @property string|null $beneficios_considera
 * @property string|null $fub_ocio_deportiva
 * @property string|null $fub_transporte
 * @property string|null $fub_ir_trabajar
 * @property string|null $idd_sacar_meter_domicilio
 * @property string|null $idd_no_transporte_publico
 * @property string|null $idd_robo_estacionada
 * @property string|null $idd_dificultad_estacionada_seguro
 * @property string|null $idd_falta_ciclovia
 * @property string|null $idd_vias_alto_flujo
 * @property string|null $idd_invacion_ciclovias_peatones_coches
 * @property string|null $idd_conflictos_conductores_automoviles_motos_autobuses
 * @property string|null $idd_conflictos_peatones_no_respetan
 * @property string|null $idd_no_conocer_normas
 * @property string|null $idd_conflictos_otros_ciclistas
 * @property string|null $idd_peligro_circulacion_ciudad
 * @property string|null $nub_no_disponer_bicicleta
 * @property string|null $nub_no_condicion_fisica
 * @property string|null $nub_sacar_meter_bicileta
 * @property string|null $nub_imagen_social
 * @property string|null $nub_no_poder_llevar_bici_transporte
 * @property string|null $nub_conflictos_conductores_autobuses
 * @property string|null $nub_conflictos_peatones
 * @property string|null $nub_conflictos_otros_ciclistas
 * @property string|null $nub_peligro_circulacion_ciudad
 * @property string|null $ip
 * @property \Cake\I18n\FrozenTime $created
 * @property string|null $coordenadas
 */
class Encuesta extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'utiliza_bicileta' => true,
        'beneficios_considera' => true,
        'fub_ocio_deportiva' => true,
        'fub_transporte' => true,
        'fub_ir_trabajar' => true,
        'idd_sacar_meter_domicilio' => true,
        'idd_no_transporte_publico' => true,
        'idd_robo_estacionada' => true,
        'idd_dificultad_estacionada_seguro' => true,
        'idd_falta_ciclovia' => true,
        'idd_vias_alto_flujo' => true,
        'idd_invacion_ciclovias_peatones_coches' => true,
        'idd_conflictos_conductores_automoviles_motos_autobuses' => true,
        'idd_conflictos_peatones_no_respetan' => true,
        'idd_no_conocer_normas' => true,
        'idd_conflictos_otros_ciclistas' => true,
        'idd_peligro_circulacion_ciudad' => true,
        'nub_no_disponer_bicicleta' => true,
        'nub_no_condicion_fisica' => true,
        'nub_sacar_meter_bicileta' => true,
        'nub_imagen_social' => true,
        'nub_no_poder_llevar_bici_transporte' => true,
        'nub_conflictos_conductores_autobuses' => true,
        'nub_conflictos_peatones' => true,
        'nub_conflictos_otros_ciclistas' => true,
        'nub_peligro_circulacion_ciudad' => true,
        'ip' => true,
        'created' => true,
        'coordenadas' => true,
    ];
}
