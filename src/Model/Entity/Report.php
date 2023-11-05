<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Report Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $report_date
 * @property string $report
 * @property string $photo
 * @property int $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $citizen_id
 *
 * @property \App\Model\Entity\Citizen $citizen
 * @property \App\Model\Entity\Response[] $responses
 */
class Report extends Entity
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
        'report_date' => true,
        'report' => true,
        'photo' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'citizen_id' => true,
        'citizen' => true,
        'responses' => true,
    ];
}
