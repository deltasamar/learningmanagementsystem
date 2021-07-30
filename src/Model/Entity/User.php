<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $user_image
 * @property string $email
 * @property string $phone_no
 * @property string $password
 * @property int $user_type
 * @property \Cake\I18n\FrozenTime $registration_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Course[] $courses
 */
class User extends Entity
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
        'user_image' => true,
        'email' => true,
        'phone_no' => true,
        'password' => true,
        'user_type' => true,
        'registration_date' => true,
        'is_deleted' => true,
        'courses' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
	protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
