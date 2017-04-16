<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $name
 * @property int $paper_id
 * @property string $description
 * @property int $unit_id
 * @property float $qty
 * @property int $type_id
 * @property int $nr_vag_manevra
 * @property float $tone_manevra
 * @property int $nr_vag_transp
 * @property float $tone_transp
 * @property float $km
 * @property float $price
 * @property float $rate
 * @property float $total
 *
 * @property \App\Model\Entity\Paper $paper
 * @property \App\Model\Entity\Unit $unit
 * @property \App\Model\Entity\Type $type
 */
class Item extends Entity
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
        '*' => true,
        'id' => false
    ];
}
