<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * User Statistics
 *
 * @todo        write description
 *
 * @category    API wrapper
 * @package     OnApp
 * @subpackage  User_Statistics
 * @author      Yakubskiy Yuriy
 * @copyright   (c) 2011 OnApp
 * @link        http://www.onapp.com/
 * @see         OnApp
 */

/**
 * User User Statistics VmStat
 *
 *  The OnApp_User_UserStatistics_VmStats class uses NO basic methods:
 *
 *
 */
class OnApp_User_Statistics_VmStat extends OnApp {
	/**
	 * Magic properties
	 *
	 * @property float  usage_cost
	 * @property float  vm_resources_cost
	 * @property float  virtual_machine_id
	 * @property string total_cost
	 */

	/**
	 * root tag used in the API request
	 *
	 * @var string
	 */
	protected $rootElement = 'vm_stats';

	/**
	 * alias processing the object data
	 *
	 * @var string
	 */
	protected $URLPath = '';

	public function __construct() {
		parent::__construct();
		$this->className = __CLASS__;
	}

	/**
	 * Activates action performed with object
	 *
	 * @param string $action_name the name of action
	 *
	 * @access public
	 */
	function activate( $action_name ) {
		switch( $action_name ) {
			case ONAPP_ACTIVATE_LOAD:
			case ONAPP_ACTIVATE_SAVE:
			case ONAPP_ACTIVATE_GETLIST:
			case ONAPP_ACTIVATE_DELETE:
				exit( 'Call to undefined method ' . __CLASS__ . '::' . $action_name . '()' );
		}
	}
}