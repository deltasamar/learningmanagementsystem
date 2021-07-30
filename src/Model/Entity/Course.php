<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string $image
 * @property string|null $objective
 * @property int $user_id
 * @property int $duration
 * @property string|null $total_video_time
 * @property float|null $rating
 * @property int|null $number_user_registered
 * @property \Cake\I18n\FrozenTime $create_date
 * @property \Cake\I18n\FrozenTime $modify_date
 * @property string|null $modify_by
 * @property int $is_deleted
 * @property int $status
 * @property int $is_active
 *
 * @property \App\Model\Entity\User $user
 */
class Course extends Entity
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
        'name' => true,
        'slug' => true,
        'description' => true,
		'price' => true,
        'image' => true,
        'objective' => true,
        'user_id' => true,
        'duration' => true,
        'total_video_time' => true,
        'rating' => true,
        'number_user_registered' => true,
        'create_date' => true,
        'modify_date' => true,
        'modify_by' => true,
        'is_deleted' => true,
        'status' => true,
        'is_active' => true,
        'user' => true,
    ];
}
