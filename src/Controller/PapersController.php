<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Session;
use InvoicePDF\InvoicePDF;

//public $uses = ['Papers','Units','Items'];

/**
 * Papers Controller
 *
 * @property \App\Model\Table\PapersTable $Papers
 */
class PapersController extends AppController {

    public function dashboard() {
        // Set the layout
        $this->viewBuilder()->layout('dashboard');
        //$draftPapers = $this->Paper->find('all', ['conditions' => 'Paper.status_id=1']);
        #stare decont ------------------------------------
        $stats = [];
        //$stats['draft'] = $this->Papers->find('count', ['conditions' => ['Papers.status_id' => 1]]);
        // In a controller or table method.
        $query = $this->Papers->find('all', [
            'conditions' => ['Papers.status_id = 1']
        ]);
        $stats['draft'] = $query->count();

        $query = $this->Papers->find('all', [
            'conditions' => ['Papers.status_id = 2']
        ]);
        $stats['open'] = $query->count();

        $query = $this->Papers->find('all');
        $stats['all'] = $query->count();
        #---------------------------------------------------

        /*
          #deconturi pe tipuri  ------------------------------------
          $types = [];
          // In a controller or table method.
          $query = $this->Papers->find('list', [
          'valueField' => 'total',
          'groupField' => 'currency_id'
          ]);
          $data = $query->toArray();

          pr($data);
          // Data now looks like

         */



        // In a controller or table method.
        $query = $this->Papers->find('all', [
            'conditions' => ['Papers.status_id = 1']
        ]);
        $stats['draft'] = $query->count();

        $query = $this->Papers->find('all', [
            'conditions' => ['Papers.status_id = 2']
        ]);
        $stats['open'] = $query->count();

        $query = $this->Papers->find('all');
        $stats['all'] = $query->count();
        #---------------------------------------------------
        //pr($stats);
        // In a controller or table method.
        $draftPapers = $this->Papers->find('all')
                ->where(['Papers.status_id = 1'])
                ->limit(2)
                ->contain(['Currencies', 'Users', 'Statuses', 'Clients', 'Providers']);

        //$draftPapers = $this->draftPapers();

        $openPapers = $this->Papers->find('all')
                ->where(['Papers.status_id = 2'])
                ->limit(2)
                ->contain(['Currencies', 'Users', 'Statuses', 'Clients', 'Providers']);

        //pr($openPapers);
        $this->set(compact('draftPapers', 'openPapers', 'stats'));
    }

