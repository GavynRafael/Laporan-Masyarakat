<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Citizen Entity
 *
 * @property int $id
 * @property int $nik
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string $telp
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $level_id
 *
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Report[] $reports
 */
class Citizen extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'nik' => true,
        'name' => true,
        'username' => true,
        'password' => true,
        'telp' => true,
        'created' => true,
        'modified' => true,
        'level_id' => true,
        'level' => true,
        'reports' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
}
