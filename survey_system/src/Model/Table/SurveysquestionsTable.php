<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Surveysquestions Model
 *
 * @property \App\Model\Table\SurveysTable|\Cake\ORM\Association\BelongsTo $Surveys
 *
 * @method \App\Model\Entity\Surveysquestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Surveysquestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Surveysquestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Surveysquestion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Surveysquestion|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Surveysquestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Surveysquestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Surveysquestion findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SurveysquestionsTable extends Table
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

        $this->setTable('surveysquestions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Surveys', [
            'foreignKey' => 'survey_id',
            'joinType' => 'INNER'
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('question')
            ->requirePresence('question', 'create')
            ->allowEmptyString('question', false);

        $validator
            ->integer('answer_type')
            ->requirePresence('answer_type', 'create')
            ->allowEmptyString('answer_type', false);

        $validator
            ->scalar('answer_A')
            ->maxLength('answer_A', 255)
            ->allowEmptyString('answer_A');

        $validator
            ->scalar('answer_B')
            ->maxLength('answer_B', 255)
            ->allowEmptyString('answer_B');

        $validator
            ->scalar('answer_C')
            ->maxLength('answer_C', 255)
            ->allowEmptyString('answer_C');

        $validator
            ->scalar('answer_D')
            ->maxLength('answer_D', 255)
            ->allowEmptyString('answer_D');

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
        $rules->add($rules->existsIn(['survey_id'], 'Surveys'));

        return $rules;
    }
}