    /*
      public function draftPapers() {
      return $this->Papers->find('all')
      ->where(['Papers.status_id = 1'])
      ->limit(2)
      ->contain(['Currencies', 'Users', 'Statuses', 'Clients', 'Providers']);
      }
     */

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
      $sess = daca pastrez session variable - cind
      vin din link meniu nu se tine cont de session
     */
    public function index($sess = null) {

        // Set the layout
        $this->viewBuilder()->layout('refine_papers');

        $session = $this->request->session();
        //$session->write('Search.category', '1234');
        //pr($params);
        $conditions = [];
        // Normal POST request  
        if ($this->request->is('post')) {

            $params = $this->request->data;

            if (!empty($params['paperId'])) {
                $conditions['Papers.paperId ='] = $params['paperId'];
            }

            if (!empty($params['status_id'])) {
                $conditions['Papers.status_id ='] = $params['status_id'];
            }

            if (!empty($params['user_id'])) {
                $conditions['Papers.user_id ='] = $params['user_id'];
            }

            if (!empty($params['client_id'])) {
                $conditions['Papers.client_id ='] = $params['client_id'];
            }

            if (!empty($params['day_start']['day']) && !empty($params['month_start']['month']) && !empty($params['year_start']['year'])) {
                $conditions['Papers.date >='] = $params['year_start']['year'] . '-' . $params['month_start']['month'] . '-' . $params['day_start']['day'];
            }

            if (!empty($params['day_stop']['day']) && !empty($params['month_stop']['month']) && !empty($params['year_stop']['year'])) {
                $conditions['Papers.date <='] = $params['year_stop']['year'] . '-' . $params['month_stop']['month'] . '-' . $params['day_stop']['day'];
            }

            // START: Saving conditions in a session variable
            $session->write('conditions', $conditions);
        } else {

            if ($sess <> 0 or $sess <> null) {

                $conditions = $session->read('conditions');

                if ($conditions) {

                    $conditions = $session->read('conditions');
                }
            } else {

                $conditions = [];
            }
        }

        //pr($conditions);

        $this->paginate = [
            'contain' => ['Currencies', 'Users', 'Statuses', 'Clients', 'Providers', 'Categories']
        ];
        //$papers = $this->paginate($this->Papers);

        //pr($conditions);
        $query = $this->Papers->find('all')
                ->where($conditions);
        //pr($query->toArray());
        $papers = $this->paginate($query, [
            'limit' => 20,
            'order' => [
                'Papers.paperId' => 'DESC'
            ],
            'conditions' => $conditions
        ]);

//pr($papers);

        $users = $this->Papers->Users->find('list', ['limit' => 200]);
        $statuses = $this->Papers->Statuses->find('list', ['limit' => 200]);
        $clients = $this->Papers->Clients->find('list', ['limit' => 200]);


        $this->set(compact('papers', 'users', 'statuses', 'clients'));
        $this->set('_serialize', ['papers']);
    }

