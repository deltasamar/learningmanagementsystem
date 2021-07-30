<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CourseContent Entity
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $content_type
 * @property string $content_url
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime $creted_date
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\ParentCourseContent $parent_course_content
 * @property \App\Model\Entity\ChildCourseContent[] $child_course_contents
 */
class CourseContent extends Entity
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
        'parent_id' => true,
        'name' => true,
        'content_type' => true,
        'content_url' => true,
        'description' => true,
        'creted_date' => true,
        'is_deleted' => true,
		'course_id' => true,
		'course' => true,
        'parent_course_content' => true,
        'child_course_contents' => true,
    ];
}
