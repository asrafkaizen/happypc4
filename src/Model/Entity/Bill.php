<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bill Entity
 *
 * @property int $id
 * @property float $payment
 * @property float $cost
 * @property \Cake\I18n\FrozenTime $time
 *
 * @property \App\Model\Entity\Shift[] $shifts
 */
class Bill extends Entity
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
        'payment' => true,
        'cost' => true,
        'time' => true,
        'shifts' => true
    ];
}