    /**
     * View method
     *
     * @param string|null $id Paper id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        // Set the layout
        $this->viewBuilder()->layout('paper_view');

        $paper = $this->Papers->get($id, [
            'contain' => ['Currencies', 'Users', 'Statuses', 'Clients', 'Providers', 'Categories', 'Items'=>['Types']]
        ]);
        //pr($paper);
        $this->set('paper', $paper);
        $this->set('_serialize', ['paper']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        
        $user = $this->Auth->user();
//        pr($user);
//        die('asdas');
        $lastPaperId = $this->Papers->lastPaperId($user['id']);

        //pr($lastPaperId);
        
        //$lastReceiptId = $this->Invoice->lastReceiptId($this->Session->read('User.User.id'));
        
        $paper = $this->Papers->newEntity();
        if ($this->request->is('post')) {
            
           $this->request->data['user_id'] = $user['id'];
           $this->__tallyUpInvoice();
           $this->request->data['status_id'] = 1;
            
//           pr($this->request->data);
//           die('asdas');
           
            $paper = $this->Papers->patchEntity($paper, $this->request->data, ['associated' => ['Items', 'Categories']]);
            if ($this->Papers->save($paper)) {
                $this->Flash->success(__('The paper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
             else {
              debug($paper->errors());
            $this->Flash->error(__('The paper could not be saved. Please, try again.'));
             }
        } else {

            // set up default Item
            $this->request->data['items']['total'] = 0;
//            $this->request->data['Papers']['subTotal'] = 0;
//            $this->request->data['Papers']['taxTotal'] = 0;
            $this->request->data['total'] = 0;
            $this->request->data['date'] = $this->Papers->lastPaperDate($user['id']);
            //data scadenta +7 zile implicits
            //$this->data['Invoice']['dueDate'] = Date('Y-m-d', strtotime("+7 days"));
            //$lastDateInvoiceId=Date('Y-m-d', strtotime("+13 days"));

            $this->request->data['delegat'] = '';
            $this->request->data['notes1'] = '-';
            $this->request->data['notes2'] = '-';
        }
        $currencies = $this->Papers->Currencies->find('list', ['limit' => 200]);
        $users = $this->Papers->Users->find('list', ['limit' => 200]);
        $statuses = $this->Papers->Statuses->find('list', ['limit' => 200]);
        $units = $this->Papers->Items->Units->find('list', ['limit' => 200]);
        $clients = $this->Papers->Clients->find('list', ['limit' => 200]);
        $providers = $this->Papers->Providers->find('list', ['limit' => 200]);
        $categories = $this->Papers->Categories->find('list', ['limit' => 200]);
        
        $types = $this->Papers->Items->types->find('list', ['limit' => 200]);
        
        $this->set(compact('paper', 'currencies', 'users', 'statuses', 'clients', 'providers', 'categories', 'units','types','lastPaperId'));
        $this->set('_serialize', ['paper']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Paper id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $paper = $this->Papers->get($id, [
            'contain' => ['Categories', 'Items']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paper = $this->Papers->patchEntity($paper, $this->request->getData());
            //pr($paper);
            if ($this->Papers->save($paper)) {
                $this->Flash->success(__('The paper has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paper could not be saved. Please, try again.'));
        }
        //pr($paper);
        $currencies = $this->Papers->Currencies->find('list', ['limit' => 200]);
        $users = $this->Papers->Users->find('list', ['limit' => 200]);
        $statuses = $this->Papers->Statuses->find('list', ['limit' => 200]);
        $clients = $this->Papers->Clients->find('list', ['limit' => 200]);
        //$units = $this->Papers->Clients->find('list', ['limit' => 200]);

        $units = $this->Papers->Items->Units->find('list', ['limit' => 200]);
        //pr($units);
        $providers = $this->Papers->Providers->find('list', ['limit' => 200]);
        $categories = $this->Papers->Categories->find('list', ['limit' => 200]);
        $this->set(compact('paper', 'currencies', 'users', 'statuses', 'clients', 'providers', 'categories', 'units'));
        $this->set('_serialize', ['paper']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Paper id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $paper = $this->Papers->get($id);
        if ($this->Papers->delete($paper)) {
            $this->Flash->success(__('The paper has been deleted.'));
        } else {
            $this->Flash->error(__('The paper could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    function close($id) {

        $this->idEmptyRedirect($id, 'index');



        # todays date

        $today = date('Y-m-d', time());



        # set status to closed

        $this->data['Invoice']['status_id'] = 3;



        # set paid date to todays date

        $this->data['Invoice']['paidDate'] = $today;



        # set Invoice ID

        $this->Invoice->id = $id;



        # save Invoice

        if ($this->Invoice->save($this->data)) {

            $this->flashSuccess('Factura a fost inchisa', '/invoices/view/' . $id);
        } else {

            $this->flashWarning('Eroare la inchidere factura, Va rugam contactati programator!', '/invoices/view/' . $id);
        }
    }

    function send($id) {

        # make sure Id is not empty

        $this->idEmptyRedirect($id, 'index');



        # int invoice

        $paper = $this->Papers->get($id, [
            'contain' => ['Currencies', 'Users', 'Statuses', 'Clients', 'Providers', 'Categories', 'Items'=>['Types']]
        ])->toArray();



        # create Invoice PDF

        $this->__createInvoicePDF($paper);



        # send invoice
        //$this->__sendInvoice($invoice);
        # delete invoice PDF
        //$this->__DeleteFile($invoice['Invoice']['id'].'.pdf');
        # set Invoice to update

        $this->Papers->id = $id;



        if ($this->Invoice->saveField('status_id', 2)) {

            $this->flashSuccess('Factura a fost deschisa', '/invoices/view/' . $id);
        } else {

            $this->flashWarning('Eroare deschidere factura, Va rugam contactati programator!', '/invoices/view/' . $id);
        }
    }

    function sendInvoiceReceipt($id) {

        # make sure Id is not empty

        $this->idEmptyRedirect($id, 'index');



        # int invoice

        $invoice = $this->Invoice->read(null, $id);



        # create Invoice PDF

        $this->__createInvoiceReceiptPDF($invoice);



        # send invoice
        //$this->__sendInvoice($invoice);
        # delete invoice PDF
        //$this->__DeleteFile($invoice['Invoice']['id'].'.pdf');
        # set Invoice to update

        $this->Invoice->id = $id;



        if ($this->Invoice->saveField('status_id', 2)) {

            $this->flashSuccess('Factura a fost deschisa si trimisa la client', '/invoices/view/' . $id);
        } else {

            $this->flashWarning('Eroare deschidere factura, Va rugam contactati programator!', '/invoices/view/' . $id);
        }
    }

#private methods

    function __lists() {

        //$categories = $this->Invoice->Category->find('list', array('conditions' => array('Category.user_id' => $this->Session->read('User.User.id'))));
        $categories = $this->Invoice->Category->find('list');
        // pr($categories);

        $users = $this->Invoice->User->find('list', array('fields' => array('User.id', 'User.username')));

        $statuses = $this->Invoice->Status->find('list');

        $clients = $this->Invoice->Client->find('list', array('order' => array('Client.name ASC')), array('conditions' => array('Client.user_id' => $this->Session->read('User.User.id'))));

        $units = $this->Invoice->Item->Unit->find('list');

        $currencies = $this->Invoice->Currency->find('list', array('fields' => array('currency')));

        $currenciesAll = $this->Invoice->Currency->find('all', array('recursive' => -1, 'fields' => array('id', 'currency', 'symbol', 'conversion_rate')));
        $this->set(compact('categories', 'users', 'statuses', 'clients', 'units', 'currencies', 'currenciesAll'));
    }

# Tallys up invoice and alters $this->data
# adding total, subTotal and taxTotal

    public function __tallyUpInvoice() {

        $this->__itemTotals();

        $subTotal = $this->__subtotal($this->request->data['items']);

        //$taxTotal = $this->__tax($subTotal, $this->request->data['Invoice']['taxRate']);

        //$taxTotal = $this->__tax($this->request->data['items']);

        //$this->request->data['total'] = $subTotal + $taxTotal;
        $this->request->data['total'] = $subTotal;

        //$this->request->data['subTotal'] = $subTotal;

        //$this->request->data['taxTotal'] = $taxTotal;

        return true;
    }

# returns line item qty times price

    function __lineItemTotal($qty, $price, $rate) {







//        if ($curency_id == 2)
//            $currency = 1;
//
//        if ($curency_id == 1)
//            $currency = 4.17;
//
//        if ($curency_id == 3)
//            $currency = 4.50;



        $line_total = $qty * $price * $rate;

        //$line_total = $line_total + (($line_total * $taxRate) / 100);



        return $line_total;
    }

# Alters $this->data['Item']['total'] with total of line item.

    public function __itemTotals() {

        //$this->request->data['items'] = array_values($this->request->data['items']);

        $itemsCount = isset($this->request->data['items']) ? count($this->request->data['items']) : 0;

//         pr($this->request->data['Item']);
//        die('asdas');



        for ($i = 0; $i < $itemsCount; $i++) {







            $this->request->data['items'][$i]['total'] = $this->__lineItemTotal($this->request->data['items'][$i]['qty'], $this->request->data['items'][$i]['price'], $this->request->data['items'][$i]['rate']);



            // collect unit name from unit model

            $unit = $this->Papers->Items->Units->find()
                     ->where(['id'=>$this->request->data['items'][$i]['unit_id']])
                     ->select(['name'])
                     ->first()
                     ->toArray();

            $this->request->data['items'][$i]['name'] = $unit['name'];
        }
    }

# returns sub total price

    public function __subTotal($items) {

        $price = 0.0;

        foreach ($items as $item) {

//            if ($item['currency_id'] == 2)
//                $currency = 1;
//
//            if ($item['currency_id'] == 1)
//                $currency = 4.17;
//
//            if ($item['currency_id'] == 3)
//                $currency = 4.50;

            //$price += $this->__lineItemTotal($item['qty'], $item['price'], $item['taxRate'], $item['currency_id']);
            //$price += $item['qty'] * $item['price'] * $currency;
            $price += $item['qty'] * $item['price'] * $item['rate'];
        }

        return $price;
    }

# returns total tax amount
//    function __tax($items) {
//
//        $taxTotal = round(($taxRate * 0.01 * $subTotal) * 1000) / 1000;
//
//        return round($taxTotal * 100) / 100;
//
//    }

    function __tax($items) {

        $tax = 0.0;

        foreach ($items as $item) {

//            if ($item['currency_id'] == 2)
//                $currency = 1;
//
//            if ($item['currency_id'] == 1)
//                $currency = 4.17;
//
//            if ($item['currency_id'] == 3)
//                $currency = 4.50;

            //$price += $this->__lineItemTotal($item['qty'], $item['price'], $item['taxRate'], $item['currency_id']);
            $tax += ($item['qty'] * $item['price']) / 100;
        }

        return $tax;
    }

# attaches Invoice.id to $this->data['Item']
//    function __attachInvoiceIdToItems($id) {
//        $itemsCount = isset($this->data['Item']) ? count($this->data['Item']) : 0;
//        for ($i = 0; $i < $itemsCount; $i++) {
//            $this->request->data['Item'][$i]['invoice_id'] = $id;
//        }
//    }
//=======================================================================
//transforma suma in litere pentru chitanta

    function __SumaBani($numar) {

        $cifre = array('', 'unu', 'doi', 'trei', 'patru', 'cinci', 'sase', 'sapte', 'opt', 'noua', 'zece');



        $zeci = array('', '', 'douazeci', 'treizeci', 'patruzeci', 'cincizeci', 'saizeci', 'saptezeci', 'optzeci', 'nouazeci');



        $sute = $cifre;

        $sute[1] = 'o';

        $sute[2] = 'doua';



        $grade = array('', 'mii', 'milioane', 'miliarde');



        $valori = array(
            10 => 'zece',
            11 => 'unsprezece',
            12 => 'doisprezece',
            13 => 'treisprezece',
            14 => 'patrusprezece',
            15 => 'cincisprezece',
            16 => 'sasesprezece',
            17 => 'saptesprezece',
            18 => 'optsprezece',
            19 => 'nouasprezece'
        );

        $numar = trim($numar);

        $i = -1;

        /* while($numar{$i+1}=='0')

          {

          $i++;

          }

          if($i>=-1)

          {

          $numar=substr($numar,$i+1);

          } */

