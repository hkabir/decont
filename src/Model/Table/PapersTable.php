<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Papers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Currencies
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Statuses
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsTo $Providers
 * @property \Cake\ORM\Association\HasMany $Items
 * @property \Cake\ORM\Association\BelongsToMany $Categories
 *
 * @method \App\Model\Entity\Paper get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paper newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Paper[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paper|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paper patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paper[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paper findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PapersTable extends Table
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

        $this->setTable('papers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Providers', [
            'foreignKey' => 'provider_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'paper_id'
        ]);
        $this->belongsToMany('Categories', [
            'foreignKey' => 'paper_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'categories_papers'
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
            ->requirePresence('paperId', 'create')
            ->notEmpty('paperId');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->requirePresence('purchaseOrder', 'create')
            ->notEmpty('purchaseOrder');

        $validator
            ->decimal('taxRate')
            //->requirePresence('taxRate', 'create')
            ->allowEmpty('taxRate');

        $validator
            ->decimal('subTotal')
            ->allowEmpty('subTotal');

        $validator
            ->decimal('taxTotal')
            ->allowEmpty('taxTotal');

        $validator
            ->decimal('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');
            ;

        $validator
            ->requirePresence('delegat', 'create')
            ->allowEmpty('delegat');

        $validator
            ->requirePresence('identity_card', 'create');
            //->notEmpty('identity_card');

        $validator
            ->requirePresence('notes1', 'create');
            //->notEmpty('notes1');

        $validator
            ->requirePresence('notes2', 'create');


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
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));
        $rules->add($rules->existsIn(['client_id'], 'Clients'));
        $rules->add($rules->existsIn(['provider_id'], 'Providers'));

        return $rules;
    }
    
    # returns last 5 drafts invoices

    function draftInvoices($user_id) {
        return $this->find('all', array('conditions' => array('Invoice.status_id' => 1, 'Invoice.user_id' => $user_id),
                    'order' => 'Invoice.InvoiceId DESC',
                    'limit' => 20)
        );
    }

    # returns last 5 open invoices

    function openInvoices($user_id) {
        return $this->find('all', array('conditions' => array('Invoice.status_id' => 2, 'Invoice.user_id' => $user_id),
                    'order' => 'Invoice.InvoiceId DESC',
                    'limit' => 20)
        );
    }

    # returns last 5 closed invoices

    function closedInvoices($user_id) {
        return $this->find('all', array('conditions' => array('Invoice.status_id' => 3, 'Invoice.user_id' => $user_id),
                    'order' => 'Invoice.InvoiceId DESC',
                    'limit' => 20)
        );
    }

    # returns last 5 past due invoices

    function pastdueInvoices($user_id) {
        return $this->find('all', array('conditions' => array('Invoice.status_id' => 4, 'Invoice.user_id' => $user_id),
                    'order' => 'Invoice.InvoiceId DESC',
                    'limit' => 20)
        );
    }

    # returns invoice stats for dashboard

    function stats($user_id) {
        $stats = array();
        $stats['total'] = $this->find('count', array('conditions' => array('Invoice.user_id' => $user_id)));

        $stats['draft'] = $this->find('count', array('conditions' => array('Invoice.status_id=1', 'Invoice.user_id' => $user_id)));
        $stats['open'] = $this->find('count', array('conditions' => array('Invoice.status_id=2', 'Invoice.user_id' => $user_id)));
        $stats['closed'] = $this->find('count', array('conditions' => array('Invoice.status_id=3', 'Invoice.user_id' => $user_id)));
        $stats['pastdue'] = $this->find('count', array('conditions' => array('Invoice.status_id=4', 'Invoice.user_id' => $user_id)));


        return $stats;
    }

    # returns last invoiceId

    public function lastPaperId($user_id) {
        $paper = $this->find()
                  ->where(['user_id'=>$user_id])
                 ->order(['paperId'=>'DESC'])
                 ->select(['paperId'])
                 ->first()
                 ->toArray();
       // pr($paper['paperId']);
        return isset($paper['paperId']) ? $paper['paperId'] : null;
    }
    
    function lastPaperDate($user_id) {
        //$invoice = $this->find('first', array('conditions' => array('Invoice.user_id' => $user_id), 'order' => 'Invoice.invoiceId DESC', 'recursive' => 0,'fields'=>'Invoice.date'));
        
        $paper = $this->find()
                 ->where(['user_id'=>$user_id])
                 ->order(['paperId'=>'DESC'])
                 ->select(['date'])
                 ->first()
                 ->toArray();
        
        
        
        return isset($paper['date']) ? $paper['date'] : null;
    }

    # returns last receiptId

    function lastReceiptId($user_id) {
        $invoice = $this->find('first', array('conditions' => array('Invoice.user_id' => $user_id), 'order' => 'Invoice.nr_chitanta DESC', 'recursive' => 0,'fields'=>'Invoice.nr_chitanta'));
        return isset($invoice['Invoice']['nr_chitanta']) ? $invoice['Invoice']['nr_chitanta'] : null;
    }

    # Sets invoice to past due or open

    function PastDueOrOpen($user_id) {
        # todays date
        $today = date('Y-m-d', time());

        # set all invoices to overdue if Due Date less than todays date
        # and Invoice is Open.
        $this->updateAll(
                array('Invoice.status_id' => 4), array('Invoice.dueDate <' => $today, 'Invoice.status_id =' => 2, 'Invoice.user_id' => $user_id)
        );

        // create a fresh instance of Invoice
        $this->create();

        # set all invoices to open if Due Date greater than todays date
        # and Invoice is Past Due.		 
        $this->updateAll(
                array('Invoice.status_id' => 2), array('Invoice.dueDate >' => $today, 'Invoice.status_id  =' => 4, 'Invoice.user_id' => $user_id)
        );
    }

	
}
