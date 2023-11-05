<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Levels Model
 *
 * @property \App\Model\Table\CitizensTable&\Cake\ORM\Association\HasMany $Citizens
 * @property \App\Model\Table\OfficersTable&\Cake\ORM\Association\HasMany $Officers
 *
 * @method \App\Model\Entity\Level newEmptyEntity()
 * @method \App\Model\Entity\Level newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Level[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Level get($primaryKey, $options = [])
 * @method \App\Model\Entity\Level findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Level patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Level[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Level|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Level saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LevelsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('levels');
        $this->setDisplayField('level');
        $this->setPrimaryKey('id');

        $this->hasMany('Citizens', [
            'foreignKey' => 'level_id',
        ]);
        $this->hasMany('Officers', [
            'foreignKey' => 'level_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('level')
            ->maxLength('level', 25)
            ->requirePresence('level', 'create')
            ->notEmptyString('level');

        return $validator;
    }
}