        if (isset($valori[$numar])) {

            return $valori[$numar];
        }



        /* despartirea in grade  - unitati, mii, milioane, miliarde, etc... */

        $numar = strrev($numar);

        $nr = array();

        //echo ' ';

        for ($i = 0, $maxi = strlen($numar) - 1; $i <= $maxi; $i++) {

            //echo '* '.$i.' -> '.$numar{$i}.'<br>';

            $rest = $i % 3;

            if ($rest == 0) {

                $nr[$i / 3] = $numar{$i};
            } elseif ($rest == 1) {

                $nr[round(($i - 1) / 3, 0)] .= $numar{$i};
            } elseif ($rest == 2) {

                $nr[round(($i - 2) / 3, 0)] .= $numar{$i};
            }
        }





        $output = '';

        for ($i = count($nr) - 1; $i >= 0; $i--) {

            /* `curatire` $nr[$i] */

            $nr[$i] = strrev($nr[$i]);

            while (strlen($nr[$i]) <= 2) {

                $nr[$i] = '0' . $nr[$i];
            }



            $aregrad = false;

            if (isset($nr[$i]{0}) && $nr[$i]{0} != '0') {

                $output .= ' ' . $sute[$nr[$i]{0}];

                if ($nr[$i]{0} > 1) {

                    $output .= ' sute';
                } elseif ($nr[$i]{0} == 1) {

                    $output .= ' suta';
                }

                $aregrad = true;
            }



            if (isset($nr[$i]{1}) && $nr[$i]{1} == 1) {

                /* 11 <> 19 */

                $temp = $nr[$i]{1} . $nr[$i]{2};

                if (isset($valori[$temp])) {

                    $output .= ' ' . $valori[$temp];

                    $aregrad = true;
                }
            } else {



                if (isset($nr[$i]{1}) && $nr[$i]{1} != '0') {

                    $output .= ' ' . $zeci[$nr[$i]{1}];

                    $aregrad = true;
                }



                if (isset($nr[$i]{2}) && $nr[$i]{2} != '0') {

                    if (isset($nr[$i]{1}) && $nr[$i]{1} != '0') {

                        $output .= ' si';
                    }

                    $output .= ' ' . $cifre[$nr[$i]{2}];

                    $aregrad = true;
                }
            }



            if ($aregrad) {

                $output .= ' ' . $grade[$i];
            }
        }



