<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InvoiceCourses Model
 *
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\BelongsTo $Invoices
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\InvoiceCourse get($primaryKey, $options = [])
 * @method \App\Model\Entity\InvoiceCourse newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InvoiceCourse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceCourse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvoiceCourse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvoiceCourse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceCourse[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvoiceCourse findOrCreate($search, callable $callback = null, $options = [])
 */
class InvoiceCoursesTable extends Table
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

        $this->setTable('invoice_courses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Invoices', [
            'foreignKey' => 'invoice_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
		$this->belongsTo('Courses', [
            'foreignKey' => 'course_id',
			'joinType' => 'INNER',
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
            ->numeric('gross_price')
            ->requirePresence('gross_price', 'create')
            ->notEmptyString('gross_price');

        $validator
            ->integer('discount')
            ->requirePresence('discount', 'create')
            ->notEmptyString('discount');

        $validator
            ->numeric('net_price')
            ->requirePresence('net_price', 'create')
            ->notEmptyString('net_price');

        $validator
            ->dateTime('create_date')
            ->requirePresence('create_date', 'create')
            ->notEmptyDateTime('create_date');

        $validator
            ->integer('invoice_no')
            ->requirePresence('invoice_no', 'create')
            ->notEmptyString('invoice_no');

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
        $rules->add($rules->existsIn(['invoice_id'], 'Invoices'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
