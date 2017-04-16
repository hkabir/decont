<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
//        die($this->contoller);
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
		
		/*	
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => ['fields' => ['username' => 'email']]
            ],
			'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
        ]);
	
		
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
        ]);		
		*/
		

        
		$this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unauthorizedRedirect' => $this->referer() // If unauthorized, return them to page they were just on
        ]);

        // Allow the display action so our pages controller
        // continues to work.
        $this->Auth->allow(['pages']);		

		
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    public function changeDateFormat($date, $separator = '/') {

        $date = explode($separator, $date);


        $month = $date[0];
        $day = $date[1];
        $year = $date[2];

        $month_list = array('january' => '01', 'febuary' => '02', 'march' => '03', 'april' => '04', 'may' => '05', 'june' => '06', 'july' => '07', 'august' => '08', 'september' => '09', 'october' => '10', 'november' => '11', 'december' => '10');

        $month = isset($month_list[$month]) ? $month_list[$month] : $month;

        return $year . '-' . $month . '-' . $day;
    }

    
    # checks to see if user can edit file

//    function canEdit($model, $id) {
//       $this->loadModel($model);
//        $record = $this->$model->find(array($model.".id" => $id));
//        if ($record[$model]['user_id'] != $this->Session->read('User.User.id')) {
//            //$this->flashWarning('Nu aveti permisiunea sa faceti acest lucru!', '/dashboard');
//        }
//    }

    /**
     * sets up success session flash message for view
     * @param string $msg
     * @param string $url
     * @return bool exits
     */
    function flashSuccess($msg, $url = null) {

        $this->Session->setFlash($msg);
        if (!empty($url)) {
            $this->redirect($url, null, true);
        }
    }

    /**
     * sets up warning session flash message for view
     * @param string $msg
     * @param string $url
     * @return bool exits
     */
    function flashWarning($msg, $url = null) {

        $this->Session->setFlash($msg);

        if (!empty($url)) {
            $this->redirect($url, null, true);
        }
    }

    /**
     * checks for Id, if no id redirects to given action
     * @param int $id
     * @param string $url
     * @return bool
     */
    function idEmptyRedirect($id, $url = null) {

        if (empty($id)) {
            $this->flashWarning('Invalid Id', $url);
        }
        return true;
    }

    /**
     * returns true if valid actions
     * @param array $actions
     * @return bool
     */
    function only($actions = array()) {

        foreach ($actions as $action) {
            if ($action == $this->params['action']) {
                return true;
            }
        }
        return false;
    }

    /**
     * returns gets to named parameters
     */
    function redirectToNamed() {

        $urlArray = $this->params['url'];
        //unset url- nu avem nevoie de el
        unset($urlArray['url']);

        if (!empty($urlArray)) {
            $this->redirect($urlArray, null, true);
        }
    }

    # Delete a file my babies.

    function __DeleteFile($file) {
        if (file_exists($file)) {
            unlink($file);
        }
    }
	
	
	
}