        return($output);
    }

//=======================================================================
# Creates PDF Invoice in webroot

    function __createInvoicePDF($paper) {

//        pr($paper);
//        die('asdas');
        # include our PDF class

        //App::classname('Vendor', 'invoicepdf');
        require_once(ROOT . DS . "vendor" . DS . "invoicepdf.php");


        // create new PDF document

        $pdf = new InvoicePDF();



        // Set document information

        $pdf->SetCreator('Facturi - Sa facturam cit mai simplu');



        //$contact = '';
        //$contact .= '<b>'.$invoice['User']['firstName'].' '.$invoice['User']['lastName'].'</b><br/>';
        //$contact .= $invoice['User']['address'].'<br/>';
        //$contact .= $invoice['User']['city'].', '.$invoice['User']['state'].' '.$invoice['User']['zip'].'<br/>';
        //$contact .= $invoice['User']['country'].'<br/>';
        //$contact .= '<b>Email:</b> '.$invoice['User']['email'].'<br/>';



        $contact = '';

        $contact .= 'FURNIZOR: <b>SC SANINVEST SRL</b><br/>';

        $contact .= 'Registrul Comertului: <b>J08/2064/2006</b><br/>';

        $contact .= 'Cod Fiscal: <b>RO18982439</b><br/>';

        $contact .= 'Sediul: <b>str.Harmanului nr.124, Ap.8, Brasov</b><br/>';

        $contact .= 'Cont IBAN: <b>RO36 INGB 0000 9999 0477 3148</b><br/>';

        $contact .= 'Banca: <b>ING BANK</b><br/>';

        $contact .= 'Capital social: <b>200 lei</b><br/>';





        $client = '';

        //$client .= '<b></b><br/>';

        $client .= 'CUMPARATOR: <b>' . $paper['client']['name'] . '</b><br/>';

        $client .= 'Registrul Comertului: <b>' . $paper['client']['reg_comert'] . '</b><br/>';

        $client .= 'Cod Fiscal: <b>' . $paper['client']['cui'] . '</b><br/>';

        $client .= 'Adresa: <b>' . $paper['client']['address'] . '</b><br/>';

        $client .= $paper['client']['city'] . ', ' . $paper['client']['state'] . ' ' . $paper['client']['zip'] . '<br/>';

        $client .= 'Cont IBAN: <b>' . $paper['client']['cont_bancar'] . '</b><br/>';

        $client .= 'Banca: <b>' . $paper['client']['banca'] . '</b><br/>';





        $date = '';

        //$date .= date('jS M Y', strtotime($invoice['Invoice']['date'])).'<br/>';

        $date .= 'Data: ' . date('d.m.Y', strtotime($paper['date'])) . '<br/><br/>';

        //$date .= '<b>Due '.date('jS M Y', strtotime($invoice['Invoice']['dueDate'])).'</b><br/>';
        //$date .= '<b>Data scadenta: '.date('d.m.Y', strtotime($invoice['Invoice']['dueDate'])).'</b><br/>';

        $date_due = date('d.m.Y', strtotime($paper['date']));

        // set up class properties.

        $pdf->xInvoiceId = $paper['paperId'];

        $pdf->xPurchaseOrder = $paper['purchaseOrder'];

        $pdf->xContact = $contact;

        $pdf->xClient = $client;

        $pdf->xDate = $date;

        $pdf->xDateDue = $date_due;

        $pdf->xDelegat = $paper['delegat'];

        $pdf->xCarteIdentitate = $paper['identity_card'];

        $pdf->xAuto = 'asd';

        $pdf->xDataLivrare = date('d.m.Y', strtotime($paper['date']));



        //set auto page breaks

        $pdf->SetAutoPageBreak(true);

        // add a page

        $pdf->AddPage();

        // set font

        $pdf->SetFont("helvetica", "", 8);

        // column titles

        $columnTitles = array('Nr.Crt.', 'Descriere', 'UM', 'Cantitate', 'Pret', 'Valoare', 'TVA');

        // attach item table

        $pdf->ItemTable($columnTitles, $invoice['Item']);

        // attach total table



        $pdf->TotalTable($invoice['Invoice']);

        //Save file To web root PDF document

        $pdf->Output($paper['paperId'] . '.pdf', 'I');
    }

