<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paper Entity
 *
 * @property int $id
 * @property string $paperId
 * @property \Cake\I18n\Time $date
 * @property int $currency_id
 * @property int $user_id
 * @property int $status_id
 * @property int $client_id
 * @property int $provider_id
 * @property string $purchaseOrder
 * @property float $taxRate
 * @property float $subTotal
 * @property float $taxTotal
 * @property float $total
 * @property string $delegat
 * @property string $identity_card
 * @property string $notes1
 * @property string $notes2
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Currency $currency
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Provider $provider
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\Category[] $categories
 */
class Paper extends Entity
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
