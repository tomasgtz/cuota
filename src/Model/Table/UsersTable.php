<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Statuses
 * @property |\Cake\ORM\Association\BelongsTo $RegistrationStatuses
 * @property |\Cake\ORM\Association\HasMany $SurveysResponses
 * @property |\Cake\ORM\Association\BelongsToMany $Homes
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RegistrationStatuses', [
            'foreignKey' => 'registration_status_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('SurveysResponses', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Homes', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'home_id',
            'joinTable' => 'homes_users'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 50)
            ->allowEmpty('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->allowEmpty('password');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('middle_name')
            ->maxLength('middle_name', 50)
            ->allowEmpty('middle_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 50)
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->scalar('second_last_name')
            ->maxLength('second_last_name', 50)
            ->allowEmpty('second_last_name');

        $validator
            ->scalar('cell_phone')
            ->maxLength('cell_phone', 13)
            ->allowEmpty('cell_phone');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 10)
            ->allowEmpty('phone');

        $validator
            ->scalar('role')
            ->maxLength('role', 20)
            ->allowEmpty('role');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));
        $rules->add($rules->existsIn(['registration_status_id'], 'RegistrationStatuses'));

        return $rules;
    }
}
