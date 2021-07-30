<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Invoice Entity
 *
 * @property int $id
 * @property int $user_id
 * @property float $gross_price
 * @property int $discount
 * @property float $net_price
 * @property \Cake\I18n\FrozenTime $create_date
 * @property int $invoice_no
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\InvoiceCourse[] $invoice_courses
 */
class Invoice extends Entity
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
        'user_id' => true,
        'gross_price' => true,
        'discount' => true,
        'net_price' => true,
        'create_date' => true,
        'invoice_no' => true,
        'user' => true,
        'invoice_courses' => true,
    ];
}
