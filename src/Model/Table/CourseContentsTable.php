<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CourseContents Model
 *
 * @property \App\Model\Table\CourseContentsTable&\Cake\ORM\Association\BelongsTo $ParentCourseContents
 * @property \App\Model\Table\CourseContentsTable&\Cake\ORM\Association\HasMany $ChildCourseContents
 *
 * @method \App\Model\Entity\CourseContent get($primaryKey, $options = [])
 * @method \App\Model\Entity\CourseContent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CourseContent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CourseContent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CourseContent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CourseContent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CourseContent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CourseContent findOrCreate($search, callable $callback = null, $options = [])
 */
class CourseContentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('course_contents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
		$this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
        ]);
        $this->belongsTo('ParentCourseContents', [
            'className' => 'CourseContents',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildCourseContents', [
            'className' => 'CourseContents',
            'foreignKey' => 'parent_id',
        ]);
		
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        
        return $rules;
    }
}
