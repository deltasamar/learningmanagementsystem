<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CartCourse Entity
 *
 * @property int $id
 * @property int $cart_id
 * @property int $courese_id
 * @property float $gross_price
 * @property int $discount
 * @property float $net_price
 * @property \Cake\I18n\FrozenTime $create_date
 * @property int $user_id
 *
 * @property \App\Model\Entity\Cart $cart
 * @property \App\Model\Entity\Courese $courese
 * @property \App\Model\Entity\User $user
 */
class CartCourse extends Entity
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
        'cart_id' => true,
        'course_id' => true,
        'gross_price' => true,
        'discount' => true,
        'net_price' => true,
        'create_date' => true,
        'user_id' => true,
        'cart' => true,
        'course' => true,
        'user' => true,
    ];
}
