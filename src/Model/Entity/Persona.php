<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $curp
 * @property string $sexo
 * @property string $correo
 * @property string $cp
 * @property string $calle
 * @property int $numero_exterior
 * @property string $numero_interior
 * @property string $foto_bici
 * @property string $identificacion
 * @property string $identificacion_menor
 * @property \Cake\I18n\FrozenTime|null $created
 */
class Persona extends Entity
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
        'nombre' => true,
        'apellido_paterno' => true,
        'apellido_materno' => true,
        'curp' => true,
        'sexo' => true,
        'correo' => true,
        'cp' => true,
        'calle' => true,
        'numero_exterior' => true,
        'numero_interior' => true,
        'foto_bici' => true,
        'identificacion' => true,
        'identificacion_menor' => true,
        'created' => true,
    ];
}
