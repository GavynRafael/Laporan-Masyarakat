<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Response Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $respon_date
 * @property string $respon
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $officer_id
 * @property int $report_id
 *
 * @property \App\Model\Entity\Officer $officer
 * @property \App\Model\Entity\Report $report
 */
class Response extends Entity
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
        'respon_date' => true,
        'respon' => true,
        'created' => true,
        'modified' => true,
        'officer_id' => true,
        'report_id' => true,
        'officer' => true,
        'report' => true,
    ];
}
