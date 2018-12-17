<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suburb Model
 *
 * @property \App\Model\Table\SuburbConfigurationTable|\Cake\ORM\Association\BelongsTo $SuburbConfiguration
 * @property \App\Model\Table\StatusesTable|\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\AmenitiesTable|\Cake\ORM\Association\HasMany $Amenities
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\HasMany $Files
 * @property \App\Model\Table\HandylinksTable|\Cake\ORM\Association\HasMany $Handylinks
 * @property \App\Model\Table\NewsTable|\Cake\ORM\Association\HasMany $News
 * @property \App\Model\Table\PaymentsNotificationsQueueTable|\Cake\ORM\Association\HasMany $PaymentsNotificationsQueue
 * @property \App\Model\Table\PhonebookTable|\Cake\ORM\Association\HasMany $Phonebook
 * @property \App\Model\Table\RequestsTable|\Cake\ORM\Association\HasMany $Requests
 * @property \App\Model\Table\StreetsTable|\Cake\ORM\Association\HasMany $Streets
 * @property \App\Model\Table\SurveysTable|\Cake\ORM\Association\HasMany $Surveys
 *
 * @method \App\Model\Entity\Suburb get($primaryKey, $options = [])
 * @method \App\Model\Entity\Suburb newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Suburb[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Suburb|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Suburb patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Suburb[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Suburb findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SuburbTable extends Table
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

        $this->setTable('suburb');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('SuburbConfiguration', [
            'foreignKey' => 'configuration_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Amenities', [
            'foreignKey' => 'suburb_id'
        ]);
        $this->hasMany('Files', [
            'foreignKey' => 'suburb_id'
        ]);
        $this->hasMany('Handylinks', [
            'foreignKey' => 'suburb_id'
        ]);
        $this->hasMany('News', [
            'foreignKey' => 'suburb_id'
        ]);
        $this->hasMany('PaymentsNotificationsQueue', [
            'foreignKey' => 'suburb_id'
        ]);
        $this->hasMany('Phonebook', [
            'foreignKey' => 'suburb_id'
        ]);
        $this->hasMany('Requests', [
            'foreignKey' => 'suburb_id'
        ]);
        $this->hasMany('Streets', [
            'foreignKey' => 'suburb_id'
        ]);
        $this->hasMany('Surveys', [
            'foreignKey' => 'suburb_id'
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
            ->scalar('name')
            ->maxLength('name', 200)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['configuration_id'], 'SuburbConfiguration'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));

        return $rules;
    }
}
