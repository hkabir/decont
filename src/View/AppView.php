<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link http://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
    }
	
	
	function isActive($controller, $actions = []) {
		foreach ($actions as $action) {
			if ($controller == $this->params['controller'] && $action == $this->params['action']) {
				return true;
			}			
		}
		return false;
	}

	/* 
	return date diff in days
	@param string $date_to MySQL Date column format YYYY-MM-DD
	@param string $date_from defaults to now
	@retrn type 
	*/
	function timeDiffToDays($date_to, $date_from = null) {
		if ($date_from == null) {
			$date_from = date('Y-m-d', time());
		}
		
		$date_from_ts = strtotime($date_from);
		$date_to_ts = strtotime($date_to);
		$diff = $date_to_ts - $date_from_ts;
		
		$number_of_days = floor($diff / 86400);
		
		switch ($number_of_days) {
			case 1;
				$days = '1 Zi';
				break;
			default:
				$days = $number_of_days.' Zile';
		}
		return $days;
	}
		
	function paper_date($paper) {
		switch ($paper['Status']['name']) {
			case "Draft":
				return $paper['Paper']['date'];
				break;
			case "Open":
				return 'Validat de: '.$this->timeDiffToDays($paper['Paper']['date']).' zile';				
			
		}
	}
	
}