# Creates PDF Invoice in webroot

    function __createInvoiceReceiptPDF($paper) {

        # include our PDF class

        App::import('Vendor', 'invoice-receipt-pdf');



        // create new PDF document

        $pdf = new InvoicePDF();



        // Set document information

        $pdf->SetCreator('Facturi - Sa facturam cit mai simplu');



        //$contact = '';
        //$contact .= '<b>'.$invoice['User']['firstName'].' '.$invoice['User']['lastName'].'</b><br/>';
        //$contact .= $invoice['User']['address'].'<br/>';
        //$contact .= $invoice['User']['city'].', '.$invoice['User']['state'].' '.$invoice['User']['zip'].'<br/>';
        //$contact .= $invoice['User']['country'].'<br/>';
        //$contact .= '<b>Email:</b> '.$invoice['User']['email'].'<br/>';



        $contact = '';

        $contact .= 'FURNIZOR: <b>SC SANINVEST SRL</b><br/>';

        $contact .= 'Registrul Comertului: <b>J08/2064/2006</b><br/>';

        $contact .= 'Cod Fiscal: <b>RO18982439</b><br/>';

        $contact .= 'Sediul: <b>str.Harmanului nr.124, Ap.8, Brasov</b><br/>';

        $contact .= 'Cont IBAN: <b>RO36 INGB 0000 9999 0477 3148</b><br/>';

        $contact .= 'Banca: <b>ING BANK</b><br/>';

        $contact .= 'Capital social: <b>200 lei</b><br/>';





        $client = '';

        //$client .= '<b></b><br/>';

        $client .= 'CUMPARATOR: <b>' . $paper['Client']['name'] . '</b><br/>';

        $client .= 'Registrul Comertului: <b>' . $paper['Client']['reg_comert'] . '</b><br/>';

        $client .= 'Cod Fiscal: <b>' . $paper['Client']['cui'] . '</b><br/>';

        $client .= 'Adresa: <b>' . $paper['Client']['address'] . '</b><br/>';

        $client .= $invoice['Client']['city'] . ', ' . $paper['Client']['state'] . ' ' . $paper['Client']['zip'] . '<br/>';

        $client .= 'Cont IBAN: <b>' . $paper['Client']['cont_bancar'] . '</b><br/>';

        $client .= 'Banca: <b>' . $paper['Client']['banca'] . '</b><br/>';







        $date = '';

        //$date .= date('jS M Y', strtotime($invoice['Invoice']['date'])).'<br/>';

        $date .= 'Data: ' . date('d.m.Y', strtotime($invoice['Invoice']['date'])); //.'<br/><br/>';
        //$date .= '<b>Due '.date('jS M Y', strtotime($invoice['Invoice']['dueDate'])).'</b><br/>';
        //$date .= '<b>Data scadenta: '.date('d.m.Y', strtotime($invoice['Invoice']['dueDate'])).'</b><br/>';

        $date_due = date('d.m.Y', strtotime($invoice['Invoice']['dueDate']));

        // set up class properties.

        $pdf->xInvoiceId = $invoice['Invoice']['invoiceId'];

        $pdf->xContact = $contact;

        $pdf->xClient = $client;

        $pdf->xClient2 = $paper['Client']['name'];

        $pdf->xNrChitanta = $paper['Invoice']['nr_chitanta'];

        $pdf->xRegComert = $paper['Client']['reg_comert'];

        $pdf->xCui = $paper['Client']['cui'];

        $pdf->xAdresa = $paper['Client']['address'] . ', ' . $paper['Client']['city'] . ', ' . $paper['Client']['state'];

        $pdf->xTotal = $paper['Invoice']['total'];

        //echo $pdf->xTotal.';';	

        $pdf->xTotal = strval($pdf->xTotal);

        $pieces = explode(".", $pdf->xTotal);

        //echo $pdf->xTotal.';';	
        //pr($pieces);
        //$pdf->xDecimal = ltrim(($invoice['Invoice']['total'] - floor($invoice['Invoice']['total'])),"0."); // result .3
        //$pdf->xDecimal = ($invoice['Invoice']['total'] - floor($invoice['Invoice']['total'])); // result .3
        //$int = $invoice['Invoice']['total'] > 0 ? floor($invoice['Invoice']['total']) : ceil($invoice['Invoice']['total']);
        //$pdf->xDecimal = $invoice['Invoice']['total'] - $int;
        //echo $pdf->xDecimal;
        //pr($invoice['Invoice']['total']);

        $pdf->xTotalLitere = $this->__SumaBani($pieces[0]);

        if ($pieces[1] <> '00') {

            $pdf->xTotalLitereDecimal = $this->__SumaBani($pieces[1]);
        } else {

            $pdf->xTotalLitereDecimal = 0;
        }



        $pdf->xDate = $date;

        $pdf->xDateDue = $date_due;

        $pdf->xDelegat = $paper['Invoice']['delegat'];

        $pdf->xCarteIdentitate = $paper['Invoice']['carte_identitate'];

        $pdf->xAuto = $paper['Invoice']['auto'];

        $pdf->xDataLivrare = $paper['Invoice']['data_livrare'];

        //set auto page breaks

        $pdf->SetAutoPageBreak(true);

        // add a page

        $pdf->AddPage();

        // set font

        $pdf->SetFont("helvetica", "", 8);

        // column titles

        $columnTitles = array('Nr.Crt.', 'Descriere', 'UM', 'Cantitate', 'Pret', 'Valoare', 'TVA');

        // attach item table

        $pdf->ItemTable($columnTitles, $invoice['Item']);

        // attach total table

        $pdf->TotalTable($paper['Invoice']);

        //Save file To web root PDF document

        $pdf->Output($paper['Invoice']['invoiceId'] . '-receipt.pdf', 'I');
    }

# sends PDF invoice to client

    function __sendInvoice($invoice) {

        $this->Email->attachments = array($invoice['Invoice']['invoiceId'] . '.pdf');

        $this->Email->to = $invoice['Client']['email'];

        $this->Email->subject = 'Invoice ' . $invoice['Invoice']['invoiceId'] . ' from ' . $invoice['User']['firstName'] . ' ' . $invoice['User']['lastName'];

        $this->Email->replyTo = $invoice['User']['email'];

        $this->Email->from = $invoice['User']['firstName'] . ' ' . $invoice['User']['lastName'] . ' <' . $invoice['Client']['email'] . '>';

        $this->Email->template = 'default';

        $this->Email->sendAs = 'text'; // because we like to send pretty mail
        //Set view variables as normal

        $this->set('invoice', $invoice);

        //Do not pass any args to send()

        $this->Email->send();

        $this->flashSuccess('Factura trimisa!', 'dashboard');
    }

    
    
    

}
